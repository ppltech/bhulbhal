<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UmsUser;

/**
 * UmsUserSearch represents the model behind the search form about `app\models\UmsUser`.
 */
class UmsUserSearch extends UmsUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_type', 'user_status', 'user_created_by', 'user_updated_by'], 'integer'],
            [['user_access_key', 'username', 'password', 'additional_id', 'first_name', 'last_name', 'email_id', 'user_creation_stamp', 'user_updated_stamp'], 'safe'],
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
        $query = UmsUser::find();

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
            'user_id' => $this->user_id,
            'user_type' => $this->user_type,
            'user_status' => $this->user_status,
            'user_creation_stamp' => $this->user_creation_stamp,
            'user_created_by' => $this->user_created_by,
            'user_updated_stamp' => $this->user_updated_stamp,
            'user_updated_by' => $this->user_updated_by,
        ]);

        $query->andFilterWhere(['like', 'user_access_key', $this->user_access_key])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'additional_id', $this->additional_id])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id]);

        return $dataProvider;
    }
}
