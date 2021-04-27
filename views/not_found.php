<!DOCTYPE html>
<html>
<head>
	<title>Page Not Found</title>
	<style type="text/css">
		body{
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 0;
			padding: 0;
			height: 100vh;
		}
		div{
			padding: 64px;
			width: 60%;
			border: 2px dashed tomato;
			margin: auto;
		}
		span{
			background-color: lightgray;
			padding: 8px;
			font-style: italic;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div>
		<h1 style="color: tomato;text-align: center;" >404 Page Not Found</h1>
		<p style="color: tomato;text-align: center;"><a href="<?= baseUrl('/')?>">Back to Home Page</a></p>
	</div>
</body>
</html>