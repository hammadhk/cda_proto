<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Complainant".
 *
 * @property integer $id
 * @property string $cnic
 * @property string $name
 * @property string $phone
 * @property integer $address_house_number
 * @property string $address_street_number
 * @property integer $address_sector_id
 *
 * @property Sector $sector
 */
class Complainant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Complainant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cnic', 'name'], 'required'],
            [['address_sector_id'], 'integer'],
            [['cnic'], 'string', 'max' => 15],
            [['phone'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 32],
            [['address_house_number', 'address_street_number'], 'string', 'max' => 8],
            [['cnic'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cnic' => Yii::t('app', 'Cnic'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'address_house_number' => Yii::t('app', 'Address House Number'),
            'address_street_number' => Yii::t('app', 'Address Street Number'),
            'address_sector_id' => Yii::t('app', 'Sector ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'address_sector_id']);
    }
}
