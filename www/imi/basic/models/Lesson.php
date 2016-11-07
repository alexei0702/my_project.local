<?php
namespace app\models;
<<<<<<< HEAD


=======
use yii\base\Model; 
>>>>>>> 98e35cce449f19c0e128a39628571df70067a745
class Lesson extends \yii\db\ActiveRecord
{
	public function rules()
    {
<<<<<<< HEAD
        return [[['title','shorttitle','teacher_id'],'required'],
        ];
    }
}
=======
        return [[['title,shorttitle,teacher_id'],'required']];
    }
}
>>>>>>> 98e35cce449f19c0e128a39628571df70067a745
