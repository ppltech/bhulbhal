<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UmsUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ums-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_access_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type')->textInput() ?>

    <?= $form->field($model, 'user_status')->textInput() ?>

    <?= $form->field($model, 'additional_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_creation_stamp')->textInput() ?>

    <?= $form->field($model, 'user_created_by')->textInput() ?>

    <?= $form->field($model, 'user_updated_stamp')->textInput() ?>

    <?= $form->field($model, 'user_updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
