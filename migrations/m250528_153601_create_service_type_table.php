<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_type}}`.
 */
class m250528_153601_create_service_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(), // hotel, train, flight, taxi, etc
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('service_type');
    }

}
