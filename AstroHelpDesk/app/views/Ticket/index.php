<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
	
	<h2 align="center">TICKETS</h2>

<a href="/Ticket/create" class="button">Create a ticket</a><br>
<?php
	 if($_SESSION['user_type'] != 'end user'){
	echo " <a href='/Ticket/getUnassignedQueue' class='button'>View Queue</a><br> 
		<form action = '/Ticket/searchDbForTickets' method='post'>
	 		<input width='500' name='search' type='text' placeholder= 'Search tickets by title or description...'>
	 		<input type='submit' name='action' value='Search'>
		  </form>

		  <h3> Completed: $model[completedCount]    Assigned: $model[assignedCount] </h3>";



}
	 if($_SESSION['user_type'] == 'end user'){
	echo " <a href='/Ticket/previousTickets' class='button'>History</a><br>
	<form action = '/Ticket/searchRespectiveTickets' method='post'>
	 		<input width='500' name='search' type='text' placeholder= 'Search tickets by title or description...'>
	 		<input type='submit' name='action' value='Search'>
		  </form>";
}







?>


<table  class="table .table-striped">
	<tr>
		<th>Title</th>
		<th>Description</th>
		<th>Created by</th>
		<th>Created on</th>
		<th>Actions</th>
	</tr>
<?php
//var_dump($model);
foreach($model['tickets'] as $ticket){
	echo "  
			<tr>
				<td>$ticket->title</td>
				<td>$ticket->description</td>
				<td>$ticket->name</td>
				<td>$ticket->created_on</td>
				<td>
				  |<a href='/Ticket_Detail/index/$ticket->ticket_id'>View</a> |
				  ";
				    if($_SESSION['user_type'] == 'end user' &&  $_SESSION['user_id'] == $ticket->created_by){
				    	echo "<a href='/Ticket/copy/$ticket->ticket_id'>Copy </a> |";

				    } 

				    if($_SESSION['user_type'] == 'end user' && $_SESSION['user_id'] == $ticket->created_by && empty($ticket->assigned_to)){
				    	echo "<a href='/Ticket/edit/$ticket->ticket_id'>Edit</a> | <a href='/Ticket/delete/$ticket->ticket_id'>Delete</a> |";


				    }
				   
				  if($_SESSION['user_type'] != 'end user' && $_SESSION['user_id'] == $ticket->assigned_to){
				  	echo "<a href='/Ticket/reassignTicket/$ticket->ticket_id'>Reassign</a> |
				  	<a href='/Ticket/update/$ticket->ticket_id'>Update</a>  |

				</td>
			</tr>";
		}
}
?>
</table>
</body>
</html>	