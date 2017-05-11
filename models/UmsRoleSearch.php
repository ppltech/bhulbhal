<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UmsRole;

/**
 * UmsRoleSearch represents the model behind the search form about `app\models\UmsRole`.
 */
class UmsRoleSearch extends UmsRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'role_area', 'role_status', 'role_created_by', 'role_updated_by'], 'integer'],
            [['role_name', 'role_description', 'additional_id', 'role_creation_time', 'role_updated_time'], 'safe'],
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
        $query = UmsRole::find();

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
            'role_id' => $this->role_id,
            'role_area' => $this->role_area,
            'role_status' => $this->role_status,
            'role_creation_time' => $this->role_creation_time,
            'role_created_by' => $this->role_created_by,
            'role_updated_time' => $this->role_updated_time,
            'role_updated_by' => $this->role_updated_by,
        ]);

        $query->andFilterWhere(['like', 'role_name', $this->role_name])
            ->andFilterWhere(['like', 'role_description', $this->role_description])
            ->andFilterWhere(['like', 'additional_id', $this->additional_id]);

        return $dataProvider;
    }
}
