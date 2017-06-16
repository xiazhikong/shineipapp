<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientsSearch represents the model behind the search form about `app\models\Clients`.
 */
class ClientsSearch extends Clients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientID'], 'integer'],
            [['clientUsername', 'clientPassword', 'clientOrgnization', 'clientName', 'clientEmail', 'clientCellPhone', 'clientLandline', 'ClientAddress', 'clientLiaison', 'clientCreateDate', 'clientNote'], 'safe'],
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
        $query = Clients::find();

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
            'clientID' => $this->clientID,
            'clientCreateDate' => $this->clientCreateDate,
        ]);

        $query->andFilterWhere(['like', 'clientUsername', $this->clientUsername])
            ->andFilterWhere(['like', 'clientPassword', $this->clientPassword])
            ->andFilterWhere(['like', 'clientOrgnization', $this->clientOrgnization])
            ->andFilterWhere(['like', 'clientName', $this->clientName])
            ->andFilterWhere(['like', 'clientEmail', $this->clientEmail])
            ->andFilterWhere(['like', 'clientCellPhone', $this->clientCellPhone])
            ->andFilterWhere(['like', 'clientLandline', $this->clientLandline])
            ->andFilterWhere(['like', 'ClientAddress', $this->ClientAddress])
            ->andFilterWhere(['like', 'clientLiaison', $this->clientLiaison])
            ->andFilterWhere(['like', 'clientNote', $this->clientNote]);

        return $dataProvider;
    }
}
