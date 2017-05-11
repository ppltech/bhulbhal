<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UmsRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ums-role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'role_name') ?>

    <?= $form->field($model, 'role_description') ?>

    <?= $form->field($model, 'role_area') ?>

    <?= $form->field($model, 'role_status') ?>

    <?php // echo $form->field($model, 'additional_id') ?>

    <?php // echo $form->field($model, 'role_creation_time') ?>

    <?php // echo $form->field($model, 'role_created_by') ?>

    <?php // echo $form->field($model, 'role_updated_time') ?>

    <?php // echo $form->field($model, 'role_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
