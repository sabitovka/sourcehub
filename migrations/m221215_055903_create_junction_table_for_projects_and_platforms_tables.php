<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects_platforms}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%projects}}`
 * - `{{%platforms}}`
 */
class m221215_055903_create_junction_table_for_projects_and_platforms_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects_platforms}}', [
            'projects_id' => $this->integer(),
            'platforms_id' => $this->integer(),
            'PRIMARY KEY(projects_id, platforms_id)',
        ]);

        // creates index for column `projects_id`
        $this->createIndex(
            '{{%idx-projects_platforms-projects_id}}',
            '{{%projects_platforms}}',
            'projects_id'
        );

        // add foreign key for table `{{%projects}}`
        $this->addForeignKey(
            '{{%fk-projects_platforms-projects_id}}',
            '{{%projects_platforms}}',
            'projects_id',
            '{{%projects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `platforms_id`
        $this->createIndex(
            '{{%idx-projects_platforms-platforms_id}}',
            '{{%projects_platforms}}',
            'platforms_id'
        );

        // add foreign key for table `{{%platforms}}`
        $this->addForeignKey(
            '{{%fk-projects_platforms-platforms_id}}',
            '{{%projects_platforms}}',
            'platforms_id',
            '{{%platforms}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%projects}}`
        $this->dropForeignKey(
            '{{%fk-projects_platforms-projects_id}}',
            '{{%projects_platforms}}'
        );

        // drops index for column `projects_id`
        $this->dropIndex(
            '{{%idx-projects_platforms-projects_id}}',
            '{{%projects_platforms}}'
        );

        // drops foreign key for table `{{%platforms}}`
        $this->dropForeignKey(
            '{{%fk-projects_platforms-platforms_id}}',
            '{{%projects_platforms}}'
        );

        // drops index for column `platforms_id`
        $this->dropIndex(
            '{{%idx-projects_platforms-platforms_id}}',
            '{{%projects_platforms}}'
        );

        $this->dropTable('{{%projects_platforms}}');
    }
}
