<?php
namespace app\models;



class Students extends \yii\db\ActiveRecord
{
	public function rules()
    {
        return [[['Name','Secondname','Patronymic','group_id'],'required'],
        ];
    }
}