<?php


namespace app\models;

use yii\db\ActiveRecord;

class Employee extends ActiveRecord
{
    public static function tableName()
    {
        return 'employee';
    }

    public function getTripUsers()
    {
        return $this->hasMany(TripUser::class, ['user_id' => 'id']);
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['id' => 'service_id'])
            ->viaTable('trip_user', ['employee_id' => 'id']);
    }
}