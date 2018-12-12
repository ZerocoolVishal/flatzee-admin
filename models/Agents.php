<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agents".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $contact_number
 * @property string $email
 * @property string $address
 * @property int $verified
 * @property int $rera_registered
 * @property string $rera_number
 *
 * @property Appointment[] $appointments
 */
class Agents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'contact_number', 'email', 'address', 'verified', 'rera_registered', 'rera_number'], 'required'],
            [['verified', 'rera_registered'], 'integer'],
            [['username', 'first_name', 'last_name', 'contact_number', 'email', 'address', 'rera_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'address' => 'Address',
            'verified' => 'Verified',
            'rera_registered' => 'Rera Registered',
            'rera_number' => 'Rera Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['agent_id' => 'id']);
    }
}
