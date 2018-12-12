<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property string $date
 * @property string $time
 * @property int $property_id
 * @property int $status
 * @property int $users_is
 * @property int $agent_id
 *
 * @property Property $property
 * @property Users $usersIs
 * @property Agents $agent
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'time', 'property_id', 'status', 'users_is'], 'required'],
            [['date', 'time'], 'safe'],
            [['property_id', 'status', 'users_is', 'agent_id'], 'integer'],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
            [['users_is'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_is' => 'id']],
            [['agent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agents::className(), 'targetAttribute' => ['agent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'time' => 'Time',
            'property_id' => 'Property',
            'status' => 'Status',
            'users_is' => 'User',
            'agent_id' => 'Agent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersIs()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_is']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agents::className(), ['id' => 'agent_id']);
    }
}
