<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
	
	<h2 align="center">PROFILE</h2>



<?php

$user = $model;
	echo "  
			<dl class = 'dl-horizontal'>
				<dt>Name</dt>
					<dd>$user->name</dd>
				<dt>Email</dt>
					<dd>$user->email<dd>
				<dt>Phone Number</dt>
					<dd>$user->phone_number</dd>
				<dt>Address</dt>
					<dd>$user->address</dd>
				<dt>Job Type</dt>
					<dd>$user->job_type</dd>
				<dt>
				  |<a href='/User/edit/'>Edit</a> | 
				</dt>
			</dl>";
		

?>

</body>
</html>	