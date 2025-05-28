<?php


namespace app\models;

use yii\db\ActiveRecord;

class ServiceParticipant extends ActiveRecord
{
    public static function tableName()
    {
        return 'service_participant';
    }

    public function getUser()
    {
        return $this->hasOne(TripUser::class, ['id' => 'user_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }
}