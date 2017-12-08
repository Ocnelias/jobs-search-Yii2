<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property string $title
 * @property string $company
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 * @property integer $experience_owner_id
 *
 * @property User $experienceOwner
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['experience_owner_id'], 'integer'],
            [['title', 'company', 'date_from', 'date_to'], 'string', 'max' => 255],
            [['experience_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['experience_owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Position',
            'company' => 'Company',
            'date_from' => 'Date from',
            'date_to' => 'Date to',
            'description' => 'Description',
            'experience_owner_id' => 'Experience Owner ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperienceOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'experience_owner_id']);
    }
}
