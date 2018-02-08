<?php
echo validation_errors();
?>
<form method="post" 
action="<?php echo base_url();?>index.php/user
/test_server_validations">
Name : <input type="text" name="name" value="<?php echo set_value('name'); ?>"/><br/><br/>
<?php //echo form_error('name');
?>
Password: <input type="password" name="password" value="<?php echo set_value('name'); ?>"/>
<br/><br/>
<?php 
//echo form_error('password');
?>
<input type="submit" name="register" 
value="Register"/>
</form>