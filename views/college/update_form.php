<!DOCTYPE html>
<html>
<head>
	<title>Update Form</title>
	<link rel="stylesheet" href="../assets/style.css"></link>
</head>
<body>
	<?php require("./views/header.php"); ?>
	<div class="b-body">
        <h4 class="title" >Update College</h4>
		<form action="<?=baseUrl('/colleges/update')?>" method="post" >
			<input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
			<input type="hidden" name="id" value="<?= $row['id']; ?>">
			<label>College Name
				<input type="text" name="name" value="<?= $row['college_name']; ?>">
			</label>
			<label>College Address
				<input type="text" name="address" value="<?= $row['college_address']; ?>">
			</label>
			<label>College Phone
				<input type="text" name="phone" value="<?= $row['college_phone']; ?>">
			</label>
			<button name="action" value="update">Submit</button>
		</form>
	</div>
</body>
</html>
