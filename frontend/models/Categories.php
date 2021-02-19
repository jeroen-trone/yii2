<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $category
 *
 * @property ActivityCategory[] $activityCategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
        ];
    }

    /**
     * Gets query for [[ActivityCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivityCategories()
    {
        return $this->hasMany(ActivityCategory::className(), ['category_id' => 'id']);
    }
}
