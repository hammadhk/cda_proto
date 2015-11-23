<?php

use yii\db\Schema;
use yii\db\Migration;

class m151122_103826_create_complainant_status_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    	$this->createTable('ComplaintStatus', [
            'id' => $this->primaryKey(),
            'value' => $this->string(16)->notNull(),
        ]);

    	$this->createIndex('index_complaintstatus_id', 'ComplaintStatus', 'value');
    }

    public function safeDown()
    {
    	$this->dropIndex('index_complaintstatus_id', 'ComplaintStatus');
        $this->dropTable('ComplaintStatus');
    }
}