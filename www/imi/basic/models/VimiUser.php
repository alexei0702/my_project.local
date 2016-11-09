<?php

namespace app\models;

use yii\base\Model;

class VimiUser extends \yii\db\ActiveRecord
{
	public function rules()
    {
        return [[['user_id','user_password'],'required'],
        ];
    }
}
?>