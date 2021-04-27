<!DOCTYPE html>
<html>
<head>
	<title>Create Form</title>
	<link rel="stylesheet" href="<?=baseUrl('/assets/style.css')?>"></link>
</head>
<body>
	<?php require("./views/header.php"); ?>
	<div class="b-body">
        <h4 class="title" >Create New Course</h4>
		<form action="<?=baseUrl('/courses/create')?>" method="post">
			<input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
			<label>Course Code
				<input type="text" name="code">
			</label>
			<label>Course Duration
				<input type="text" name="duration">
			</label>
			<label>Course Title
				<input type="text" name="title">
			</label>
			<button name="action" value="create" >Submit</button>
		</form>
	</div>
</body>
</html>
