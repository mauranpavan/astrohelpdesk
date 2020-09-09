<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
<div class="container">
	<h1>Re-assign Ticket</h1>

	
		<label>Title:</label>
		<p type ="text" readonly class="form-control-plaintext" name='title' ><?php echo $model['theTicket']->title; ?>  </p>
		<label>Description:</label>
		<p type ="text" readonly class="form-control-plaintext" name='title' ><?php echo $model['theTicket']->description; ?>  </p>
		<label>Created By:</label>
		<p type ="text" readonly class="form-control-plaintext" name='title' ><?php echo $model['theTicket']->name; ?>  </p>
		<label>Created On:</label>
		<p type ="text" readonly class="form-control-plaintext" name='title' ><?php echo $model['theTicket']->created_on; ?>  </p>

	


<form method='post'>
	<select name='techList'>
		<option value=""  selected="selected">Select a Technician</option>
	<?php
		for($i = 0; $i < count($model['techs']); $i++){


		echo "<option value={$model['techs'][$i]->user_id} >{$model['techs'][$i]->name}</option>";



		}


	?>

	</select>
	<input type='submit' name='action' value='Re-assign' /> <br>
</form>

</div>

<?php 

//var_dump($model['techs']); ?>
</body>
</html>