<?php 
require_once "web/header.php"; 

?>
<div class="container">
	<form onsubmit="return validate()" method="post">
		<div class="form-group">
			<span id="fnameE"></span>
			<input class="form-control" type="text" id="fname" value="<?php echo $result[0]['fname']; ?>" name="fname" placeholder="First Name">
		</div>
		<div class="form-group">
			<span id="lnameE"></span>
			<input class="form-control" type="text" name="lname" value="<?php echo $result[0]['lname']; ?>" placeholder="Last Name">
		</div>
		<div class="form-group">
			<span id="emailE"></span>
			<input class="form-control" type="text" name="email" value="<?php echo $result[0]['email']; ?>" placeholder="email">
		</div>
		<div class="form-group">
			<input class="btn btn-secondary w-25" type="submit" name="update" value="Update">
		</div>
	</form>
</div>