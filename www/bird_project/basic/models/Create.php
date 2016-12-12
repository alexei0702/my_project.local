<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Create extends \yii\db\ActiveRecord
{
	public $modelName;

	public function rules()
    {
        return [
            [['modelName'], 'required'],
        ];
    }
}

?>