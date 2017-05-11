<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 
  * @property integer $sys_company_id
  * @property string $company_name
  * @property string $label_name
  * @property string $custom_label
  * @property integer $address_id
  * @property integer $company_status
  * @property integer $parent_sys_company_id
  * @property integer $company_id
  * @property string $company_creation_time
  * @property integer $company_created_by
  * @property string $company_updated_time
  * @property integer $company_updated_by
  */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'label_name', 'custom_label', 'company_status', 'company_creation_time', 'company_created_by', 'company_updated_time', 'company_updated_by'], 'required'],
            [['address_id', 'company_status', 'parent_sys_company_id', 'company_id', 'company_created_by', 'company_updated_by'], 'integer'],
            [['company_creation_time', 'company_updated_time'], 'safe'],
            [['company_name', 'label_name', 'custom_label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_company_id' => 'Sys Company ID',
            'company_name' => 'Company Name',
            'label_name' => 'Label Name',
            'custom_label' => 'Custom Label',
            'address_id' => 'Address ID',
            'company_status' => 'Company Status',
            'parent_sys_company_id' => 'Parent Sys Company ID',
            'company_id' => 'Company ID',
            'company_creation_time' => 'Company Creation Time',
            'company_created_by' => 'Company Created By',
            'company_updated_time' => 'Company Updated Time',
            'company_updated_by' => 'Company Updated By',
        ];
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}
