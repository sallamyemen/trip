<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TripUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'trip_user';
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['email'], 'email'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getBusinessTrips()
    {
        return $this->hasMany(BusinessTrip::class, ['id' => 'business_trip_id'])
            ->viaTable('business_trip_user', ['user_id' => 'id']);
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['id' => 'service_id'])
            ->viaTable('service_participant', ['user_id' => 'id']);
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

}