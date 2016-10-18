<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\graf;

class ImportController extends Controller{
public function actionImport(){
$handle = @fopen($_SERVER['DOCUMENT_ROOT']."/file.csv", "r"); 
if ($handle) {
while (($buffer = fgets($handle)) !== false) {
$row = explode(';', $buffer);
$row1 = new Graf();
$row1['category'] = $row [1];
$row1['type_org'] = $row [2]; 
$row1['name_org'] = $row [3]; 
$row1['name_file'] = $row [4]; 
$row1['messege_text'] = $row [5]; 
$row1['add_info'] = $row [6]; 
$row1['place'] = $row [7]; 
$row1['type_ban'] = $row [8]; 
$row1['size'] = $row [9]; 
$row1['main_color'] = $row [10]; 
$row1['ad_rating'] = $row [11]; 
$row1['ad_valuer'] = $row [12];  
$row1->save();
//теперь $buffer - очередная строка
} 
if(!feof($handle))
{ 
echo "Error: unexpected fgets() fail"; } 
fclose($handle);
}
}
}
?>
