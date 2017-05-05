<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UmsUser */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Ums Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ums-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'user_access_key',
            'username',
            'password',
            'user_type',
            'user_status',
            'additional_id',
            'first_name',
            'last_name',
            'email_id:email',
            'user_creation_stamp',
            'user_created_by',
            'user_updated_stamp',
            'user_updated_by',
        ],
    ]) ?>

</div>
