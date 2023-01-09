<?php

use yii\db\Migration;

/**
 * Class m221118_103603_fill_categories_table
 */
class m221118_103603_fill_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('categories', ['name' => 'Разработка ПО']);
        $this->insert('categories', ['name' => 'Интернет']);
        $this->insert('categories', ['name' => 'Системное']);
        $this->insert('categories', ['name' => 'Научное']);
        $this->insert('categories', ['name' => 'Мультимедия']);
        $this->insert('categories', ['name' => 'Общение']);
        $this->insert('categories', ['name' => 'Образование']);
        $this->insert('categories', ['name' => 'Базы данных']);
        $this->insert('categories', ['name' => 'Безопасность']);
        $this->insert('categories', ['name' => 'Терминалы']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('categories');
    }
}
