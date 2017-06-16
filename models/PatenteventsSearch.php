<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patentevents;

/**
 * PatenteventsSearch represents the model behind the search form about `app\models\Patentevents`.
 */
class PatenteventsSearch extends Patentevents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventID', 'patentID'], 'integer'],
            [['eventAbstract', 'eventContent', 'eventNote', 'eventFileLinks', 'eventCreatedDatetime', 'eventDeadline', 'eventCreator', 'eventSatus', 'eventSatusUpdatedDatetime', 'eventSatusUpdatedByWho'], 'safe'],
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
        $query = Patentevents::find();

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
            'eventID' => $this->eventID,
            'patentID' => $this->patentID,
            'eventCreatedDatetime' => $this->eventCreatedDatetime,
            'eventDeadline' => $this->eventDeadline,
            'eventSatusUpdatedDatetime' => $this->eventSatusUpdatedDatetime,
        ]);

        $query->andFilterWhere(['like', 'eventAbstract', $this->eventAbstract])
            ->andFilterWhere(['like', 'eventContent', $this->eventContent])
            ->andFilterWhere(['like', 'eventNote', $this->eventNote])
            ->andFilterWhere(['like', 'eventFileLinks', $this->eventFileLinks])
            ->andFilterWhere(['like', 'eventCreator', $this->eventCreator])
            ->andFilterWhere(['like', 'eventSatus', $this->eventSatus])
            ->andFilterWhere(['like', 'eventSatusUpdatedByWho', $this->eventSatusUpdatedByWho]);

        return $dataProvider;
    }
}
