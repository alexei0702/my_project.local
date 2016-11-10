<?php

namespace app\controllers;

use Yii;
use yii\db\Connection; 
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\VimiUser;
use app\models\Vimi_aud;
use app\models\Lesson;
use app\models\Teacher;
use app\models\Groups;
use app\models\Students;

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
        return $this->actionLogin();
    }


    /*public function actionViews()
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
*/
    

    public function Choose()
    {
        $model = new Vimi_aud();
    	if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post())) {
                $aud_num=Yii::$app->request->post('Vimi_aud');
                $aud_num=$aud_num['aud_num'];
                return $this->redirect('index.php?r=vimi&audNum='.$aud_num);
            }
            
            else{
                    return $this->render('choose', ['model' => $model]);
                }
    }


    public function actionLogin()
        {
            $user = new VimiUser();            
            
            if (Yii::$app->request->isPost&&$user->load(Yii::$app->request->post())) 
            {
                $user1 = VimiUser::find()->where(['user_id' => $user->user_id,'user_password' => $user->user_password])->one();
            if($user1)
                {                    
                    Yii::$app->user->login($user);
                    $student_id = Students::find()->where(['user_id'=>$user->user_id])->one();
                    $aud_id = Vimi_aud::find()->where(['aud_num'=>$_GET['audNum']])->one();
                    $db=Yii::$app->db; 
                    $date = date('y:m:d H:i:s');
                    $db->createCommand('INSERT INTO visit_connect(student_id,aud_id,date_visiting) VALUES ('.$student_id['students_id'].','.$aud_id['aud_id'].','.$date.')')->execute();
                    return $this->goBack();

            }
                else
                {
                    throw new NotFoundHttpException('Incorrect login or password.');
                }
                
            }

            
        return $this->render('auth', ['user' => $user]);

        }              



    /* Создание пары */
    public function actionLesson()
    {
        $model=new Lesson();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
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

    /* создание групп*/ 
    public function actionGroups()
    {
        $model=new Groups();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('groups', ['model' => $model]);
    }

    /* Создание студента */
    public function actionStudents()
    {
        $model=new Students();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('students', ['model' => $model]);
    }
}
?>