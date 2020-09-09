<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>
	
	<h2 align="center">TICKET DETAIL</h2>





<?php


$ticket = $model['theTicket'];
echo "  
			<dl class = 'dl-horizontal'>
				<dt>Title</dt>
					<dd>$ticket->title</dd>
				<dt>Description</dt>
					<dd>$ticket->description</dd>
				<dt>Created by</dt>
					<dd>$ticket->name</dd>
				<dt>Created on</dt>
					<dd>$ticket->created_on</dd>
				<dt>Status</dt>
					<dd>$ticket->ticket_status</dd>
				<dt>
				<dt>Urgency</dt>
					<dd>$ticket->urgency</dd>
				<dt>
				<dt>Priority</dt>
					<dd>$ticket->priority</dd>
				<dt>
				<dt>Closed on</dt>
					<dd>$ticket->closed_on</dd>
				";
				 if($_SESSION['user_type'] != 'end user'){
				echo "
				  <dt>|<a href='/Ticket/update/$ticket->ticket_id'>Update</a> | 
				</dt>
			</dl>";
		}


//Test
//var_dump($model['theTicket']);

?>




<br>

<a href="/Ticket_Detail/create/<?php echo $model['ticket_id']; ?>" class="button">Comment on ticket</a><br>
<a href="/Image/upload/<?php echo $model['ticket_id']; ?>" class="button">Upload Image</a>

<table  class="table .table-striped">
	<tr>
		<th>Created on</th>
		<th>User</th>
		<th>Comment</th>
		<th>Actions</th>
	</tr>
<?php

foreach($model['ticket_details'] as $ticket_detail){
	echo "  
			<tr>
				<td>$ticket_detail->created_on</td>
				<td>$ticket_detail->name</td>
				<td>$ticket_detail->detail_message</td>
				<td>
				   <a href='/Ticket_Detail/delete/$ticket_detail->ticket_detail_id'>Delete</a> |
				   <a href='/Ticket_Detail/edit/$ticket_detail->ticket_detail_id'>Edit</a>
				</td>
			</tr>";
}



?>

</table>


<table  class="table .table-striped">
	<tr>
		<th>Images</th>
		<th>Caption</th>
		<th>Actions</th>
	</tr>
<?php

foreach($model['images'] as $uploadedImage){
	echo "  
			<tr>
				<td><img width =300 height =300  src='/uploads/$uploadedImage->path_name'/></td>
				<td>$uploadedImage->caption</td>
				<td>
				   <a href='/Image/delete/$uploadedImage->image_id'>Delete</a> 
				</td>
			</tr>";
}


?>

</table>
</body>
</html>	