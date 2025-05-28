<?php

use yii\db\Migration;

class m250528_194511_rename_user_table_to_employee extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('user', 'employee');
    }

    public function safeDown()
    {
        $this->renameTable('employee', 'user');
    }

}
