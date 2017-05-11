<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanyrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sys_company_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'label_name') ?>

    <?= $form->field($model, 'custom_label') ?>

    <?= $form->field($model, 'address_id') ?>

    <?php // echo $form->field($model, 'company_status') ?>

    <?php // echo $form->field($model, 'parent_sys_company_id') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'company_creation_time') ?>

    <?php // echo $form->field($model, 'company_created_by') ?>

    <?php // echo $form->field($model, 'company_updated_time') ?>

    <?php // echo $form->field($model, 'company_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
