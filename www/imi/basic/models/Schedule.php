<?php
namespace app\models;

use yii\base\Model;
use app\models\Lesson;
use app\models\Students;
use app\models\Schedule;
class Schedule extends \yii\db\ActiveRecord
{
	public function getLesson($les_id){
		$lesson = Lesson::find()->where(['lesson_id'=>$les_id])->one();
		return $lesson['shorttitle'];
	}
	public function getStudents($gr_id){
		$stud = Students::find()->where(['group_id'=>$gr_id])->all();
		return $stud;
	}
	public function getPair($day)
	{
		$count = Schedule::find()->where(['day' => $day])->count(); 
		return $count;
	}
	public function getLessonLong($day,$gr_id){
		$les_id = Schedule::find()->where(['day'=>$day, 'group_id' => $gr_id])->all();
		$lesson = Lesson::find()->where(['lesson_id' => $les_id])->all();
		return $lesson;
	}
}
?>
