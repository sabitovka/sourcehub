<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "downloads".
 *
 * @property int $id
 * @property string|null $downloaded_at
 * @property string|null $mac_addres
 * @property int|null $file_id
 *
 * @property File $file
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'downloads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['downloaded_at'], 'safe'],
            [['file_id'], 'integer'],
            [['mac_addres'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'downloaded_at' => 'Downloaded At',
            'mac_addres' => 'Mac Addres',
            'file_id' => 'File ID',
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }
}
