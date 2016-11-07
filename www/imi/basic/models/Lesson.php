<?php
namespace app\models;


class Lesson extends \yii\db\ActiveRecord
{
	public function rules()
    {
        return [[['title','shorttitle','teacher_id'],'required'],
        ];
    }
}