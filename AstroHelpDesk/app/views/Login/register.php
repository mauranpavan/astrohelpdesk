<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
	
<div class="container">
	<h1>Register</h1>
	<form method='post'>
		<label>Username:<input type='text' name='username'/></label><br>
		<label>Password:<input type='password' name='password'/></label><br>
		<label>Confirm Password:<input type='password' name='password_confirm'></label><br>
		<label>Name:<input type='text' name='name'/></label><br>
		<label>Email:<input type='text' name='email'/></label><br>
		<label>Phone Number:<input type='text' name='phone_number'/></label><br>
		<label>Address:<input type='text' name='address'/></label><br>
		<label>Job Type:<input type='text' name='job_type'/></label><br>
		<label>User Type:
			<select name='userTypeList'>
				<option value='end user' selected="selected">End User</option>
				<option value='tech'>Tech</option>
				<option value='supervisor'>Supervisor</option>
			</select>
		</label><br>

		<input type='submit' name='action' value='Register' /> <br>
	</form>
</div>
</body>
</html>