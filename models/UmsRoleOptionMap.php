<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_role_option_map".
 *
 * @property integer $role_id
 * @property integer $option_id
 * @property integer $enable
 *
 * @property UmsOption $option
 * @property UmsRole $role
 */
class UmsRoleOptionMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_role_option_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'option_id', 'enable'], 'required'],
            [['role_id', 'option_id', 'enable'], 'integer'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => UmsOption::className(), 'targetAttribute' => ['option_id' => 'option_id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UmsRole::className(), 'targetAttribute' => ['role_id' => 'role_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'option_id' => 'Option ID',
            'enable' => 'Enable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(UmsOption::className(), ['option_id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(UmsRole::className(), ['role_id' => 'role_id']);
    }

    /**
     * @inheritdoc
     * @return UmsRoleOptionMapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsRoleOptionMapQuery(get_called_class());
    }
}
