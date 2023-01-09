<?php

use yii\db\Migration;

/**
 * Class m221118_102948_fill_platforms_table
 */
class m221118_102948_fill_platforms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('platforms', ['name' => 'Windows']);
        $this->insert('platforms', ['name' => 'Linux']);
        $this->insert('platforms', ['name' => 'MacOS']);
        $this->insert('platforms', ['name' => 'Android']);
        $this->insert('platforms', ['name' => 'Virtualization']);
        $this->insert('platforms', ['name' => 'Другие']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('platforms');
    }

}
