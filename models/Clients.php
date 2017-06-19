<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $clientID
 * @property string $clientUsername
 * @property string $clientPassword
 * @property string $clientOrgnization
 * @property string $clientName
 * @property string $clientEmail
 * @property string $clientCellPhone
 * @property string $clientLandline
 * @property string $ClientAddress
 * @property string $clientLiaison
 * @property string $clientCreateDate
 * @property string $clientNote
 * @property string $authKey
 *
 * @property Patents[] $patents
 */
class Clients extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientUsername', 'clientPassword', 'clientOrgnization', 'clientName', 'clientEmail', 'clientCellPhone', 'clientLandline', 'ClientAddress', 'clientLiaison', 'clientCreateDate', 'clientNote'], 'required'],
            [['clientCreateDate'], 'safe'],
            [['clientNote'], 'string'],
            [['clientUsername', 'clientPassword', 'clientOrgnization', 'clientName', 'clientEmail', 'clientCellPhone', 'clientLandline', 'ClientAddress', 'clientLiaison'], 'string', 'max' => 255],
            [['auth_key', 'access_token'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clientID' => 'Client ID',
            'clientUsername' => 'Client Username',
            'clientPassword' => 'Client Password',
            'clientOrgnization' => 'Client Orgnization',
            'clientName' => 'Client Name',
            'clientEmail' => 'Client Email',
            'clientCellPhone' => 'Client Cell Phone',
            'clientLandline' => 'Client Landline',
            'ClientAddress' => 'Client Address',
            'clientLiaison' => 'Client Liaison',
            'clientCreateDate' => 'Client Create Date',
            'clientNote' => 'Client Note',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return false;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['clientUsername' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->clientID;
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
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->clientPassword);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatents()
    {
        return $this->hasMany(Patents::className(), ['clientID' => 'clientID']);
    }
}
