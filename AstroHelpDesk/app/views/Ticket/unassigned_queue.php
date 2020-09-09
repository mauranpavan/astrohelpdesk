<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>

	<h2 align="center">TICKETS</h2>
	<h3>Unassigned Tickets Queue</h3>

 <a href='/Ticket/index' class='button'>Back</a> 

<table  class="table .table-striped">
	<tr>
		<th>Title</th>
		<th>Description</th>
		<th>Created by</th>
		<th>Created on</th>
		<th>Actions</th>
	</tr>
<?php

foreach($model as $ticket){
	echo "  
			<tr>
				<td>$ticket->title</td>
				<td>$ticket->description</td>
				<td>$ticket->name</td>
				<td>$ticket->created_on</td>";
				
				  if($_SESSION['user_type'] != 'end user'){
				  	echo "<td><a href='/Ticket/reassignTicket/$ticket->ticket_id'>Assign</a>

				</td>
			</tr>";
		}
}
//var_dump(is_null($theTicket->assigned_to));
?>
</table>
</body>
</html>	