<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
	
	<h2 align="center">SEARCH TICKETS</h2>

<a href="/Ticket/index" class="button">Back</a><br>



<table  class="table .table-striped">
	<tr>
		<th>Title</th>
		<th>Description</th>
		<th>Created by</th>
		<th>Created on</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
<?php
//var_dump($model);
foreach($model as $ticket){
	echo "  
			<tr>
				<td>$ticket->title</td>
				<td>$ticket->description</td>
				<td>$ticket->name</td>
				<td>$ticket->created_on</td>
				<td>$ticket->ticket_status</td>
				<td>
				  |<a href='/Ticket_Detail/index/$ticket->ticket_id'>View</a> |
				   ";

				    if($_SESSION['user_type'] == 'end user' && $_SESSION['user_id'] == $ticket->created_by && $ticket->ticket_status == 'open'){
				    	echo "<a href='/Ticket/edit/$ticket->ticket_id'>Edit</a> |<a href='/Ticket/delete/$ticket->ticket_id'>Delete</a> |";


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