<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Vimi_aud_user_connect;
use app\models\Vimi_user;
use app\models\Vimi_aud;
use app\models\Lesson;
use app\models\Teacher;
class VimiController extends Controller
{
	/*public function behaviors() { 
        $session = Yii::$app->session;
        $session->open();
        return 
        [ 
        'access' => [ 'class' => AccessControl::className(), 
        'rules' => 
        [ 
        [ 'actions' => ['index','create'], 
        'allow' => true, 
        'roles' => ['@'], 
        ], 
        [   'actions' => ['update','delete'], 
        'allow' => true,
        'matchCallback' => function ($rule, $action) {
                            $status=isset($_SESSION['status']) ? $_SESSION['status'] : null;
                            if($status==1)
                                return true;    
                            else{
                                $id_us = Yii::$app->user->id;
                                $id_m = Yii::$app->request->get('id');
                                $id = Images::find()->where(['id' => $id_m])->one();
                                if($id['author']==$id_us)
                                    return true;
                                else
                                    return false;
                            }
                        }
        ],
        ], 
        ], 
        ]; 
    }*/
      public function actionIndex()
    {
        $aud_id=Vimi_aud::find(['aud_id'])->where(['aud_num'=>@$_GET['audNum']])->one();
        if(!(isset($_GET['audNum']))||$aud_id['aud_id']==0)
        {
          return $this->Choose();
        }
        if(isset($_POST['aud_num']))
            echo 111;
    }
    public function actionViews()
    {
        $query= Vimi_aud_user_connect::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $stud = $query->orderBy('user_id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('views', [
            'stud' => $stud,
            'pagination' => $pagination,
        ]);
    }
    public function Choose()
    {
        $model = new Vimi_aud();
        $aud = Vimi_aud::find()->all();
        /*return $this->render('choose', [
            'aud' => $aud,
        ]);*/
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post())) {
                echo 1111;//return $this->redirect(['index']);
            }
        return $this->render('choose', ['model' => $model]);
    }



    /* Создание пары */
    public function actionLesson()
    {
        $model=new Lesson();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
           // echo "<br><br><br><br><br>";
           //print_r($model);
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('lesson', ['model' => $model]);
    }

    /* Создание Преподавателя */
    public function actionTeacher()
    {
        $model=new Teacher();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('teacher', ['model' => $model]);
    }

}
?>