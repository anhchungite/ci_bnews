<h2>upload</h2>
<?php
	if(isset($msg)){
		echo $msg;
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	chọn file
	<input type="file" name="hinhanh"  />
	<br/>
	<input type="submit" value="upload" name="submit" />


</form>			
