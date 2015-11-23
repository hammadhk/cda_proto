<?php

use yii\db\Schema;
use yii\db\Migration;

class m151122_103926_create_complaint_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    	$this->createTable('Complaint', [
            'id' => $this->primaryKey(),
            'complainant_id' => $this->integer()->notNull(),
            'registration_time' => $this->dateTime(),
    		'status_id' => $this->integer(),
            'description' => $this->text(),
        ]);
    	$this->createIndex('index_complaint_complainant_id', 'Complaint', 'complainant_id');
    	$this->createIndex('index_complaint_status_id', 'Complaint', 'status_id');
    	
    	$this->addForeignKey('fk-complaint-complainant_id', 'Complaint', 'complainant_id', 'Complainant', 'id', 'RESTRICT', 'CASCADE');
    	$this->addForeignKey('fk-complaint-status_id', 'Complaint', 'status_id', 'ComplaintStatus', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
    	$this->dropForeignKey('fk-complaint-status_id', 'Complaint');
    	$this->dropForeignKey('fk-complaint-complainant_id', 'Complaint');
    	$this->dropIndex('index_complaint_status_id', 'Complaint');
    	$this->dropIndex('index_complaint_complainant_id', 'Complaint');
        $this->dropTable('Complaint');
    }
}
