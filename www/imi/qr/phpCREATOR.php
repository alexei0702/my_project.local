<?php
require('fpdf.php');
include "BarcodeQR.php";
$qr = new BarcodeQR();
$pdf= new FPDF();
$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);
$pdf->AddPage('P');
$pdf->SetDisplayMode('real','default');
$aud = array('0' => 1104,'1' => 1107,'2' => 1108,'3' => 1111,'4' => 1112,'5' => 1200,'6' => 1205,'7' => 1208,'8' => 1209,'9' => 1210,'10' => 1211,'11' => 1212,'12' => 1213,'13' => 1214,'14' => 1216,'15' => 1303,'16' => 1305,'17' => 1307,'18' => 1309,'19' => 1312,'20' => 1313,'21' => 1316);
$qr->url("vimi.bsu.ru/a/staronline.php?audNum=1104");
$qr->draw(500, "qr-code_1104.png");
$pdf->SetXY(65,10);
$pdf->Write(50,'Auditory 1104');
$pdf->SetXY(30,70);
$pdf->Image('qr-code_1104.png');
for($i=1;$i<22;$i++){
$qr->url("vimi.bsu.ru/a/staronline.php?audNum=".$aud[$i]);
$qr->draw(500, "qr-code_".$i.".png");
$pdf->SetXY(65,400);
$pdf->Write(50,'Auditory '.$aud[$i]);
$pdf->SetXY(30,100);
$pdf->Image('qr-code_'.$i.'.png');
}
$pdf->Output('QR-codes.pdf','I');

?>