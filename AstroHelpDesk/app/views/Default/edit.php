<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
<div class="container">
	<h1>Edit Ticket</h1>
	<form method='post'>
		<label>Title      :
			<input type='text' name='title' value='<?php echo $model->title; ?>' />
		</label><br>
		<label>Description:
			<input type='text' name='description' value='<?php echo $model->description; ?>' />
		</label><br>
		<input type='submit' name='action' value='Save changes' />
	</form>
</div>
</body>
</html>