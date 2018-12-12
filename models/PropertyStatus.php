<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_status".
 *
 * @property int $id
 * @property int $status_title
 *
 * @property Property[] $properties
 */
class PropertyStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_title'], 'required'],
            [['status_title'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_title' => 'Status Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['current_status' => 'id']);
    }
}
