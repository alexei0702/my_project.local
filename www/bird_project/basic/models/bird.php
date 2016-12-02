<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Bird extends \yii\db\ActiveRecord
{

	public function rules()
    {
        return [
            [['bird_name', 'family_id','squad_id','kind_id', 'status_id', 'propagation', 'migration', 'habitat','population'], 'required'],
        ];
    }

}

?>