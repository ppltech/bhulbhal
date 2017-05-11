<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UmsViewConfiguration]].
 *
 * @see UmsViewConfiguration
 */
class UmsViewConfigurationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UmsViewConfiguration[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UmsViewConfiguration|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
