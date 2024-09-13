<?php

namespace app\models;

use yii\base\Exception;
use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;

    public function rules()
    {
        return [
            [['username', 'email', 'password_hash'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'string', 'max' => 255],
            [['username', 'email'], 'unique', 'targetClass' => User::class],
            ['password_hash', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Name',
            'email' => 'Email',
            'password_hash' => 'Password',
        ];
    }

    /**
     * Регистрация пользователя
     * @throws Exception
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
            return $user->save();
        }

        return false;
    }
}
