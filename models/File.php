<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $filename
 * @property string|null $upload_at
 * @property string|null $name
 * @property int|null $project_id
 *
 * @property Download[] $downloads
 * @property Project $project
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['upload_at'], 'safe'],
            [['project_id'], 'integer'],
            [['filename', 'name'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Путь файла',
            'upload_at' => 'Загружен',
            'name' => 'Название файла',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * Gets query for [[Downloads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(Download::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }

    public function getFilesByProjectId($projectId) {
        return $this->find()->where(['project_id' => $projectId])->all();
    }
}
