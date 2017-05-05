<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UmsUserRoleMap]].
 *
 * @see UmsUserRoleMap
 */
class UmsUserRoleMapQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UmsUserRoleMap[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UmsUserRoleMap|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
