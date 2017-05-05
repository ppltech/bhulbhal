<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_user_role_map".
 *
 * @property integer $ums_user_role_map_id
 * @property integer $user_id
 * @property integer $role_id
 *
 * @property UmsUser $user
 * @property UmsRole $role
 */
class UmsUserRoleMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_user_role_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UmsUser::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UmsRole::className(), 'targetAttribute' => ['role_id' => 'role_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ums_user_role_map_id' => 'Ums User Role Map ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UmsUser::className(), ['user_id' => 'user_id']);
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
     * @return UmsUserRoleMapQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsUserRoleMapQuery(get_called_class());
    }
}
