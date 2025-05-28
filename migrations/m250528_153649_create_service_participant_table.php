<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_participant}}`.
 */
class m250528_153649_create_service_participant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service_participant', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-sp-service', 'service_participant', 'service_id', 'service', 'id', 'CASCADE');
        $this->addForeignKey('fk-sp-user', 'service_participant', 'user_id', 'user', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-sp-service', 'service_participant');
        $this->dropForeignKey('fk-sp-user', 'service_participant');
        $this->dropTable('service_participant');
    }

}
