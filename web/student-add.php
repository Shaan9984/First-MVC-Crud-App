<?php 
require_once "web/header.php"; 

?>
<div class="container">
	<form onsubmit="return validate()" method="post">
		<div class="form-group">
			<span id="fnameE"></span>
			<input class="form-control" type="text" id="fname" name="fname" placeholder="First Name">
		</div>
		<div class="form-group">
			<span id="lnameE"></span>
			<input class="form-control" type="text" name="lname" placeholder="Last Name">
		</div>
		<div class="form-group">
			<span id="emailE"></span>
			<input class="form-control" type="text" name="email" placeholder="email">
		</div>
		<div class="form-group">
			<input class="btn btn-secondary w-25" type="submit" name="add" value="Add">
		</div>
	</form>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>

<script>

</script>