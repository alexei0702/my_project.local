<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\User;
use app\models\LoginForm;
class AuthController extends Controller
{
    /**
     * @inheritdoc
     */
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

        [ 'actions' => ['logout','index'], 
        'allow' => true, 
        'roles' => ['@'], 
        ], 
        [   'actions' => ['register'], 
        'allow' => true,
        'matchCallback' => function ($rule, $action) {
                            $status=isset($_SESSION['status']) ? $_SESSION['status'] : null;
                            if($status==1)
                                return true;
                            else
                                return false;

                        }
        ],
        ], 
        ], 
        ]; 
    }
    /**
     * @inheritdoc
     */
    

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    //** регистрация нового user'а **//
    public function actionRegister()
    {
        $user = new User();
        if (Yii::$app->request->isPost&&$user->load(Yii::$app->request->post())) 
        {
            $user1 = User::find()->where(['username' => $user['username']])->one();
            if(!$user1)
            {                    
                $user->save();
                return $this->redirect(['index']);
            }
            else
            {
                throw new NotFoundHttpException('Problems.');
            }
            
        }
    return $this->render('register', ['user' => $user]);

    }
    // Вход //     
     public function actionLogin()
    {
        $user = new User();
        if (Yii::$app->request->isPost&&$user->load(Yii::$app->request->post())) 
        {
            $user = User::find()->where(['username' => $user['username'],'password' => $user['password']])->one();
            if($user)
            {                    
                Yii::$app->user->login($user);
                $_SESSION['status']=$user['status'];
                return $this->goBack();
            }
            else
            {
                throw new NotFoundHttpException('Incorrect logis or password.');
            }
            
        }
    return $this->render('auth', ['user' => $user]);

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

    /**
     * Displays contact page.
     *
     * @return string
     */
}
