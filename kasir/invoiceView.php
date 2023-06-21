<?php                
require '../koneksi.php';
require 'tcpdf_6_2_13/tcpdf/tcpdf.php';
session_start();

// $order_id = isset($_SESSION['orderID']) ? $_SESSION['orderID'] : 0;
// $orderDetail_id = isset($_SESSION['orderDetail_id']) ? $_SESSION['orderDetail_id'] : 0;
// $kembalian = isset($_GET['kembalian']) ? $_GET['kembalian'] : 0;

$order_id = $_GET['order_id'];

if ($order_id!=0) {
    $inv_mst_query = "SELECT
                            o.order_id, o.date, o.harga_total, o.customer, o.metode_pembayaran, od.orderDetail_id, od.produk_id, od.admin_id, od.quantity, od.harga_satuan, od.sub_total
                        FROM
                            `order` o
                        JOIN
                            order_detail od ON o.order_id = od.order_id
                        WHERE o.order_id = '" . $order_id . "'";
    $inv_mst_results = mysqli_query($koneksi, $inv_mst_query);
    $count = mysqli_num_rows($inv_mst_results);
    if($count>0) {
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>MM COFFEE</b></td></tr>
	<tr><td colspan="2" align="center"><b>CONTACT: +62 821 3225 0747</b></td></tr>
    <br>
	<tr><td colspan="2" align="center"><b>WEBSITE: WWW.MMCOFFEE.COM</b></td></tr>
	<tr><td colspan="2"><b>CUST.NAME: '.$inv_mst_data_row['customer'].' </b></td></tr>
	<tr><td><b>MOB.NO: '.$inv_mst_data_row['order_id'].' </b></td><td align="right"><b>BILL DT.: '.date("d-m-Y").'</b> </td></tr>
	<tr><td>&nbsp;</td><td align="right"><b>BILL NO.: '.$inv_mst_data_row['order_id'].'</b></td></tr>
	<tr><td colspan="2" align="center"><b>INVOICE</b></td></tr>
	<tr class="heading" style="background:#eee;border-bottom:1px solid #ddd;font-weight:bold;">
		<td>
			TYPE OF WORK
		</td>
		<td align="right">
			AMOUNT
		</td>
	</tr>';
		$total=0;

        // Query untuk mendapatkan data metode_pembayaran
        $inv_mst_query = "SELECT metode_pembayaran FROM `order` WHERE order_id = '" . $order_id . "'";
        $inv_mst_results = mysqli_query($koneksi, $inv_mst_query);
        $inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);
        $metode_pembayaran = $inv_mst_data_row['metode_pembayaran'];

		// Query untuk mendapatkan detail order
        $inv_det_query = "SELECT `od`.`orderDetail_id`,`p`.`nama_produk`,`od`.`harga_satuan`,`od`.`quantity`,`od`.`sub_total` 
        FROM `order_detail` `od` 
        JOIN `produk` `p` ON `od`.`produk_id`=`p`.`produk_id`
        WHERE `od`.`order_id` = $order_id";
        $inv_det_results = mysqli_query($koneksi, $inv_det_query);

        while ($inv_det_data_row = mysqli_fetch_array($inv_det_results, MYSQLI_ASSOC)) {
            $content .= '
            <tr class="itemrows">
                <td>
                    <b>' . $inv_det_data_row['nama_produk'] . '</b>
                    <br>
                </td>
                <td align="right"><b>
                    ' . $inv_det_data_row['sub_total'] . '
                </b></td>
            </tr>';
            $total = $total + $inv_det_data_row['sub_total'];
        }
        
		$content .= '<tr class="total"><td colspan="2" align="right">------------------------</td></tr>
		<tr><td colspan="2" align="right"><b>TOTAL:&nbsp;'.$total.'</b></td></tr>
        <tr><td colspan="2" align="right">------------------------</td></tr>
        <tr><td colspan="2" align="right"><b>PAYMENT MODE: ' . $metode_pembayaran . ' </b></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2" align="center"><b>THANK YOU! VISIT AGAIN</b></td></tr>
		<tr><td colspan="2" align="center"><b>"MM COFFEE!!! Menemani Perjalanan Nikmatmu dalam Secangkir Kopi"</b></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
	</table>
</table>'; 
$pdf->writeHTML($content);

$file_location = "/home/fbi1glfa0j7p/public_html/examples/generate_pdf/uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}
else if($_GET['ACTION']=='UPLOAD')
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
echo "Upload successfully!!";
}

//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

} else {
    echo "Invalid order ID";
    print_r($_SESSION);
}

?>