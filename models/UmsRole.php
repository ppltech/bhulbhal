<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_role".
 *
 * @property integer $role_id
 * @property string $role_name
 * @property string $role_description
 * @property integer $role_area
 * @property integer $role_status
 * @property string $additional_id
 * @property string $role_creation_time
 * @property integer $role_created_by
 * @property string $role_updated_time
 * @property integer $role_updated_by
 *
 * @property UmsRoleOptionMap[] $umsRoleOptionMaps
 * @property UmsUserRoleMap[] $umsUserRoleMaps
 */
class UmsRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'role_area', 'role_status', 'role_creation_time', 'role_created_by', 'role_updated_time', 'role_updated_by'], 'required'],
            [['role_area', 'role_status', 'role_created_by', 'role_updated_by'], 'integer'],
            [['role_creation_time', 'role_updated_time'], 'safe'],
            [['role_name'], 'string', 'max' => 50],
            [['role_description'], 'string', 'max' => 500],
            [['additional_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_description' => 'Role Description',
            'role_area' => 'Role Area',
            'role_status' => 'Role Status',
            'additional_id' => 'Additional ID',
            'role_creation_time' => 'Role Creation Time',
            'role_created_by' => 'Role Created By',
            'role_updated_time' => 'Role Updated Time',
            'role_updated_by' => 'Role Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsRoleOptionMaps()
    {
        return $this->hasMany(UmsRoleOptionMap::className(), ['role_id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsUserRoleMaps()
    {
        return $this->hasMany(UmsUserRoleMap::className(), ['role_id' => 'role_id']);
    }

    /**
     * @inheritdoc
     * @return UmsRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsRoleQuery(get_called_class());
    }
}
