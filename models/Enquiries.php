<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enquiries".
 *
 * @property int $id
 * @property int $user_id
 * @property string $location
 * @property int $status_id
 * @property string $avalability
 * @property int $property_type_id
 * @property int $bedroos
 * @property string $furnishing_status
 * @property string $rent_expectation
 * @property int $plan_id
 * @property string $timestamp
 *
 * @property Plans $plan
 * @property PropertyTypes $propertyType
 * @property PropertyStatus $status
 * @property Users $user
 */
class Enquiries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enquiries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'location', 'status_id', 'avalability', 'property_type_id', 'bedroos', 'furnishing_status', 'rent_expectation', 'plan_id'], 'required'],
            [['user_id', 'status_id', 'property_type_id', 'bedroos', 'plan_id'], 'integer'],
            [['avalability', 'timestamp'], 'safe'],
            [['location', 'furnishing_status'], 'string', 'max' => 255],
            [['rent_expectation'], 'string', 'max' => 10],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['property_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyTypes::className(), 'targetAttribute' => ['property_type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'location' => 'Location',
            'status_id' => 'Status ID',
            'avalability' => 'Avalability',
            'property_type_id' => 'Property Type ID',
            'bedroos' => 'Bedroos',
            'furnishing_status' => 'Furnishing Status',
            'rent_expectation' => 'Rent Expectation',
            'plan_id' => 'Plan ID',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyType()
    {
        return $this->hasOne(PropertyTypes::className(), ['id' => 'property_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(PropertyStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
