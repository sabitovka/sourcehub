<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "licenses".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $full_text
 *
 * @property Project[] $projects
 */
class License extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_text'], 'string'],
            [['name'], 'string', 'max' => 25],
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
            'full_text' => 'Полный текст',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class, ['license_id' => 'id']);
    }
}
