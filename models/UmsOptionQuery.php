<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UmsOption]].
 *
 * @see UmsOption
 */
class UmsOptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UmsOption[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UmsOption|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
