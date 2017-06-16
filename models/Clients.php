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
 *
 * @property Patents[] $patents
 */
class Clients extends \yii\db\ActiveRecord
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
     * @return \yii\db\ActiveQuery
     */
    public function getPatents()
    {
        return $this->hasMany(Patents::className(), ['clientID' => 'clientID']);
    }
}
