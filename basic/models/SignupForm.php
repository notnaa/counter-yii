<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $group;
    public $name;
    public $lastname;
    public $thirdname;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Поле не должно быть пустым'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Логин занят. Попробуйте другой.'],
            ['username', 'string', 'max' => 32, 'message' => 'Логин слишком длинный'],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'Поле не должно быть пустым'],
            ['email', 'email'],
            ['email', 'string', 'max' => 45],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Данный Email был зарегистрирован ранее.'],
            ['group', 'trim'],
            ['group', 'required', 'message' => 'Поле не должно быть пустым'],
            ['group', 'string'],
            ['name', 'trim'],
            ['name', 'required', 'message' => 'Поле не должно быть пустым'],
            ['name', 'string', 'max' => 32],
            ['lastname', 'trim'],
            ['lastname', 'required', 'message' => 'Поле не должно быть пустым'],
            ['lastname', 'string', 'max' => 32],
            ['thirdname', 'trim'],
            ['thirdname', 'required', 'message' => 'Поле не должно быть пустым'],
            ['thirdname', 'string', 'max' => 32],
            ['password', 'required', 'message' => 'Поле не должно быть пустым'],
            ['password', 'string', 'min' => 6, 'message' => 'Пароль должен содержать не менее 6 символов'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->group = $this->group;
        $user->name = $this->name;
        $user->lastname = $this->lastname;
        $user->thirdname = $this->thirdname;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}