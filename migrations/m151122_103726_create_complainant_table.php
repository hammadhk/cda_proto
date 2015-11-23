<?php

use yii\db\Schema;
use yii\db\Migration;

class m151122_103726_create_complainant_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    	$this->createTable('Complainant', [
            'id' => $this->primaryKey(),
    		'cnic' => $this->string(15)->notNull()->unique(),
            'name' => $this->string(32)->notNull(),
            'phone' => $this->string(16),
            'address_house_number' => $this->string(8),
            'address_street_number' => $this->string(8),
            'address_sector_id' => $this->integer(),
        ]);

    	$this->createIndex('index_complainant_cnic', 'Complainant', 'cnic');
    	$this->createIndex('index_complainant_phone', 'Complainant', 'phone');
    	$this->createIndex('index_complainant_street_number', 'Complainant', 'address_street_number');
    	$this->createIndex('index_complainant_sector_id', 'Complainant', 'address_sector_id');
    	
    	$this->addForeignKey('fk-complainant-sector_id', 'Complainant', 'address_sector_id', 'Sector', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
    	$this->dropIndex('index_complainant_sector_id', 'Complainant');
    	$this->dropIndex('index_complainant_street_number', 'Complainant');
    	$this->dropIndex('index_complainant_phone', 'Complainant');
    	$this->dropIndex('index_complainant_cnic', 'Complainant');
    	
    	$this->dropForeignKey('fk-complainant-sector_id', 'Complainant');
    	
        $this->dropTable('Complainant');
    }
}