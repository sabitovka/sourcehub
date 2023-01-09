<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $urlname
 * @property string|null $short_description
 * @property string|null $description
 * @property int|null $category_id
 * @property int|null $license_id
 * @property int|null $platform_id
 * @property int|null $user_id
 *
 * @property Category $category
 * @property Comment[] $comments
 * @property File[] $files
 * @property License $license
 * @property Platform $platform
 * @property Screenshot[] $screenshots
 * @property User $user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category_id', 'license_id', 'platform_id', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['urlname'], 'string', 'max' => 25],
            [['short_description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['license_id'], 'exist', 'skipOnError' => true, 'targetClass' => License::class, 'targetAttribute' => ['license_id' => 'id']],
            [['platform_id'], 'exist', 'skipOnError' => true, 'targetClass' => Platform::class, 'targetAttribute' => ['platform_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'urlname' => 'Название URL',
            'short_description' => 'Краткое описание',
            'description' => 'Подробное описание',
            'category_id' => 'Category ID',
            'license_id' => 'License ID',
            'platform_id' => 'Platform ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'categories_id'])
            ->viaTable('{{projects_categories}}', ['projects_id' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Files]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[License]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicense()
    {
        return $this->hasOne(License::class, ['id' => 'license_id']);
    }

    /**
     * Gets query for [[Platform]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatforms()
    {
        return $this->hasMany(Platform::class, ['id' => 'categories_id'])
            ->viaTable('{{projects_categories}}', ['projects_id' => 'id']);
    }

    /**
     * Gets query for [[Screenshots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScreenshots()
    {
        return $this->hasMany(Screenshot::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getDownloads($pStart = "1970-01-01 00:00:01", $pEnd = '2038-01-19 03:14:07') {
        return Download::find()
            ->andWhere(['in', 'file_id', $this->getFiles()->select('id')])
            ->andWhere('downloaded_at between :pStart and :pEnd')
            ->params([':pStart' => $pStart, ':pEnd' => $pEnd]);
    }

    public static function getAllProjectsDownloads($pStart = "1970-01-01 00:00:01", $pEnd = '2038-01-19 03:14:07', $limit = 20) {
        return (new Query())
            ->select(['{{projects}}.*', 'count({{downloads}}.id) as downloads_count'])
            ->from(Project::tableName())
            ->leftJoin(File::tableName(), '{{projects}}.id = files.project_id')
            ->leftJoin(Download::tableName(), 'files.id = {{downloads}}.file_id')
            ->where('downloaded_at between :pStart and :pEnd')
            ->groupBy('{{projects}}.id')
            ->orderBy('downloads_count DESC')
            ->params([':pStart' => $pStart, ':pEnd' => $pEnd]);
    }

    public function getDownloadsCount($pStart = "1970-01-01 00:00:01", $pEnd = '2038-01-19 03:14:07') {
        return $this->getDownloads($pStart, $pEnd)->count();
    }

    public function getLastUpdatedDate() {
        return gmdate('d.m.Y h:m', strtotime($this->getFiles()
                ->select('{{upload_at}}')
                ->orderBy('upload_at DESC')
                ->one()
                ->upload_at));
        
    }
}
