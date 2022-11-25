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
        'name' => $this->string(25),
      ]);

      $this->createTable(T_LICENSES, [
        'id' => $this->primaryKey(),
        'name' => $this->string(25),
        'full_text' => $this->text(),
      ]);

      $this->createTable(T_PLATFORMS, [
        'id' => $this->primaryKey(),
        'name' => $this->string(25),
      ]);
      
      $this->createTable(T_USERS, [
        'id' => $this->primaryKey(),
        'username' => $this->string(25),
        'email' => $this->string(50),
        'password' => $this->string(50),
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221109_093842_create_references_tables cannot be reverted.\n";

        return false;
    }
    */
}
