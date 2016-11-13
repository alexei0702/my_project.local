<?php
namespace app\models;




use yii\base\Model; 

class Lesson extends \yii\db\ActiveRecord
{
	public function rules()
    {

        return [[['title','shorttitle','teacher_id'],'required'],
        ];
    }
}

