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
use app\models\Create;
use yii\data\Pagination;
use app\models\User;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class BirdsController extends Controller
{

        public function behaviors() { 
        $session = Yii::$app->session;
        $session->open();
        return 
        [ 
        'access' => [ 'class' => AccessControl::className(), 
        'rules' => 
        [ 
        
        [ 'allow' => true, 
         'actions' => ['login'], 
         'roles' => ['?'], 
        ],

        [ 'actions' => ['index','create','create-bird','logout','views-birds','create-edit','views-details'], 
        'allow' => true, 
        'roles' => ['@'], 
        ], 
        [   'actions' => ['update','update-bird','delete-bird'], 
        'allow' => true,
        'matchCallback' => function ($rule, $action) {
                            $status=isset($_SESSION['status']) ? $_SESSION['status'] : null;
                            if($status==2)
                                return true;    
                            else{
                                $id_us = Yii::$app->user->id;
                                $id_m = Yii::$app->request->get('id');
                                $name = Yii::$app->request->get('name');
                                $fullName = '\app\models\\'.$name;
                                $id = $fullName::find()->where([$name.'_id' => $id_m])->one();
                                if($id['author']==$id_us)
                                    return true;
                                else
                                    return false;
                            }
                        }
        ],
        [   'actions' => ['delete'], 
        'allow' => true,
        'matchCallback' => function ($rule, $action) {
                            $status=isset($_SESSION['status']) ? $_SESSION['status'] : null;
                            if($status==2)
                                return true;    
                            else{
                                return false;
                            }
                        }
        ],
        ], 
        ], 
        ]; 
    }


public function actionIndex()
{
    return $this->render('index');
}

public function actionViewsBirds()
{
    $query = Bird::find();

    $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

    $birds = $query->orderBy('bird_name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
    return $this->render('views', [
            'birds' => $birds,
            'pagination' => $pagination,
        ]);
}


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        if ($model->load(Yii::$app->request->post())) {

            $user = User::find()->where(['username' => $model->username,'password' => $model->password])->one();
            if($user)

            {                    
                Yii::$app->user->login($user);
                $_SESSION['status']=$user['status'];
                return $this->goBack();
            }
            else
            {
               throw new NotFoundHttpException('Incorrect login or password.');
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


public function actionCreate()
{
        if(Yii::$app->request->get('name'))
        {
            $name = '\app\models\\'.Yii::$app->request->get('name');
            $model = new $name();
            $model->author = Yii::$app->user->id;
            $name = Yii::$app->request->get('name');
            if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
            {
                $model->save();
                header("Location:index.php?r=birds/create-edit&modelName=".$name); 
                exit();
            }
            return $this->render($name.'Create', ['model' => $model]);
        }
        else
            return $this->redirect(['index']);
}

public function actionCreateEdit($modelName)
{
    if(Yii::$app->request->get('modelName'))
    {
        $name='\app\models\\'.Yii::$app->request->get('modelName');
        $edit = $name::find()->all();
        $name = Yii::$app->request->get('modelName');
        return $this->render($name.'Views', ['edit' => $edit,'name' => $name]);
    }
    return $this->goBack();
}

    public function actionCreateBird()
    {
        $bird=new Bird();
        $bird->author = Yii::$app->user->id;
        $popul_con = new PopulationConnect();
        $st_con = new StatusConnect();
        if (Yii::$app->request->isPost&&$st_con->load(Yii::$app->request->post())&&$popul_con->load(Yii::$app->request->post())&&$bird->load(Yii::$app->request->post()))
        {
            $bird->link = UploadedFile::getInstance($bird, 'link');
            if($bird->create())
            {
                $bird->save();
                $popul_con->bird_id = $bird->bird_id;
                $popul_con->save();
                foreach ($st_con->status_id as $st) 
                {
                    $status_connect = new StatusConnect();
                    $status_connect->bird_id = $bird->bird_id;
                    $status_connect->status_id = $st;
                    $status_connect->save();
                }
                return $this->redirect(['views-birds']);    
            }
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
    *********************/
    public function actionViewsDetails($id)
    {
        if($id!=0)
        {
            $bird = Bird::find()->where(['bird_id' => $id])->one();
            if($bird)
            {
                $squad = Squad::find()->where(['squad_id' => $bird->squad_id])->one();
                if($squad===null){
                    $squad = new Squad();
                    $squad->squad_name = "Отряд";
                    $squad->squad_name_lat = "удален!";
                }
                $family = Family::find()->where(['family_id' => $bird->family_id])->one();
                if($family===null){
                    $family = new Family();
                    $family->family_name = "Семейство";
                    $family->family_name_lat = "удалено!";
                }
                $kind = Kind::find()->where(['kind_id' => $bird->kind_id])->one();
                if($kind===null){
                    $kind = new Kind();
                    $kind->kind_name = "Род";
                    $kind->kind_name_lat = "удален!";
                }
                $statusCon = StatusConnect::find()->where(['bird_id' => $bird->bird_id])->all();
                $popul_con = PopulationConnect::find()->where(['bird_id' => $bird->bird_id])->all();
                return $this->render('birdViews', ['bird' => $bird,'squad' => $squad, 'family' => $family, 'kind' => $kind, 'statusCon' => $statusCon, 'popul_con' => $popul_con]);
            }
            else
            {
                echo "Bird not found";
                die;
            }
        }
        else
        {
            echo "Missing argument";
            die;
        }
    }

    public function actionDelete($id,$name)
    {
        $this->findModel($id,$name)->delete();
        header("Location:index.php?r=birds/create-edit&modelName=".$name);
        exit();
    }

    public function actionUpdate($id,$name)
    {
        $model = $this->findModel($id,$name);
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            header("Location:index.php?r=birds/create-edit&modelName=".$name); 
            exit();
        } 
        else 
        {
        return $this->render($name.'Create', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id,$name)
    {
        $fullName='\app\models\\'.$name;
        if (($model = $fullName::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*************************
    *************************
    **************************/
    public function actionDeleteBird($id)
    {
        $bird = $this->findModelBird($id);
        //$popul_con = PopulationConnect::find()->where(['bird_id' => $bird->bird_id])->deleteAll();
        $popul_con = PopulationConnect::find()->where(['bird_id' => $bird->bird_id])->all();
                foreach ($popul_con as $key) {
                    $key->delete();
                }
        $st_con = StatusConnect::find()->where(['bird_id' => $bird->bird_id])->all();
        foreach ($st_con as $key) {
                    $key->delete();
                }
        if($bird->link!="noimage.png")
        unlink($_SERVER['DOCUMENT_ROOT'].'/bird_project/basic/upload/'.$bird->link);
        $bird->delete();
        return $this->redirect(['views-birds']);
    }

    public function actionUpdateBird($id)
    {
        $bird = $this->findModelBird($id);
        $link_old=$bird->link;
        $popul_con = new PopulationConnect();
        $st_con = new StatusConnect();
        $popul_con_old = PopulationConnect::find()->where(['bird_id'=>$id])->one();
        $popul_con->population_id = $popul_con_old->population_id;
        $popul_con->place_id = $popul_con_old->place_id;
        $st_con_old = StatusConnect::find()->where(['bird_id'=>$id])->all();
            foreach ($st_con_old as $st) {
                $status_list[] = $st->status_id;
            }
        $st_con->status_id = $status_list;
        if ($st_con->load(Yii::$app->request->post())&&$popul_con->load(Yii::$app->request->post())&&$bird->load(Yii::$app->request->post()))
        {
            $link = UploadedFile::getInstance($bird, 'link');
            if($link!=null)
                $bird->link=$link;
            else
                $bird->link=$link_old;
            if($bird->updateBird())
            {
                $bird->save();
                $popul_con_old = PopulationConnect::find()->where(['bird_id' => $bird->bird_id])->all();
                foreach ($popul_con_old as $key) {
                    $key->delete();
                }
                $st_con_old = StatusConnect::find()->where(['bird_id' => $bird->bird_id])->all();
                foreach ($st_con_old as $key) {
                    $key->delete();
                }
                $popul_con->bird_id = $bird->bird_id;
                $popul_con->save();
                foreach ($st_con->status_id as $st) 
                {
                    $status_connect = new StatusConnect();
                    $status_connect->bird_id = $bird->bird_id;
                    $status_connect->status_id = $st;
                    $status_connect->save();
                }
                return $this->redirect(['views-birds']);
            }
        } 
        else 
        {
        $squad = Squad::find()->all();
        $family = Family::find()->all();
        $kind = Kind::find()->all();
        $status = Status::find()->all();
        $population = Population::find()->all();
        $place = Place::find()->all();
        return $this->render('birdCreate', ['bird' => $bird,'popul_con' => $popul_con,'st_con' => $st_con, 'squad' => $squad, 'family' => $family, 'kind' => $kind, 'status' => $status, 'population' => $population, 'place' => $place]);
        }
    }

    protected function findModelBird($id)
    {
        if (($model = Bird::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested bird does not exist.');
        }
    }   
}
?>