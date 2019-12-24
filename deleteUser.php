<?php session_start();
    require_once('sessionSet.php');
    require_once('connection.php');
    include('Head.php');
?>
<!-- Only Admin Can Delete User-->
<?php
if ($_SESSION['role'] !== 'Admin') {
    ?>
<script>
    setTimeout(function() {
        window.location.href = 'index.php';
    });

</script>
<?php
    }
?>
<!--deleteUser Php Code-->
<?php 
if(isset($_GET['userID']) && isset($_SESSION['Admin']))
{
	$complaintID =  $_GET['userID'];
	
	$complaintIDQ = "DELETE from users where id='$complaintID';";
	
	$complaintIDQR = mysqli_query($con,$complaintIDQ);
	
	if($complaintIDQR)
	{
		
		echo "<center><h3 class=\"text-center\">User Deleted Successfully</h3></center>";
		?>
<script>
    setTimeout(function() {
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
<!--/ delete User-->
