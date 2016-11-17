<?php
namespace app\models;




use yii\base\Model; 

class Rasp extends Model
{
	public $date;
	public $week;
	public function rules()
    {
        return [
            [['date', 'week'], 'required'],
        ];
    }
}
