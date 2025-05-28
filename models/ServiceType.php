<?php


namespace app\models;

use yii\db\ActiveRecord;

class ServiceType extends ActiveRecord
{
    public static function tableName()
    {
        return 'service_type';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название услуги',
        ];
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['service_type_id' => 'id']);
    }
}
