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
    //public $id;
    public $email;
    public $password;
    public $name;
    public $firstname;
    public $lastname;
    public $mobile;
    public $profile_image;
    public $registered_mode;
    public $user_type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password','firstname','lastname','mobile'], 'required', 'on'=>'WebSignup'],
            [['email','firstname','lastname'], 'required','on'=>'FBSignup'],
            ['email', 'trim'],
            //['email', 'required'],
            ['email', 'email'],
            [['email', 'profile_image'], 'string', 'max' => 255],
            ['mobile', 'string', 'max' => 15],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been registered.'],
            //['password', 'required'],
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
        $user->mobile = $this->mobile;
        $user->password = md5($this->password);
        $user->user_type = ($this->user_type) ? $this->user_type : 'Buyer';
        $user->created_at = Yii::$app->Common->mysqlDateTime();


        //echo '<pre>'; print_r($user); exit;
        return $user->save() ? $user : null;
    }

    public function FBsignup(){
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->email = $this->email;
        $user->profile_image = $this->profile_image;
        $user->registered_mode = 'FB';
        $user->created_at = Yii::$app->Common->mysqlDateTime();


        //echo '<pre>'; print_r($user); exit;
        return $user->save() ? $user : null;
    }
}
