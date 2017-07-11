<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $email;
    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required','on'=>'site_login'],
            [['username', 'password'], 'required','on'=>'backend_login'],
            ['email', 'email','message'=>'Please enter a valid email'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)) {
                $field = ($this->scenario === 'backend_login') ? 'Username' : 'Email' ;
                $this->addError($attribute, 'Incorrect '.$field.' or Password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
          if($this->scenario === 'backend_login'){
              $this->_user = User::findByUsername($this->username);
          }else{
            $this->_user = User::findByEmail($this->email);
          }


        }
        return $this->_user;
    }

}
