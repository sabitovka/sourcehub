<?php

use yii\db\Migration;

define('T_PROJECTS', 'projects');
define('T_CATEGORIES', 'categories');
define('T_LICENSES', 'licenses');
define('T_PLATFORMS', 'platforms');

/**
 * Handles the creation of table `{{%projects}}`.
 */
class m221109_112913_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(T_PROJECTS, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'urlname' => $this->string(25),
            'short_description' => $this->string(255),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'license_id' => $this->integer(),
            'platform_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-project-category-id',
            T_PROJECTS,
            'category_id',
            T_CATEGORIES,
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk-project-license-id',
            T_PROJECTS,
            'license_id',
            T_LICENSES,
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk-project-platforms-id',
            T_PROJECTS,
            'platform_id',
            T_PLATFORMS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );
 
        $this->addForeignKey(
            'fk-project-user-id',
            T_PROJECTS,
            'user_id',
            T_USERS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-project-category-id', T_PROJECTS);
        $this->dropForeignKey('fk-project-license-id', T_PROJECTS);
        $this->dropForeignKey('fk-project-platforms-id', T_PROJECTS);
        $this->dropForeignKey('fk-project-user-id', T_PROJECTS);

        $this->dropTable(T_PROJECTS);
    }
}
