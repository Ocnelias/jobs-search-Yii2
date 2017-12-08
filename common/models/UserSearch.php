<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
     public $min_price;
     public $max_price;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'public', 'status', 'created_at', 'updated_at','min_price','max_price'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'contact_email', 'objective', 'salary', 'employment_type', 'first_name', 'last_name', 'photo', 'city', 'sex', 'phone', 'birth', 'education_qualification', 'education_occupation', 'education_university', 'education_from_month', 'education_from_year', 'education_to_month', 'education_to_year', 'description'], 'safe'],
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
        $query = User::find();

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
            'public' => $this->public,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_email', $this->contact_email])
            ->andFilterWhere(['like', 'objective', $this->objective])
            ->andFilterWhere(['>', 'salary', $this->min_price])
	    ->andFilterWhere(['<', 'salary', $this->max_price])
            ->andFilterWhere(['like', 'employment_type', $this->employment_type])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'birth', $this->birth])
            ->andFilterWhere(['like', 'education_qualification', $this->education_qualification])
            ->andFilterWhere(['like', 'education_occupation', $this->education_occupation])
            ->andFilterWhere(['like', 'education_university', $this->education_university])
            ->andFilterWhere(['like', 'education_from_month', $this->education_from_month])
            ->andFilterWhere(['like', 'education_from_year', $this->education_from_year])
            ->andFilterWhere(['like', 'education_to_month', $this->education_to_month])
            ->andFilterWhere(['like', 'education_to_year', $this->education_to_year])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
