<table border="1">
  <tr >
    <th style="text-align: center;padding: 5px;">Table Name</th>
    <th style="text-align: center;padding: 5px;">Listing Page</th>
    <th style="text-align: center;padding: 5px;">Create Page</th>
    <th style="text-align: center;padding: 5px;">Update Page</th>
    <th style="text-align: center;padding: 5px;">View Page</th>
    <th style="text-align: center;padding: 5px;">Sequence</th>
  </tr>
  <?php foreach ($model as $value) { ?>
  
  <tr>
    <td style="text-align: left;padding-left: 5px;"><?php echo $value->attribute_name;?></td>
    <td style="text-align: center ;">
    <select name="<?php echo $value->ums_view_configuration_id;?>#index_view#<?php echo $value->attribute_name;?>" id="<?php echo $value->ums_view_configuration_id;?>#index_view#<?php echo $value->attribute_name;?>" class="attribute_option_value">
    	<option value="1" <?php if($value->index_view==1){?> selected="selected"<?php } ?>>Show</option>
    	<option value="0" <?php if($value->index_view==0){?> selected="selected"<?php } ?>>Hide</option>
    </select>
    </td>
    <td style="text-align: center ;">
    <select name="<?php echo $value->ums_view_configuration_id;?>#create_view#<?php echo $value->attribute_name;?>" id="<?php echo $value->ums_view_configuration_id;?>#create_view#<?php echo $value->attribute_name;?>" class="attribute_option_value">
    	<option value="1" <?php if($value->create_view==1){?> selected="selected"<?php } ?>>Show</option>
    	<option value="0" <?php if($value->create_view==0){?> selected="selected"<?php } ?>>Hide</option>
    </select>
    </td>
    <td style="text-align: center ;">
    <select name="<?php echo $value->ums_view_configuration_id;?>#update_view#<?php echo $value->attribute_name;?>" id="<?php echo $value->ums_view_configuration_id;?>#update_view#<?php echo $value->attribute_name;?>" class="attribute_option_value">
    	<option value="1" <?php if($value->update_view==1){?> selected="selected"<?php } ?>>Show</option>
    	<option value="0" <?php if($value->update_view==0){?> selected="selected"<?php } ?>>Hide</option>
    </select>
    </td>
    <td style="text-align: center ;">
    <select name="<?php echo $value->ums_view_configuration_id;?>#view_view#<?php echo $value->attribute_name;?>" id="<?php echo $value->ums_view_configuration_id;?>#view_view#<?php echo $value->attribute_name;?>" class="attribute_option_value">
    	<option value="1" <?php if($value->view_view==1){?> selected="selected"<?php } ?>>Show</option>
    	<option value="0" <?php if($value->view_view==0){?> selected="selected"<?php } ?>>Hide</option>
    </select>
    </td>
    <td style="text-align: center;">
    <input type="text" name="<?php echo $value->ums_view_configuration_id;?>#view_view#<?php echo $value->attribute_name;?>" id="<?php echo $value->ums_view_configuration_id;?>#view_view#<?php echo $value->attribute_name;?>" class="attribute_option_value" value="<?php echo $value->sequence_number;?>" maxlength="4" size="4">
    </td>
  </tr>
<?php }?>
</table>

