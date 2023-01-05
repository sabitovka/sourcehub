<?php

use yii\db\Migration;

define('T_CATEGORIES', 'categories');
define('T_LICENSES', 'licenses');
define('T_PLATFORMS', 'platforms');
define('T_USERS', 'users');

/**
 * Class m221109_093842_create_references_tables
 */
class m221109_093842_create_references_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable(T_CATEGORIES, [
        'id' => $this->primaryKey(),
        'name' => $this->string(),
      ]);

      $this->createTable(T_LICENSES, [
        'id' => $this->primaryKey(),
        'name' => $this->string(),
        'full_text' => $this->text(),
      ]);

      $this->createTable(T_PLATFORMS, [
        'id' => $this->primaryKey(),
        'name' => $this->string(),
      ]);
      
      $this->createTable(T_USERS, [
        'id' => $this->primaryKey(),
        'username' => $this->string(),
        'email' => $this->string(),
        'password' => $this->string(),
      ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(T_CATEGORIES);
        $this->dropTable(T_LICENSES);
        $this->dropTable(T_PLATFORMS);
        $this->dropTable(T_USERS);
    }

}
