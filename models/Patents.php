<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patents".
 *
 * @property integer $patentID
 * @property string $patentApplicant
 * @property string $patentEACNumber
 * @property string $patentApplicationCode
 * @property string $patentType
 * @property string $patentPendingEvents
 * @property string $patentTitle
 * @property string $patentContact
 * @property string $patentNote
 * @property string $patentAgent
 * @property string $patentProcessManager
 * @property integer $clientID
 *
 * @property Patentevents[] $patentevents
 * @property Clients $client
 */
class Patents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patentApplicant', 'patentEACNumber', 'patentApplicationCode', 'patentType', 'patentPendingEvents', 'patentTitle', 'patentContact', 'patentNote', 'patentAgent', 'patentProcessManager', 'clientID'], 'required'],
            [['patentNote'], 'string'],
            [['clientID'], 'integer'],
            [['patentApplicant', 'patentEACNumber', 'patentApplicationCode', 'patentType', 'patentPendingEvents', 'patentTitle', 'patentContact', 'patentAgent', 'patentProcessManager'], 'string', 'max' => 255],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patentID' => 'Patent ID',
            'patentApplicant' => 'Patent Applicant',
            'patentEACNumber' => 'Patent Eacnumber',
            'patentApplicationCode' => 'Patent Application Code',
            'patentType' => 'Patent Type',
            'patentPendingEvents' => 'Patent Pending Events',
            'patentTitle' => 'Patent Title',
            'patentContact' => 'Patent Contact',
            'patentNote' => 'Patent Note',
            'patentAgent' => 'Patent Agent',
            'patentProcessManager' => 'Patent Process Manager',
            'clientID' => 'Client ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatentevents()
    {
        return $this->hasMany(Patentevents::className(), ['patentID' => 'patentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }
}
