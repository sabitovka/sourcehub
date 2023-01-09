<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects_categories}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%projects}}`
 * - `{{%categories}}`
 */
class m221215_055834_create_junction_table_for_projects_and_categories_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects_categories}}', [
            'projects_id' => $this->integer(),
            'categories_id' => $this->integer(),
            'PRIMARY KEY(projects_id, categories_id)',
        ]);

        // creates index for column `projects_id`
        $this->createIndex(
            '{{%idx-projects_categories-projects_id}}',
            '{{%projects_categories}}',
            'projects_id'
        );

        // add foreign key for table `{{%projects}}`
        $this->addForeignKey(
            '{{%fk-projects_categories-projects_id}}',
            '{{%projects_categories}}',
            'projects_id',
            '{{%projects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `categories_id`
        $this->createIndex(
            '{{%idx-projects_categories-categories_id}}',
            '{{%projects_categories}}',
            'categories_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            '{{%fk-projects_categories-categories_id}}',
            '{{%projects_categories}}',
            'categories_id',
            '{{%categories}}',
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
            '{{%fk-projects_categories-projects_id}}',
            '{{%projects_categories}}'
        );

        // drops index for column `projects_id`
        $this->dropIndex(
            '{{%idx-projects_categories-projects_id}}',
            '{{%projects_categories}}'
        );

        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-projects_categories-categories_id}}',
            '{{%projects_categories}}'
        );

        // drops index for column `categories_id`
        $this->dropIndex(
            '{{%idx-projects_categories-categories_id}}',
            '{{%projects_categories}}'
        );

        $this->dropTable('{{%projects_categories}}');
    }
}
