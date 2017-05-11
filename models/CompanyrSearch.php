<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;

/**
 * CompanyrSearch represents the model behind the search form about `app\models\Company`.
 */
class CompanyrSearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sys_company_id', 'address_id', 'company_status', 'parent_sys_company_id', 'company_id', 'company_created_by', 'company_updated_by'], 'integer'],
            [['company_name', 'label_name', 'custom_label', 'company_creation_time', 'company_updated_time'], 'safe'],
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
        $query = Company::find();

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
            'sys_company_id' => $this->sys_company_id,
            'address_id' => $this->address_id,
            'company_status' => $this->company_status,
            'parent_sys_company_id' => $this->parent_sys_company_id,
            'company_id' => $this->company_id,
            'company_creation_time' => $this->company_creation_time,
            'company_created_by' => $this->company_created_by,
            'company_updated_time' => $this->company_updated_time,
            'company_updated_by' => $this->company_updated_by,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'label_name', $this->label_name])
            ->andFilterWhere(['like', 'custom_label', $this->custom_label]);

        return $dataProvider;
    }
}
