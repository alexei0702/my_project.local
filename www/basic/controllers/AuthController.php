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
   /* public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
*/
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
    /*public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return render('image\index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    } */
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
                return $this->redirect(['index']);
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
