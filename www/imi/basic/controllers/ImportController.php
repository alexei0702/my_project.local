<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\vimiUser;

class ImportController extends Controller{
public function actionImport(){
$handle = @fopen($_SERVER['DOCUMENT_ROOT']."/spisok.csv", "r"); 
if ($handle) {
while (($buffer = fgets($handle)) !== false) {
$row = explode(';', $buffer);
$row1 = new vimiUser();
$row1['user_fio'] = $row [0];
$row1['user_password'] = rand(10000,99999); 
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
