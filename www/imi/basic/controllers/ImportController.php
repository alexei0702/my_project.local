<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\VimiMsk;
class ImportController extends Controller{
public function actionImport(){
$handle = @fopen($_SERVER['DOCUMENT_ROOT']."/msk_csv/05960.csv", "r"); 
if ($handle) {
$buffer = fgets($handle);
$buffer = fgets($handle);
$buffer = fgets($handle);
$buffer = fgets($handle);
$i=1;
while (($buffer = fgets($handle)) !== false&&$i!=12) {
$row = explode(';', $buffer);
$i++;
echo $row[1]."<br>";
echo $row[11]."<br>";
/*$row1 = new VimiMsk();
$row1['user_fio'] = $row[1];
$row1['count_null'] = $row[11];
$row1['group_id'] = 16;
$row1->save();*/
//теперь $buffer - очередная строка
} 
}
//if(!feof($handle))
//{ 
//echo "Error: unexpected fgets() fail"; 
//} 
fclose($handle);
}
}

?>
