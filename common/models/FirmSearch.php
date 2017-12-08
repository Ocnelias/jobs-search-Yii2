<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Firm;

/**
 * FirmSearch represents the model behind the search form about `common\models\Firm`.
 */
class FirmSearch extends Firm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show_website', 'show_email', 'show_phone', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'city', 'category', 'website', 'email', 'phone', 'logo', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Firm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'show_website' => $this->show_website,
            'show_email' => $this->show_email,
            'show_phone' => $this->show_phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
