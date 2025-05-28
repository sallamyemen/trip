<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%business_trip}}`.
 */
class m250528_153446_create_business_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('business_trip', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('business_trip');
    }
}
