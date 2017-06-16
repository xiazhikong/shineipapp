<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patents;

/**
 * PatentsSearch represents the model behind the search form about `app\models\Patents`.
 */
class PatentsSearch extends Patents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patentID', 'clientID'], 'integer'],
            [['patentApplicant', 'patentEACNumber', 'patentApplicationCode', 'patentType', 'patentPendingEvents', 'patentTitle', 'patentContact', 'patentNote', 'patentAgent', 'patentProcessManager'], 'safe'],
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
        $query = Patents::find();

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
            'patentID' => $this->patentID,
            'clientID' => $this->clientID,
        ]);

        $query->andFilterWhere(['like', 'patentApplicant', $this->patentApplicant])
            ->andFilterWhere(['like', 'patentEACNumber', $this->patentEACNumber])
            ->andFilterWhere(['like', 'patentApplicationCode', $this->patentApplicationCode])
            ->andFilterWhere(['like', 'patentType', $this->patentType])
            ->andFilterWhere(['like', 'patentPendingEvents', $this->patentPendingEvents])
            ->andFilterWhere(['like', 'patentTitle', $this->patentTitle])
            ->andFilterWhere(['like', 'patentContact', $this->patentContact])
            ->andFilterWhere(['like', 'patentNote', $this->patentNote])
            ->andFilterWhere(['like', 'patentAgent', $this->patentAgent])
            ->andFilterWhere(['like', 'patentProcessManager', $this->patentProcessManager]);

        return $dataProvider;
    }
}
