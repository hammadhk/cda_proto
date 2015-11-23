<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Complaint".
 *
 * @property integer $id
 * @property integer $complainant_id
 * @property string $registration_time
 * @property string $description
 * @property string $status_id
 */
class Complaint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Complaint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['complainant_id'], 'required'],
            [['complainant_id'], 'integer'],
            [['registration_time'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['status_id'], 'default', 'value'=>1],
            [['description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'complainant_id' => Yii::t('app', 'Complainant ID'),
            'registration_time' => Yii::t('app', 'Registration Time'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
    
    public function getComplainant()
    {
    	return $this->hasOne(Complainant::className(), ['id' => 'complainant_id']);
    }
    
    public function getComplainantName(){
    	$complainant = $this->complainant;
    	return isset($complainant->name) ? $complainant->name:null;
    }
    
    public function setComplainantName($name){
    	;
    }
    
    public function getComplainantCnic(){
    	$complainant = $this->complainant;
    	return isset($complainant->cnic) ? $complainant->cnic:null;
    }
    
    public function setComplainantCnic($cnic){
    	;
    }
    
    public function getStatus()
    {
    	return $this->hasOne(ComplaintStatus::className(), ['id' => 'status_id']);
    }
    
    public function getStatusValue()
    {
    	$status = $this->status;
    	return isset($status->value) ? $status->value:null;
    }
    
    public function setStatusValue($status){
    	;
    }
}
