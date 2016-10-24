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
$row1['username'] = $row [0];
$row1['password'] = $row [1]; 
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
