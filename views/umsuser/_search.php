<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UmsUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ums-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_access_key') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'user_status') ?>

    <?php // echo $form->field($model, 'additional_id') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'email_id') ?>

    <?php // echo $form->field($model, 'user_creation_stamp') ?>

    <?php // echo $form->field($model, 'user_created_by') ?>

    <?php // echo $form->field($model, 'user_updated_stamp') ?>

    <?php // echo $form->field($model, 'user_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
