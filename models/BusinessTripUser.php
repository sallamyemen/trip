<?php


namespace app\models;

use yii\db\ActiveRecord;
use Yii;


class BusinessTripUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'business_trip_user';
    }

    public function getUser()
    {
        return $this->hasOne(TripUser::class, ['id' => 'user_id']);
    }

    public function getBusinessTrip()
    {
        return $this->hasOne(BusinessTrip::class, ['id' => 'business_trip_id']);
    }
}