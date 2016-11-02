<?php
// include BarcodeQR class 
include "BarcodeQR.php"; 

// set BarcodeQR object 
$qr = new BarcodeQR(); 

// create URL QR code 
$qr->url("imi.bsu.ru/funnyScript.php?audID=1110"); 

// display new QR code image 
$qr->draw();
?>