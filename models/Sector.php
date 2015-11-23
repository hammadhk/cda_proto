<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Sector".
 *
 * @property integer $id
 * @property string $value
 *
 * @property Complainant[] $complainants
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 8]
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
    public function getComplainants()
    {
        return $this->hasMany(Complainant::className(), ['sector_id' => 'id']);
    }
}
