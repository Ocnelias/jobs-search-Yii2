<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Job;

/**
 * JobSearch represents the model behind the search form about `common\models\Job`.
 */
class JobSearch extends Job
{
    
     public $min_price;
     public $max_price;
     
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'public', 'created_at', 'updated_at', 'firm_id','min_price','max_price'], 'integer'],
            [['position', 'category', 'city', 'salary', 'education', 'experience', 'employment_type', 'description'], 'safe'],
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
        $query = Job::find();
        
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
            'position' => $this->position,
            'public' => $this->public,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'firm_id' => $this->firm_id,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'salary', $this->salary])
            ->andFilterWhere(['>', 'salary', $this->min_price])
	    ->andFilterWhere(['<', 'salary', $this->max_price])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'employment_type', $this->employment_type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
