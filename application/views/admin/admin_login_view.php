<?php if(isset($msg)){echo $msg;}?>
<form method="post" action="<?php echo base_url();?>index.php/admin/admin/admin_login">
Email :<input type="text" name="email"/><br/><br/>
Password :<input type="password" name="password"/><br/><br/>
<input type="submit" name="login" value="Login"/>
</form>