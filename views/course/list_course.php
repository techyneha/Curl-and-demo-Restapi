<!DOCTYPE html>
<html>
<head>
	<title>Course List</title>
	<link rel="stylesheet" type="text/css" href="<?=baseUrl('/assets/style.css')?>">
</head>
<body>
	<?php require("./views/header.php"); ?>
	<div class="b-body">
		<h4 class="title">Course List</h4>
		<a href="<?=baseUrl('/courses/createForm')?>">Create Course</a>
		<table class="table" width="100%"> 
			<tr>
				<th> Code </th>
				<th> Duration </th>
				<th> Title </th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td><?= $row['code']; ?></td>
				<td><?= $row['duration']; ?></td>
				<td><?= $row['title']; ?> </td>
				<td>
					<form action="<?=baseUrl('/courses/updateForm')?>" method="post">
						<input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
						<input type="hidden" name="code" value="<?= $row['code']; ?>">
						<button> Update</button>
					</form>
				</td>
				<td>
					<form action="<?=baseUrl('/courses/delete')?>" method="post">
						<input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
						<input type="hidden" name="code" value="<?= $row['code']; ?>">
						<button> Delete</button>
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>