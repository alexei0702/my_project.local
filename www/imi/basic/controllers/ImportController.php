<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Students;

class ImportController extends Controller{
public function actionImport(){
$handle = @fopen($_SERVER['DOCUMENT_ROOT']."/msk_csv/05160.csv", "r"); 
if ($handle) {
$buffer = fgets($handle);
$buffer = fgets($handle);
$i=1;
while (($buffer = fgets($handle)) !== false&&$i!=15) {
$row = explode(';', $buffer);

$row1 = explode(' ', $row[1]);
$name = $row1[0];
$secondname = $row1[1];
$i++;
echo $name."<br>";
echo $secondname."<br>";
/*$row1 = new Students();
$row1['Name'] = $secondname;
$row1['Secondname'] = $name; 
$row1['Patronymic'] = 1;
$row1['group_id'] = 4;
$row1['user_id']  = 1;
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
