<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
</head>
<body>
	<form action="<?php echo site_url('welcome/essayage'); ?>" method="post">
		<input type="text" value="valeur" name="valeur">
		<input type="submit" value="OK">
	</form>
</body>
</html>