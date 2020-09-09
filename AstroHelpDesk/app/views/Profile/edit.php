<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
<div class="container">
	<h1>Edit Profile</h1>
	<form method='post'>
		<label>Name      :
			<input type='text' name='name' value='<?php echo $model->name; ?>' />
		</label><br>
		<label>Email:
			<input type='text' name='email' value='<?php echo $model->email; ?>' />
		</label><br>
		<label>Phone Number:
			<input type='text' name='phone_number' value='<?php echo $model->phone_number; ?>' />
		<label>Address:
			<input type='text' name='address' value='<?php echo $model->address; ?>' />
		</label><br>
		<label>Job Type:
			<input type='text' name='job_type' value='<?php echo $model->job_type; ?>' />
		</label><br>
		<input type='submit' name='action' value='Save changes' />
	</form>
</div>


</body>
</html>