<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property string $position
 * @property string $category
 * @property string $city
 * @property string $salary
 * @property string $education
 * @property string $experience
 * @property string $employment_type
 * @property string $description
 * @property integer $public
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $firm_id
 *
 * @property Firm $firm
 */
class Job extends \yii\db\ActiveRecord {

    public $agree;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_SIGNUP = 'update';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['public', 'created_at', 'updated_at', 'firm_id'], 'integer'],
                [['description'], 'string'],
                [['position'], 'required'],
                [['category', 'city', 'salary', 'education', 'experience', 'employment_type'], 'string', 'max' => 255],
                [['firm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Firm::className(), 'targetAttribute' => ['firm_id' => 'id']],
                [['agree'], 'compare', 'operator' => '==', 'compareValue' => true, 'message' => 'You must agree to the terms and conditions', 'on' => self::SCENARIO_CREATE],
                [['agree'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'category' => 'Category',
            'city' => 'City',
            'salary' => 'Salary',
            'education' => 'Education',
            'experience' => 'Experience',
            'employment_type' => 'Employment type',
            'description' => 'Description',
            'public' => 'Public',
            'created_at' => 'date Added',
            'updated_at' => 'Updated At',
            'firm_id' => 'Firm ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm() {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id']);
    }

}
