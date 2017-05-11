<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_option".
 *
 * @property integer $option_id
 * @property string $option_name
 * @property string $option_description
 * @property integer $option_type
 * @property integer $option_area
 * @property integer $option_status
 * @property string $option_link
 * @property string $option_icon
 * @property integer $option_order
 * @property integer $parent_option_id
 * @property integer $enable_toolbox
 * @property string $object_reference_key
 * @property integer $level
 * @property string $icon_class
 * @property integer $add_data
 * @property integer $edit_data
 * @property integer $delete_data
 * @property integer $view_data
 *
 * @property UmsRoleOptionMap[] $umsRoleOptionMaps
 */
class UmsOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_name', 'option_type', 'option_area', 'option_status', 'parent_option_id'], 'required'],
            [['option_type', 'option_area', 'option_status', 'option_order', 'parent_option_id', 'enable_toolbox', 'level', 'add_data', 'edit_data', 'delete_data', 'view_data'], 'integer'],
            [['option_name'], 'string', 'max' => 25],
            [['option_description', 'option_link'], 'string', 'max' => 200],
            [['option_icon', 'object_reference_key', 'icon_class'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'option_name' => 'Option Name',
            'option_description' => 'Option Description',
            'option_type' => 'Option Type',
            'option_area' => 'Option Area',
            'option_status' => 'Option Status',
            'option_link' => 'Option Link',
            'option_icon' => 'Option Icon',
            'option_order' => 'Option Order',
            'parent_option_id' => 'Parent Option ID',
            'enable_toolbox' => 'Enable Toolbox',
            'object_reference_key' => 'Object Reference Key',
            'level' => 'Level',
            'icon_class' => 'Icon Class',
            'add_data' => 'Add Data',
            'edit_data' => 'Edit Data',
            'delete_data' => 'Delete Data',
            'view_data' => 'View Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsRoleOptionMaps()
    {
        return $this->hasMany(UmsRoleOptionMap::className(), ['option_id' => 'option_id']);
    }

    /**
     * @inheritdoc
     * @return UmsOptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsOptionQuery(get_called_class());
    }
}
