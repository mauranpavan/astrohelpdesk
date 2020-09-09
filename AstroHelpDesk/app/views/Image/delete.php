<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
<div class="container">
	<h1>Delete this?</h1>
	<form method='post'>
		<label>Image      :</label>&nbsp; <br>
			
			<?php  echo "<img width =300 height =300  src='/uploads/$model->path_name'/><br>"; ?>
			


		<label>Caption:</label>&nbsp;<?php echo $model->caption; ?><br>
		
		<input type='submit' name='action' value='Delete' />
		<a href="/Ticket_Detail/index/<?php echo '$model->ticket_id'; ?>">cancel</a>
	</form>
</div>
</body>
</html>