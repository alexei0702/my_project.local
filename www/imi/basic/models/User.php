<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
   
    public $authKey;
    public $accessToken;
    
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [[['username','password'],'required'],
        ];
    }

   /* private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];*/

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    /*public function setNewUser(){
        /**
        * функция заполняет для нового пользователя атрибуты Логин и Пароль, в качестве пароля задаётся стандартный
        
        $standardPass="studiopass";
        $login="studioLogin".(User::find()->count()+1);
        $this->username=$login;
        $this->password=$standardPass;
        $this->status_id=3;        
    }*/
}
