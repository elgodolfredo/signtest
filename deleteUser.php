<?php session_start();
    require_once('sessionSet.php');
    require_once('connection.php');
    include('Head.php');
?>
    <?php 
if(isset($_GET['userID']))
{
	$complaintID =  $_GET['userID'];
	
	$complaintIDQ = "DELETE from users where id='$complaintID';";
	
	$complaintIDQR = mysqli_query($con,$complaintIDQ);
	
	if($complaintIDQR)
	{
		
		echo "<center><h3 class=\"text-center\">Complaint deleted.</h3></center>";
		?>
        <script>
            setTimeout(function () {
                window.location.href = 'viewUsers.php';
            }, 1000);
        </script>
        <?php
	}
	else
	{
		echo "<h3 class=\"text-center\">Try Again. </h3>";
	}
	
}?>