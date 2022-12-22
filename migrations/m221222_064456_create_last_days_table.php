<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%last_days}}`.
 */
class m221222_064456_create_last_days_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%last_days}}', [
            'day' => $this->integer()->notNull()
        ]);

        $this->batchInsert('{{%last_days}}', ['day'], array_map(function($val) { return [$val]; }, range(0, 29)));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%last_days}}');
    }
}
