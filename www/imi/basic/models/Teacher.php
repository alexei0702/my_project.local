<?php
namespace app\models;


class Teacher	 extends \yii\db\ActiveRecord
{
	public function rules()
    {
        return [[['Name','Secondname','Patronymic'],'required'],
        ];
    }
}