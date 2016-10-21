<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Images;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class ImageController extends Controller
{
    public function behaviors() { 
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
    }



     public function actionIndex()
    {
        $query = Images::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $images = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
       return $this->render('index', [
            'images' => $images,
            'pagination' => $pagination,
        ]);
    }


    public function actionCreate()
    {
        $model = new Images();
        $model->author = Yii::$app->user->id;
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post())) {
             $model->link = UploadedFile::getInstance($model, 'link');
            if ($model->create()) {
                // file is uploaded successfully
                //$model->save();
                $model->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }
     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_l=$model->link;
        if ($model->load(Yii::$app->request->post())){
            $link = UploadedFile::getInstance($model, 'link');
            if($link!=null)
                $model->link=$link;
            else
                $model->link=$model_l;
        if($model->updateImage()) {
            $model->save();
            return $this->redirect(['index']);
        }} else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
?>