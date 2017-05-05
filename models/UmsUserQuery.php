<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UmsUser]].
 *
 * @see UmsUser
 */
class UmsUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UmsUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UmsUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
