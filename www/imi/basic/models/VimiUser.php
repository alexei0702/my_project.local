<?php

namespace app\models;
use yii\base\Model;


namespace app\models;

use yii\base\Model;

class VimiUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public function rules()
    {

        return [[['user_id','user_password','username'],'required'],

        ];
    }
    public static function findIdentity($id)
    {
        return VimiUser::findOne($id);
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
        return $this->user_id;
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
}
?>