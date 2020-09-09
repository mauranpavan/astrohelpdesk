<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>AstroHelpDesk</title>
</head>
<body>

<div class="container">
	<h2>Copy and create a Ticket</h2>
	<form method='post'>
		<label>Title:<input type='text' name='title'  value='<?php echo $model->title; ?>' /></label><br>
		<label>Description:</label><br>
		<textarea rows="4" cols="50" name='description'> <?php echo $model->description; ?></textarea><br>
		<br>
		<input type='submit' name='action' value='Create' />
	</form>
</div>
</body>
</html>