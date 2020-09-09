<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body>
<div class="container">
	<h1>Delete this?</h1>
	<form method='post'>
		<label>Title      :</label>&nbsp;<?php echo $model->title; ?><br>
		<label>Description:</label>&nbsp;<?php echo $model->description; ?><br>
		<label>Created By :</label>&nbsp;<?php echo $model->created_by; ?><br>
		<label>Created On :</label>&nbsp;<?php echo $model->created_on; ?><br>
		<label>Status     :</label>&nbsp;<?php echo $model->ticket_status; ?><br>
		<input type='submit' name='action' value='Delete' />
		<a href="/Ticket/index">cancel</a>
	</form>
</div>
</body>
</html>