<?php
/**
 * User: Mr-mao
 * Date: 2017/6/26
 * Time: 12:19
 */
namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeatPassword;
    public $orgnization;
    public $name;
    public $cellPhone;
    public $landLine;
    public $address;
    public $liaison;
    public $note;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'trim'],
            [['username', 'email', 'password', 'repeatPassword'], 'required'],
            ['repeatPassword', 'compare', 'compareAttribute'=>'password', 'message' => '两次密码不一致'],
            ['username', 'unique', 'targetAttribute' => 'clientUsername', 'targetClass' => '\app\models\Clients', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetAttribute' => 'ClientEmail', 'targetClass' => '\app\models\Clients', 'message' => '邮箱已被占用'],
            ['password', 'string', 'min' => 6],

            [['orgnization', 'name', 'cellPhone', 'landLine', 'address', 'liaison', 'note'], 'default', 'value' => 'NULL'],
//            [['orgnization', 'name', 'cellPhone', 'landLine', 'address', 'liaison', 'note'], 'required'],
            [['orgnization', 'name', 'cellPhone', 'landLine', 'address', 'liaison', 'note'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'repeatPassword' => '确认密码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return Clients|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Clients();
        $user->clientUsername = $this->username;
        $user->setPassword($this->password);
        $user->clientOrgnization = $this->orgnization;
        $user->clientName = $this->name;
        $user->clientEmail = $this->email;
        $user->clientCellPhone = $this->cellPhone;
        $user->clientLandline = $this->landLine;
        $user->ClientAddress = $this->address;
        $user->clientLiaison = $this->liaison;
        $user->clientCreateDate = date('Y-m-d');
        $user->clientNote = $this->note;
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}