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
use app\models\Schedule;
use app\models\Rasp;
use app\models\VimiMsk;



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
     return $this->actionVisit();
 }







    /** ******** 
    ********
    *************/
    public function actionViews()
    {

        $schedule = Schedule::find()->where(['group_id'=>$_GET['gr']])->orderBy('day')->all();
        return $this->render('view', ['schedule' => $schedule]);
    }
 
    /*************
    **************
    ****************/

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

     /*************
    **************
    ****************/

    /* Авторизация для отмечания посещения */
    public function actionVisit()
    {
        $user = new VimiUser();            


        if (Yii::$app->request->isPost&&$user->load(Yii::$app->request->post())) 
        {
            $user1 = VimiUser::find()->where(['user_id' => $user->user_id,'user_password' => $user->user_password])->one();
            if($user1)
            {                    
                $student_id = Students::find()->where(['user_id'=>$user->user_id])->one();
                $aud_id = Vimi_aud::find()->where(['aud_num'=>$_GET['audNum']])->one();
                $db=Yii::$app->db->createCommand(); 
                $date = date('y:m:d H:i:s');
                $connect = $db->insert('visit_connect',
                    array('student_id'=>$student_id['students_id'],
                      'aud_id'=>$aud_id['aud_id'],
                      'date_visiting'=>$date ))->execute();
                return $this->goBack();
            }
            else
            {
                throw new NotFoundHttpException('Incorrect login or password.');
            }

        }
        return $this->render('visit', ['user' => $user]);
    }     
     /*************
    **************
    ****************/         




    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = new VimiUser();
        if (Yii::$app->request->isPost&&$user->load(Yii::$app->request->post())) 
        {
            $user = VimiUser::find()->where(['user_id' => $user->user_id,'user_password' => $user->user_password])->one();
            if($user)

            {                    
                Yii::$app->user->login($user);
                $_SESSION['status']=$user['user_status'];
                return $this->goBack();
            }
            else
            {
                throw new NotFoundHttpException('Incorrect login or password.');
            }
            
        }
        return $this->render('auth', ['user' => $user]);

    } 
     /*************
    **************
    ****************/                                                          

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
     /*************
    **************
    ****************/
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
     /*************
    **************
    ****************/
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

     /*************
    **************
    ****************/
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
     /*************
    **************
    ****************/
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
    /*************
    *************
    ***************/
    /* Создание расписания на неделю */

    public function actionWeekCreate()
    {
        $model = new Rasp();
        if (Yii::$app->request->isPost&&$model->load(Yii::$app->request->post()))
        {
            $schedule = Schedule::find()->where(['group_id'=>$_GET['gr']])->orderBy('day')->all();
            return $this->render('weekChoose', ['schedule' => $schedule,'model' => $model ]);
        }
        return $this->render('weekCreate', ['model' => $model]);
    }

    /*****************
    ******************
    *****************/
    public function actionMsk()
    {
        if (Yii::$app->user->isGuest) 
        {
            return $this->actionLogin();
        }
        $id=Yii::$app->user->getId();
        $stud = Students::find()->where(['user_id'=>$id])->one();
        $msk = VimiMsk::find()->where(['students_id'=>$stud])->one();
        $group = Groups::find()->where(['group_id' => $stud['group_id']])->one();
        $stud = Students::find()->where(['group_id'=>$group->group_id])->all();
        return $this->render('mskViews', ['group' => $group, 'stud' => $stud]);
    }

}
?>  