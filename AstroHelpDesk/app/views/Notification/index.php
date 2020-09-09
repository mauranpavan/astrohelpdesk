<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Astro Help Desk</title>
</head>
<body>

	<h2 align="center">NOTIFICATIONS</h2>



<table  class="table .table-striped">
	<tr>
		<th>Message</th>
		<th>Type</th>
		<th>Actions</th>
	</tr>
<?php
//var_dump($model);
foreach($model as $notification){
	echo "  
			<tr>
				<td>$notification->message</td>
				<td>$notification->type</td>";

 	if($notification->type == 'approval' && $_SESSION['user_type']=='supervisor'){
		echo "<td>
				  |<a href='/Login/grantPermission/$notification->sender_id'>Approve</a>|
				  |<a href='/Login/denyPermission/$notification->sender_id'>Deny</a>|
				</td>
			</tr>";
		}
	else{
		echo "<td>
				  |<a href='/Notification/readNotification/$notification->notification_id'>Read</a>|
				  
				</td>
			</tr>";

		}	


}
?>
</table>
</body>
</html>	