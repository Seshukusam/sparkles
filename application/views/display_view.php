This is view file
<br/>
<table border="1">
<tr><th>Name</th><th>Email</th><th>Mobile</th>
<th>Action</th>
</tr>
<?php
foreach($recs as $row)
{
	?>
	<tr>
	<td><?php echo $row->name;?></td>
	<td><?php echo $row->email;?></td>
	<td><?php echo $row->mobile;?></td>
	<td><a href="<?php echo base_url();?>index.php/user/delete_user/<?php echo $row->user_id;?>">Delete</a></td>
	</tr>
	<?php
}

?>
</table>