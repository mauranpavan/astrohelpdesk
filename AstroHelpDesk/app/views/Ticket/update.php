<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
<div class="container">
	<h1>Update Ticket</h1>
	<form method='post'>
		<label>Title      :
			<input type='text' name='title' value='<?php echo $model->title; ?>' />
		</label><br>
		<label>Description:
			<input type='text' name='description' value='<?php echo $model->description; ?>' />
		</label><br>
		<label>Urgency:
			<select name='urgencyList'>
			<option value='<?php echo $model->urgency; ?>' selected='selected'>
				<?php 

				switch ($model->urgency) {
					case '1':
						 $temp = 'High';
						break;
					case '2':
						 $temp = 'Medium';
						break;
					case '3':
						 $temp = 'Low';
						break;	
					
					default:
						
						break;
				}

				echo  $model->urgency . " ($temp)"; ?>
			</option>

			<?php 
			
			if($model->urgency == '1'){
				echo "<option value='2'  >2 (Medium)</option>
				     <option value='3'  >3 (Low)</option>";
			}
			else if($model->urgency == '2'){
				echo "<option value='1' >1 (High)</option>
				     <option value='3' >3 (Low)</option>";
				 }
		    else if($model->urgency == '3'){
				echo "<option value='1'  >1 (High)</option>
				     <option value='2'  >2 (Medium)</option>";
				 }
				
			?>
			</select>
		</label><br>
		<label>Priority:
			
			<select name='priorityList'>
			<option value='<?php echo $model->priority; ?>' selected='selected'>
				<?php 

				switch ($model->priority) {
					case '1':
						 $temp = 'High';
						break;
					case '2':
						 $temp = 'Medium';
						break;
					case '3':
						 $temp = 'Low';
						break;	
					
					default:
						
						break;
				}





				echo $model->priority . " ($temp)"; ?>
			</option>

			<?php 
			
			if($model->priority == '1'){
				echo "<option value='2'  >2 (Medium)</option>
				     <option value='3'  >3 (Low)</option>";
			}
			else if($model->priority == '2'){
				echo "<option value='1' >1 (High)</option>
				     <option value='3' >3 (Low)</option>";
				 }
		    else if($model->priority == '3'){
				echo "<option value='1'  >1 (High)</option>
				     <option value='2'  >2 (Medium)</option>";
				 }
				
			?>
			

			</select>
		</label><br>
		
		<label>Status:
			<select name='ticketStatusList'>
			<option value='<?php echo $model->ticket_status; ?>' selected='selected'>
				<?php echo $model->ticket_status; ?>
			</option>

			<?php 
			
			if($model->ticket_status == 'closed')
				echo "<option value='open'  >open</option>";
			else
				echo "<option value='closed' >closed</option>";
				
			?>
			

			</select>
	</label>






		<input type='submit' name='action' value='Save changes' />
	</form>
</div>
</body>
</html>