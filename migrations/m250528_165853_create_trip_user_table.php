<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip_user}}`.
 */
class m250528_165853_create_trip_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{trip_user}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey('fk_trip_user_service', '{{%trip_user}}', 'service_id', '{{%service}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_trip_user_employee', '{{%trip_user}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_user_service', '{{%trip_user}}');
        $this->dropForeignKey('fk_trip_user_employee', '{{%trip_user}}');
        $this->dropTable('{{%trip_user}}');
    }
}
