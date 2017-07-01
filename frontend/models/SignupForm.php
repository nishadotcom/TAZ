<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    //public $username;
    public $email;
    public $password;
    public $name;
    public $firstname;
    public $lastname;
    //public $password;
 



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password','firstname','lastname'], 'required'],
            ['email', 'trim'],
            //['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been registered.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
           'firstname' => 'First Name',
           'lastname' => 'Last Name',
             
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
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->email = $this->email;
        $user->password = md5($this->password);
        $user->created_at = Yii::$app->Common->mysqlDateTime();

        
        //print_r($user); exit;
        return $user->save() ? $user : null;
    }
}
