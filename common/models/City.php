<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $city
 * @property string $city_ascii
 * @property string $lat
 * @property string $lng
 * @property string $pop
 * @property string $country
 * @property string $iso2
 * @property string $iso3
 * @property string $province
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lat', 'lng', 'pop'], 'number'],
            [['city', 'city_ascii', 'country', 'iso2', 'iso3', 'province'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'city_ascii' => 'City Ascii',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'pop' => 'Pop',
            'country' => 'Country',
            'iso2' => 'Iso2',
            'iso3' => 'Iso3',
            'province' => 'Province',
        ];
    }
}
