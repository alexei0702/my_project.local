<?php

namespace app\models;

use yii\base\Model; 
use yii\helpers\ArrayHelper;

class Vimi_aud extends \yii\db\ActiveRecord
{
	public function getAudList() { // could be a static func as well
        $models = Vimi_aud::find()->asArray()->all();
        return ArrayHelper::map($models, 'aud_id', 'aud_num');
    }
}
?>