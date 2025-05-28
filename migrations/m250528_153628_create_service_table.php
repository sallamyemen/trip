<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m250528_153628_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'business_trip_id' => $this->integer()->notNull(),
            'service_type_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(), // Например: Аэрофлот SU123, Hilton Hotel
            'start_date' => $this->dateTime()->notNull(),
            'end_date' => $this->dateTime()->notNull(),
            'status' => $this->string()->defaultValue('new'), // new, confirmed, cancelled
            'attributes' => $this->text()->null(), // JSON, доп. данные
        ]);

        $this->addForeignKey('fk-service-trip', 'service', 'business_trip_id', 'business_trip', 'id', 'CASCADE');
        $this->addForeignKey('fk-service-type', 'service', 'service_type_id', 'service_type', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-service-trip', 'service');
        $this->dropForeignKey('fk-service-type', 'service');
        $this->dropTable('service');
    }

}
