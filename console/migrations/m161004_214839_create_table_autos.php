<?php

use yii\db\Migration;
use yii\db\Expression;

class m161004_214839_create_table_autos extends Migration
{
    public function safeUp()
    {
        $this->createTable('autos', [
            'id' => $this->primaryKey(),
            'marca' => $this->string(56)->notNull(),
            'modelo' => $this->string(56),
            'anio' => $this->integer(4)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()'))
        ]);

        $this->insert('autos', [
            'marca' => 'Fiat',
            'modelo' => 'Uno',
            'anio' => '2000'
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('autos');

        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
