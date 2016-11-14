<?php
namespace app\models;

class Groups extends \yii\db\ActiveRecord
{
	public function rules()
    {
        return [[['group_name','group_code'],'required'],
        ];
    }
}