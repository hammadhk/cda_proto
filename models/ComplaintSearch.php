<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Complaint;

/**
 * ComplaintSearch represents the model behind the search form about `app\models\Complaint`.
 */
class ComplaintSearch extends Complaint
{
	public $cnic;
	public $name;
	public $status;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'complainant_id'], 'integer'],
            [['registration_time', 'cnic', 'name', 'status'], 'safe'],
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
        $query = Complaint::find();
		$query->joinWith(array('status', 'complainant'));
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Complaint.id' => $this->id,
            'Complaint.registration_time' => $this->registration_time,
        ]);

        $query->andFilterWhere(array('like', 'Complainant.cnic', $this->cnic));
        $query->andFilterWhere(array('like', 'Complainant.name', $this->name));
        $query->andFilterWhere(array('like', 'ComplaintStatus.value', $this->status));

        return $dataProvider;
    }
}
