<?php


namespace app\models;

use yii\db\ActiveRecord;

class BusinessTrip extends ActiveRecord
{
    public static function tableName()
    {
        return 'business_trip';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            // добавь другие поля, если они есть и должны валидироваться
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название командировки',
            // можно добавить другие подписи
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(TripUser::class, ['id' => 'user_id'])
            ->viaTable('business_trip_user', ['business_trip_id' => 'id']);
    }

    public function getServices()
    {
        return $this->hasMany(Service::class, ['business_trip_id' => 'id']);
    }

    public function getParticipantsWithDates()
    {
        $result = [];

        foreach ($this->users as $user) {
            $services = $user->services
                ->where(['business_trip_id' => $this->id, 'status' => 'active'])
                ->all();

            $startDates = array_map(fn($s) => $s->start_date, $services);
            $endDates = array_map(fn($s) => $s->end_date, $services);

            $start = !empty($startDates) ? min($startDates) : null;
            $end = !empty($endDates) ? max($endDates) : null;

            $result[] = [
                'user' => $user,
                'start_date' => $start,
                'end_date' => $end,
            ];
        }

        return $result;
    }

}