<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Bird;
use yii\data\Pagination;
use app\models\Squad;
use app\models\Family;
use app\models\Kind;
use app\models\Status;
use app\models\Place;
use app\models\PopulationConnect;
use app\models\StatusConnect;
use app\models\Population;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
         $query = Bird::find();

    $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

    $birds = $query->orderBy('bird_name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
    return $this->render('index', [
            'birds' => $birds,
            'pagination' => $pagination,
        ]);
    }
    /**********************
    ***********************
    *********************/

    public function actionAbout()
    {
         return $this->render('info');
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

    public function actionSearch($query)
    {
        $query = trim($query); 
        $query = mysql_real_escape_string($query);
        $query = htmlspecialchars($query);

            if (strlen($query) < 3) {
                $text = '<p>Слишком короткий поисковый запрос.</p>';
            } else if (strlen($query) > 128) {
                $text = '<p>Слишком длинный поисковый запрос.</p>';
            } else { 
                $q = "SELECT `page_id`, `title`, `desc`, `title_link`, `category`, `uniq_id`
                      FROM `table_name` WHERE `text` LIKE '%$query%'
                      OR `title` LIKE '%$query%' OR `meta_k` LIKE '%$query%'
                      OR `meta_d` LIKE '%$query%'";

                $result = mysql_query($q);

                if (mysql_affected_rows() > 0) { 
                    $row = mysql_fetch_assoc($result); 
                    $num = mysql_num_rows($result);

                    $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                    do {
                        // Делаем запрос, получающий ссылки на статьи
                        $q1 = "SELECT `link` FROM `table_name` WHERE `uniq_id` = '$row[page_id]'";
                        $result1 = mysql_query($q1);

                        if (mysql_affected_rows() > 0) {
                            $row1 = mysql_fetch_assoc($result1);
                        }

                        $text .= '<p><a> href="'.$row1['link'].'/'.$row['category'].'/'.$row['uniq_id'].'" title="'.$row['title_link'].'">'.$row['title'].'</a></p>
                        <p>'.$row['desc'].'</p>';

                    } while ($row = mysql_fetch_assoc($result)); 
                } else {
                    $text = '<p>По вашему запросу ничего не найдено.</p>';
                }
            } 

        return $text; 
    }   
}
