<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UmsUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ums Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ums-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ums User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_access_key',
            'username',
            //'password',
            'user_type',
            // 'user_status',
            // 'additional_id',
             'first_name',
            // 'last_name',
            // 'email_id:email',
            // 'user_creation_stamp',
            // 'user_created_by',
            // 'user_updated_stamp',
            // 'user_updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
