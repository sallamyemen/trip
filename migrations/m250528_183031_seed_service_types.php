<?php

use yii\db\Migration;

class m250528_183031_seed_service_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('service_type', ['name'], [
            ['Перелёт'],
            ['Проезд на поезде'],
            ['Проживание'],
            ['Бронирование столика в ресторане'],
            ['Трансфер'],
            ['Регистрация на мероприятие'],
            ['Аренда автомобиля'],
            ['Питание'],
            ['Визовая поддержка'],
            ['Медицинская страховка'],
        ]);
    }

    public function safeDown()
    {
        $this->delete('service_type');
    }

}
