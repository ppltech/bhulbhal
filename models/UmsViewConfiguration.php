<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_view_configuration".
 *
 
  * @property integer $ums_view_configuration_id
  * @property string $table_name
  * @property string $attribute_name
  * @property integer $index_view
  * @property integer $create_view
  * @property integer $update_view
  * @property integer $view_view
  */
class UmsViewConfiguration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_view_configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index_view', 'create_view', 'update_view', 'view_view'], 'integer'],
            [['table_name', 'attribute_name'], 'string', 'max' => 155],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ums_view_configuration_id' => 'Ums View Configuration ID',
            'table_name' => 'Table Name',
            'attribute_name' => 'Attribute Name',
            'index_view' => 'Index View',
            'create_view' => 'Create View',
            'update_view' => 'Update View',
            'view_view' => 'View View',
        ];
    }

    /**
     * @inheritdoc
     * @return UmsViewConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsViewConfigurationQuery(get_called_class());
    }
}
