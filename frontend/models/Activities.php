<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string $activity
 * @property string $type
 * @property string $description
 * @property string $image_path
 * @property int $user_id
 *
 * @property User $user
 * @property ActivityCategory[] $activityCategories
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity', 'type', 'description', 'image_path', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['activity'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 25],
            [['description', 'image_path'], 'string', 'max' => 512],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity' => 'Activity',
            'type' => 'Type',
            'description' => 'Description',
            'image_path' => 'Image Path',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[ActivityCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivityCategories()
    {
        return $this->hasMany(ActivityCategory::className(), ['activity_id' => 'id']);
    }
}
