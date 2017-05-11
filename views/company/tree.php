<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Company;
$dataCategory=ArrayHelper::map(Company::find()->where(['!=', 'sys_company_id', '1'])->asArray()->all(), 'sys_company_id', 'company_name');
?>
<link href="<?php echo Yii::getAlias('@web').'/web/assets/stylesheets/easyTree.css'?>" rel="stylesheet">
<script src="<?php echo Yii::getAlias('@web').'/web/assets/javascripts/easyTree.min.js'?>"></script>

<section role="main" class="content-body">

<div class="col-md-6">
<div class="easy-tree">
<?php 
echo \app\components\CompanyTreeWidget::widget(); 
//echo \app\components\umsbuttons\CustomButtonWidget::widget(); 
//$this->widget('application.widget.CustomButtonWidget',array('type'=>'create'));
//echo app\components\umsbuttons\CustomButtonWidget::widget(['button' => 'add']);
?>
</div>
</div>
<div class="col-md-6">
    <section class="panel">
	<div class="panel-body">  
	<div id="treeDetailDefaultMessage">Please click on tree to see detail</div>   
	<div style="display: none;" id="treeDetailDOuter">
	<div class="form-group">
   			<label class="col-sm-6 control-label">Company Name</label>
   			<div class="col-sm-6">
      			<div id="lbl_company_name"></div>
   			</div>
		</div>
		<div class="form-group">
   			<label class="col-sm-6 control-label">Company Label Name</label>
   			<div class="col-sm-6">
      			<div id="lbl_label_name"></div>
   			</div>
		</div>
		<div class="form-group">
   			<label class="col-sm-6 control-label">Company Custom Label</label>
   			<div class="col-sm-6">
      			<div id="lbl_custom_label"></div>
   			</div>
		</div>
		<div class ="container-fluid">
  <div class ="row">
    <div class ="col-md-3 col-sm-3">
        <a class="btn btn-success" href="javascript:void(0)" id="editCompanyToTree">Update</a>
    </div>
    <div class ="col-md-3 col-sm-3">
        <a class="btn btn-primary" href="javascript:void(0)" id="deleteCompanyFromTree">Delete</a>
     </div>
     <div class ="col-md-6 col-sm-6">
        <a class="btn btn-success" href="javascript:void(0)" id="addCompanyToTree">Add Company</a>
     </div>
  </div>
</div>
		
	</div> 
	<div id="createNewpdateTreeOuter" style="display: none;">
		 <?php $form = ActiveForm::begin(); ?>
<section class="panel">
									
				<div class="panel-body">
				<input type="hidden" id="company-sys_company_id"  name="Company[sys_company_id]" >
				<?= $form->field($model, 'parent_sys_company_id')->dropDownList($dataCategory,['prompt'=>'Root']) ?>
        		<?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'label_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'custom_label')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'address_id')->textInput() ?>
                <?= $form->field($model, 'company_status')->textInput() ?>
                <?= $form->field($model, 'company_id')->textInput() ?>        
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
</section>
    <?php ActiveForm::end(); ?>
	</div>
	
	</div>						
	</section>
</div>

</section>
<script>
(function ($) {
    function init() {
        $('.easy-tree').EasyTree({
            addable: false,
            editable: false,
            deletable: false
        });
    }

    window.onload = init();
})(jQuery)
var conpamyArr={};
$(document).ready(function(){
	$(".nodeClass").click(function(){
		var CompId=$(this).closest('li').attr('id').split('_')[2];
		$.ajax({
			  method: "POST",
			  url: "<?php echo Yii::$app->request->baseUrl.'/company/getcompanybyid'?>",
			  data: { id: CompId}
			})
			  .done(function( msg ) {
				  $("#treeDetailDefaultMessage").hide();
				  $("#treeDetailDOuter").show();
				  $("#createNewpdateTreeOuter").hide();
			    var conpany=jQuery.parseJSON(msg);
			    console.log(conpany);
			    conpamyArr={'company_name':conpany.company_name,
					    'custom_label':conpany.custom_label,
					    'label_name':conpany.label_name,
					    'address_id':conpany.address_id,
					    'company_status':conpany.company_status,
					    'company_id':conpany.company_id,
					    'parent_sys_company_id':conpany.parent_sys_company_id,
					    'sys_company_id':conpany.sys_company_id};
			    
			    $("#lbl_company_name").html(conpany.company_name);
			    $("#lbl_label_name").html(conpany.label_name);
			    $("#lbl_custom_label").html(conpany.custom_label);
			  });
	})

	$("#addCompanyToTree").click(function(){
		$("#treeDetailDOuter").hide();
		$("#createNewpdateTreeOuter").show();
		$("#company-sys_company_id").val();
		$("#company-company_name").val();
		$("#company-label_name").val();
		$("#company-custom_label").val();
		$("#company-address_id").val();
		$("#company-company_status").val();
		$("#company-company_id").val();
		$("#company-parent_sys_company_id").val('');
		})

		$("#editCompanyToTree").click(function(){
			$("#treeDetailDOuter").hide();
			$("#createNewpdateTreeOuter").show();
			$("#company-sys_company_id").val(conpamyArr.sys_company_id);
			$("#company-company_name").val(conpamyArr.company_name);
			$("#company-label_name").val(conpamyArr.label_name);
			$("#company-custom_label").val(conpamyArr.custom_label);
			$("#company-address_id").val(conpamyArr.address_id);
			$("#company-company_status").val(conpamyArr.company_status);
			$("#company-company_id").val(conpamyArr.company_id);
			if(conpamyArr.parent_sys_company_id=='0'){
				$("#company-parent_sys_company_id").val('');
				}else{
					$("#company-parent_sys_company_id").val(conpamyArr.parent_sys_company_id);
					}
			
			
			})

			$("#deleteCompanyFromTree").click(function(){
				var r = confirm("Are you sure you want to delete this item?");
				if(r){
						var id=conpamyArr.sys_company_id;
						$.ajax({
							  method: "POST",
							  url: "<?php echo Yii::$app->request->baseUrl.'/company/deletecompanyfromtree'?>",
							  data: { id: conpamyArr.sys_company_id}
							})
						.done(function( msg ){
							alert(msg);
							location.reload();
							})
					}
				})
})
    
</script>
