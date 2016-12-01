<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Bird;

class BirdsController extends Controller
{

public function actionCreate()
    {
        $model=new Bird();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
        	print_r($model);
            //$model->save();
            //return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }

}

?>