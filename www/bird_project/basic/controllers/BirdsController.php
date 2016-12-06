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
use app\models\Place;
use app\models\PopulationConnect;
use app\models\StatusConnect;
use app\models\Population;

class BirdsController extends Controller
{
/*
public function actionCreate()
{
    $model = new Create();
    if(Yii::$app->request->isPost&&$bird->load(Yii::$app->request->post()))
    {
        print_r($model);
    }
    return $this->render('create', ['model' => $model]);
}
*/

public function actionCreate()
    {
        $bird=new Bird();
        $popul_con = new PopulationConnect();
        $st_con = new StatusConnect();
        if (Yii::$app->request->isPost&&$st_con->load(Yii::$app->request->post()))
        {
            echo $st_con->status_id;
            //print_r($st_con);
            //$bird->save();
            //$popul_con->bird_id = $bird->bird_id;
            $st_con->bird_id = 1;
            //$popul_con->save();
            //$st_con->save();
            //return $this->redirect(['index']);
        }
        $squad = Squad::find()->all();
        $family = Family::find()->all();
        $kind = Kind::find()->all();
        $status = Status::find()->all();
        $population = Population::find()->all();
        $place = Place::find()->all();
        return $this->render('birdCreate', ['bird' => $bird,'popul_con' => $popul_con,'st_con' => $st_con, 'squad' => $squad, 'family' => $family, 'kind' => $kind, 'status' => $status, 'population' => $population, 'place' => $place]);
    }

    /**********************
    ***********************
    **********************/
    /* Создание Семейства Petuchei*/


    public function actionFamily()
    {
        $model=new Family();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('familyCreate', ['model' => $model]);
    }
    /**********************
    ***********************
    **********************/
    /* Создание Рода */
    public function actionKind()
    {
        $model=new Kind();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('kindCreate', ['model' => $model]);
    }

        /**********************
    ***********************
    **********************/
    /* Создание Отряда */
    public function actionSquad()
    {
        $model=new Squad();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('squadCreate', ['model' => $model]);
    }

        /**********************
    ***********************
    **********************/
    /* Создание статуса */
    public function actionStatus()
    {
        $model=new Status();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('statusCreate', ['model' => $model]);
    }

        /**********************
    ***********************
    **********************/
    /* Создание Численности */
    public function actionPopulation()
    {
        $model=new Population();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('populationCreate', ['model' => $model]);
    }

        /**********************
    ***********************
    **********************/
    /* Создание Места */
    public function actionPlace()
    {
        $model = new Place();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            echo "All good";
            //return $this->redirect(['index']);
        }
        return $this->render('placeCreate', ['model' => $model]);
    }

}
?>