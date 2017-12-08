<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "firm".
 *
 * @property integer $id
 * @property string $title
 * @property string $city
 * @property string $category
 * @property string $website
 * @property string $email
 * @property string $phone
 * @property integer $show_website
 * @property integer $show_email
 * @property integer $show_phone
 * @property string $logo
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property User $user
 * @property Job[] $jobs
 */
class Firm extends \yii\db\ActiveRecord
{
     public $agree;
     
    const SCENARIO_CREATE = 'create';
    const SCENARIO_SIGNUP = 'update';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_website', 'show_email', 'show_phone', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            
            [['title', 'city', 'category', 'website', 'email', 'phone'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','maxFiles' => 1],
            [['agree'], 'compare','operator' => '==','compareValue' => true,'message' => 'You must agree to the terms and conditions','on' => self::SCENARIO_CREATE],
            [['agree'], 'safe'],
            ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Company Name',
            'city' => 'City',
            'category' => 'Category',
            'website' => 'Website',
            'email' => 'Email',
            'phone' => 'Phone',
            'show_website' => 'Show website to users',
            'show_email' => 'Show email to users',
            'show_phone' => 'Show phone to users',
            'logo' => 'Logo',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'agree' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['firm_id' => 'id']);
    }
}
