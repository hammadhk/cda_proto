<?php

use yii\db\Schema;
use yii\db\Migration;

class m151122_103659_create_sector_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    	$this->createTable('Sector', [
            'id' => $this->primaryKey(),
            'value' => $this->string(8)->notNull(),
        ]);

    	$this->createIndex('index_sector_id', 'Sector', 'value');
    }

    public function safeDown()
    {
    	$this->dropIndex('index_sector_id', 'Sector');
        $this->dropTable('Sector');
    }
}