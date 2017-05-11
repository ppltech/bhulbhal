<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ums_user".
 *
 
  * @property integer $user_id
  * @property string $user_access_key
  * @property string $username
  * @property string $password
  * @property integer $user_type
  * @property integer $user_status
  * @property string $additional_id
  * @property string $first_name
  * @property string $last_name
  * @property string $email_id
  * @property string $user_creation_stamp
  * @property integer $user_created_by
  * @property string $user_updated_stamp
  * @property integer $user_updated_by
  *
 * @property UmsLoginDetails[] $umsLoginDetails
 * @property UmsSessionDetails[] $umsSessionDetails
 * @property UmsUserRoleMap[] $umsUserRoleMaps
 * @property UmsUserVerification[] $umsUserVerifications
 */
class UmsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ums_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_access_key', 'username', 'password', 'user_type', 'user_status', 'first_name', 'last_name', 'user_creation_stamp', 'user_updated_stamp'], 'required'],
            [['user_type', 'user_status', 'user_created_by', 'user_updated_by'], 'integer'],
            [['user_creation_stamp', 'user_updated_stamp'], 'safe'],
            [['user_access_key', 'username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 90],
            [['additional_id', 'email_id'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['user_access_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_access_key' => 'User Access Key',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
            'user_status' => 'User Status',
            'additional_id' => 'Additional ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email_id' => 'Email ID',
            'user_creation_stamp' => 'User Creation Stamp',
            'user_created_by' => 'User Created By',
            'user_updated_stamp' => 'User Updated Stamp',
            'user_updated_by' => 'User Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsLoginDetails()
    {
        return $this->hasMany(UmsLoginDetails::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsSessionDetails()
    {
        return $this->hasMany(UmsSessionDetails::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsUserRoleMaps()
    {
        return $this->hasMany(UmsUserRoleMap::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUmsUserVerifications()
    {
        return $this->hasMany(UmsUserVerification::className(), ['user_id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UmsUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UmsUserQuery(get_called_class());
    }
}
