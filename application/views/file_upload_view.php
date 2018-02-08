<html>
<head>
<title>Upload Example</title>
</head>
<body>

<?php echo $error;?>
<?php echo form_open_multipart('welcome/do_upload');?>
<input type="file" name="userfile"/>
<br /><br />
<input type="submit" value="upload" />
</form>
</body>
</html>
