<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UmsRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
						
						<div class="col-md-12">

    <?php $form = ActiveForm::begin(); ?>
<section class="panel">
									
									<div class="panel-body">
        <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

        
                <?= $form->field($model, 'role_description')->textInput(['maxlength' => true]) ?>

        
                <?= $form->field($model, 'role_area')->textInput() ?>

        
                <?= $form->field($model, 'role_status')->textInput() ?>

        
                <?= $form->field($model, 'additional_id')->textInput(['maxlength' => true]) ?>

        
                <?= $form->field($model, 'role_creation_time')->textInput() ?>

        
                <?= $form->field($model, 'role_created_by')->textInput() ?>

        
                <?= $form->field($model, 'role_updated_time')->textInput() ?>

        
                <?= $form->field($model, 'role_updated_by')->textInput() ?>

        
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
</section>
    <?php ActiveForm::end(); ?>

</div>
						<!-- col-md-6 -->
						
					</div>
