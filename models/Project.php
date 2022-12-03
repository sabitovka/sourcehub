<?php

namespace app\models;

use Yii;

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
            'short_description' => 'Short Description',
            'description' => 'Description',
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
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
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
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
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
}
