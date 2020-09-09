<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Ticket Detail Deletion</title>
</head>
<body>
<div class="container">
	<h1>Delete this?</h1>
	<form method='post'>
		<label>Detail message:</label>&nbsp;<?php echo $model->detail_message; ?><br>
		<input type='submit' name='action' value='Delete' />
		<a href="/Ticket_Detail/index/<?php echo $model->ticket_id; ?>">cancel</a>
	</form>
</div>
</body>
</html>