<?php if(isset($msg)){echo $msg;}?>
<form method="post" action="<?php echo base_url();?>index.php/user/get_user_data">
Name :<input type="text" name="name"/><br/><br/>
Email :<input type="text" name="email"/><br/><br/>
<input type="submit" name="register" value="Register"/>
</form>