<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UmsUser */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-info main-login-sec">
	<div class="panel-heading">Log in to HR & PAYROLL Management System</div>
	<div class="panel-body">
		<?php $form = ActiveForm::begin(); ?>
		<div class="login-form">
		    		    <div class="input-box input-left">
			<label for="username">User Name:</label><br>
			<input type="text" id="umsuser-username"  name="UmsUser[username]" class="required-entry form-control"  />
		    </div> 
		    
		    <div class="input-box input-right">
			<label for="password">Password:</label><br>
			<input type="password" id="umsuser-password" class="form-control" name="UmsUser[password]" class="required-entry form-control"  />
		    </div>
		    <div class="clear"></div>
		    <div class="form-buttons">
			<button type="submit" title="Add" class="btn btn-default" id="formButton" >Login</button>
		    </div>
		</div>
		<p class="legal"></p>
	    <?php ActiveForm::end(); ?>
	    </div>
</div>			