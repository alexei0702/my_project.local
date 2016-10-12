<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Images;
use yii\web\UploadedFile;
use yii\data\Pagination;
class ImageController extends Controller
{
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

        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post())) {
             $model->link = UploadedFile::getInstance($model, 'link');
            if ($model->upload()) {
                // file is uploaded successfully
                //$model->save();
                $model->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = Videos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
?>