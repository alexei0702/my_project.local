<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Bird;
use app\models\Squad;
use app\models\Family;
use app\models\Kind;
use app\models\Status;

class BirdsController extends Controller
{

public function actionCreate()
    {
        $bird=new Bird();
        $popul_con = new PopulationConnect();
        $st_con = new StatusConnect();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            //print_r($model);
            //$model->save();
            //return $this->redirect(['index']);
        }
        $squad = Squad::find()->all();
        $family = Family::find()->all();
        $kind = Kind::find()->all();
        $status = Status::find()->all();
        $population = Population::find()->all();
        $place = Place::find()->all();
        return $this->render('create', ['bird' => $bird,'popul_con' => $popul_con,'st_con' => $st_con, 'squad' => $squad, 'family' => $family, 'kind' => $kind, 'status' => $status, 'population' => $population, 'place' => $place]);
    }

}

?>