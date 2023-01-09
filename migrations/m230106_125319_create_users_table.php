<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230106_125319_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-project-user-id', '{{%projects}}');
        $this->dropForeignKey('fk-comment-user-id', '{{%comments}}');

        $this->dropTable('{{%users}}');

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string()
        ]);

        $this->addForeignKey(
            'fk-project-user-id',
            '{{%projects}}',
            'user_id',
            '{{%users}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk-comment-user-id',
            '{{%comments}}',
            'user_id',
            '{{%users}}',
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
        $this->dropForeignKey('fk-project-user-id', '{{%projects}}');
        $this->dropForeignKey('fk-comment-user-id', '{{%comments}}');

        $this->dropTable('{{%users}}');

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'email' => $this->string(),
            'password' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-project-user-id',
            '{{%projects}}',
            'user_id',
            '{{%users}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk-comment-user-id',
            '{{%comments}}',
            'user_id',
            '{{%users}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }
}
