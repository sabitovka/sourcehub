<?php

use yii\db\Migration;

define('T_PROJECTS', 'projects');
define('T_USERS', 'users');
define('T_SCREENSHOTS', 'screenshots');
define('T_FILES', 'files');
define('T_DOWNLOADS', 'downloads');
define('T_COMMENTS', 'comments');

/**
 * Class m221109_115926_create_files_screenshots_downloads_comments_tables
 */
class m221109_115926_create_files_screenshots_downloads_comments_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #region TABLE SCREENSHOTS
        $this->createTable(T_SCREENSHOTS, [
            'id' => $this->primaryKey(),
            'alt' => $this->string(),
            'filename' => $this->string(),
            'project_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-screenshot-project-id',
            T_SCREENSHOTS,
            'project_id',
            T_PROJECTS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        #endregion

        #region TABLE FILES
        $this->createTable(T_FILES, [
            'id' => $this->primaryKey(),
            'filename' => $this->string(),
            'upload_at' => $this->timestamp(),
            'name' => $this->string(),
            'project_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-file-project-id',
            T_FILES,
            'project_id',
            T_PROJECTS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        #endregion

        #region TABLE DOWNLOADS
        $this->createTable(T_DOWNLOADS, [
            'id' => $this->primaryKey(),
            'downloaded_at' => $this->timestamp(),
            'mac_addres' => $this->string(),
            'file_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-download-file-id',
            T_DOWNLOADS,
            'file_id',
            T_FILES,
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        #endregion
 
        #region TABLE COMMENTS
        $this->createTable(T_COMMENTS, [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'project_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-comment-project-id',
            T_COMMENTS,
            'project_id',
            T_PROJECTS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk-comment-user-id',
            T_COMMENTS,
            'user_id',
            T_USERS,
            'id',
            'NO ACTION',
            'NO ACTION'
        );
        #endregion

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-comment-user-id', T_COMMENTS);
        $this->dropForeignKey('fk-comment-project-id', T_COMMENTS);
        $this->dropForeignKey('fk-download-file-id', T_DOWNLOADS);
        $this->dropForeignKey('fk-screenshot-project-id', T_SCREENSHOTS);

        $this->dropTable(T_COMMENTS);
        $this->dropTable(T_DOWNLOADS);
        $this->dropTable(T_FILES);
        $this->dropTable(T_SCREENSHOTS);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221109_115926_create_files_screenshots_downloads_comments_tables cannot be reverted.\n";

        return false;
    }
    */
}
