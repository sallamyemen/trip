<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%business_trip_user}}`.
 */
class m250528_153519_create_business_trip_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('business_trip_user', [
            'id' => $this->primaryKey(),
            'business_trip_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-btu-trip',
            'business_trip_user',
            'business_trip_id',
            'business_trip',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-btu-user',
            'business_trip_user',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-btu-trip', 'business_trip_user');
        $this->dropForeignKey('fk-btu-user', 'business_trip_user');
        $this->dropTable('business_trip_user');
    }

}
