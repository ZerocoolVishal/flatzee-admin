<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_owner".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $contact_number
 * @property string $email
 * @property int $plan_id
 *
 * @property Property[] $properties
 * @property Plans $plan
 */
class PropertyOwner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'contact_number', 'email', 'plan_id'], 'required'],
            [['plan_id'], 'integer'],
            [['username', 'first_name', 'last_name', 'email'], 'string', 'max' => 255],
            [['contact_number'], 'string', 'max' => 11],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::className(), 'targetAttribute' => ['plan_id' => 'id']],
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
            'plan_id' => 'Plan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['property_owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::className(), ['id' => 'plan_id']);
    }
}
