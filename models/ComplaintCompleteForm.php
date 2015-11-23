<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactCompleteForm is the model behind the complaint creation page.
 */
class ComplaintCompleteForm extends Model
{
    public $cnic;
	public $name;
	public $phone;
	public $house;
	public $street;
	public $sector;
	public $complaint;
    

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['cnic', 'name', 'complaint'], 'required'],
            [['phone', 'house', 'street', 'sector'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'cnic' => 'CNIC Number',
            'name' => 'Name',
            'phone' => 'Phone',
            'house' => 'House',
            'street' => 'Street',
            'sector' => 'Sector',
            'complaint' => 'Complaint'
        ];
    }
    
    public function getComplainant()
    {
    	$complainant = Complainant::find()->where(array('cnic' => $this->cnic))->one();
    	return $complainant;
    }
}
