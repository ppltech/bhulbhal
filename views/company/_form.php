<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Company;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */

$dataCategory=ArrayHelper::map(Company::find()->where(['!=', 'sys_company_id', '1'])->asArray()->all(), 'sys_company_id', 'company_name');

?>

<div class="row">
						
						<div class="col-md-12">

    <?php $form = ActiveForm::begin(); ?>
<section class="panel">
									
				<div class="panel-body">
				<?= $form->field($model, 'parent_sys_company_id')->dropDownList($dataCategory,['prompt'=>'Root']) ?>
        		<?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'label_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'custom_label')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'address_id')->textInput() ?>
                <?= $form->field($model, 'company_status')->textInput() ?>
                
                
                <?= $form->field($model, 'company_id')->textInput() ?>
                <?= $form->field($model, 'company_creation_time')->textInput() ?>
                <?= $form->field($model, 'company_created_by')->textInput() ?>
                <?= $form->field($model, 'company_updated_time')->textInput() ?>
                <?= $form->field($model, 'company_updated_by')->textInput() ?>
        
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
</section>
    <?php ActiveForm::end(); ?>

</div>
						<!-- col-md-6 -->
						
					</div>
