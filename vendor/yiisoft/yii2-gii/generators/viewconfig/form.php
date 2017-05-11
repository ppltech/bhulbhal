<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\form\Generator */


echo $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div id="viewConfigOuter"></div>
<div style="margin-top: 10px;margin-bottom: 10px;">
<input type="button" name="check_view_configuration" id="check_view_configuration" value="Check Configuration" class="btn btn-primary" onclick="return loadDoc()">
</div>
<script type="text/javascript">

function loadDoc() {
	var tablename=document.getElementById("generator-tablename").value;
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     document.getElementById("viewConfigOuter").innerHTML = this.responseText;
	    }
	  };
	  
	  xhttp.open("GET", "<?php echo Yii::$app->request->baseUrl.'/viewconfiguration/gettableinfo?table='?>"+tablename+"", true);
	  xhttp.send();
	}

$(document).ready(function(){
	
	$(document).on('change', '.attribute_option_value', function() {
		var id=$(this).attr("id");
		var chnagevalue=$(this).val();

		/* $.ajax({
			  method: "POST",
			  url: "some.php",
			  data: { name: "John", location: "Boston" }
			})
			  .done(function( msg ) {
			    alert( "Data Saved: " + msg );
			  }); */
		
	});
})

</script>

