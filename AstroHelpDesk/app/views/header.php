<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Astro Help Desk</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <!--<li class="active"><a href="/Default/index">Home</a></li>-->
	      <li><a href="/Ticket/index">Tickets</a></li>
	      <li><a href='/User/getUser/<?php echo "$_SESSION[user_id]"; ?>'>Profile</a></li>
	      <li><a href="/Notification/index">Notifications</a></li>
	      <?php
	      echo "<li><a href='/Login/logout'>Logout( Currently logged in as $_SESSION[username] )</a></li>";
	      ?>
	    </ul>
	  </div>
</nav>