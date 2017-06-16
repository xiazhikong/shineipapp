<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patentevents".
 *
 * @property integer $eventID
 * @property string $eventAbstract
 * @property string $eventContent
 * @property string $eventNote
 * @property string $eventFileLinks
 * @property integer $patentID
 * @property string $eventCreatedDatetime
 * @property string $eventDeadline
 * @property string $eventCreator
 * @property string $eventSatus
 * @property string $eventSatusUpdatedDatetime
 * @property string $eventSatusUpdatedByWho
 *
 * @property Patents $patent
 */
class Patentevents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patentevents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventAbstract', 'eventContent', 'eventNote', 'eventFileLinks', 'patentID', 'eventDeadline', 'eventCreator', 'eventSatus', 'eventSatusUpdatedByWho'], 'required'],
            [['eventContent', 'eventNote', 'eventFileLinks'], 'string'],
            [['patentID'], 'integer'],
            [['eventCreatedDatetime', 'eventDeadline', 'eventSatusUpdatedDatetime'], 'safe'],
            [['eventAbstract', 'eventCreator', 'eventSatus', 'eventSatusUpdatedByWho'], 'string', 'max' => 255],
            [['patentID'], 'exist', 'skipOnError' => true, 'targetClass' => Patents::className(), 'targetAttribute' => ['patentID' => 'patentID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventID' => 'Event ID',
            'eventAbstract' => 'Event Abstract',
            'eventContent' => 'Event Content',
            'eventNote' => 'Event Note',
            'eventFileLinks' => 'Event File Links',
            'patentID' => 'Patent ID',
            'eventCreatedDatetime' => 'Event Created Datetime',
            'eventDeadline' => 'Event Deadline',
            'eventCreator' => 'Event Creator',
            'eventSatus' => 'Event Satus',
            'eventSatusUpdatedDatetime' => 'Event Satus Updated Datetime',
            'eventSatusUpdatedByWho' => 'Event Satus Updated By Who',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatent()
    {
        return $this->hasOne(Patents::className(), ['patentID' => 'patentID']);
    }
}
