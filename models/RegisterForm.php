<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $repeatPassword;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'repeatPassword'], 'required'],
            [['repeatPassword', 'password'], 'validateRepeatPassword'],
            ['username', 'validateUserExists']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'repeatPassword' => 'Повторите пароль',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user['username'] = $this->username;
            $user->password = $this->password;
            return $user->save();
        }
        return false;
    }

    public function validateRepeatPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password != $this->repeatPassword) {
                $this->addError($attribute, 'Пароли не совпадают');
            }
        }
    }

    public function validateUserExists($attribute, $params) {
        if (!$this->hasErrors()) {
            $candidate = User::findByUsername($this->username);
            if ($candidate != null) {
                $this->addError($attribute, 'Пользователь уже существует');
            }
        }
    }
}
