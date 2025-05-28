<?php


namespace app\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return 'service';
    }

    public function rules()
    {
        return [
            [['business_trip_id', 'service_type_id'], 'required'],
            [['business_trip_id', 'service_type_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'business_trip_id' => 'Командировка',
            'service_type_id' => 'Тип услуги',
            'start_date' => 'Дата начала',
            'end_date' => 'Дата окончания',
            'name' => 'Название услуги',
        ];
    }


    public function getBusinessTrip()
    {
        return $this->hasOne(BusinessTrip::class, ['id' => 'business_trip_id']);
    }

    public function getServiceType()
    {
        return $this->hasOne(ServiceType::class, ['id' => 'service_type_id']);
    }

    public function getServiceParticipants()
    {
        return $this->hasMany(ServiceParticipant::class, ['service_id' => 'id']);
    }

    public function getTripUsers()
    {
        return $this->hasMany(TripUser::class, ['service_id' => 'id']);
    }

    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['id' => 'employee_id'])
            ->viaTable('trip_user', ['service_id' => 'id']);
    }
}