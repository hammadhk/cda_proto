<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ComplaintStatus".
 *
 * @property integer $id
 * @property string $value
 *
 * @property Complaint[] $complaints
 */
class ComplaintStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ComplaintStatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaints()
    {
        return $this->hasMany(Complaint::className(), ['status_id' => 'id']);
    }
}
