<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
?>
<!--Reply Massage-->
<?php
    if(isset($_POST['submit']))
    {
        $userID = CleanData($_POST['userid']);	
        $userFullName = CleanData($_POST['username']);
        $userPassword = CleanData($_POST['password']);

        $regComplaintQ =    "UPDATE users
                            SET username='$userFullName', password='$userPassword'
                            WHERE id='$userID'";
        $regComplaintQR = mysqli_query($con,$regComplaintQ);

            if($regComplaintQR)
            {       
                echo "<center><h3>Details Updated <span style='color: green;'>Successfully</h3></center>";
                ?>
<script>
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 1000);

</script>
<?php
                    die();
            }
            else
            {
                echo mysqli_error($con);
                echo "<h3 class='text-center'>Try Again.</h3>";
            }

    }
?>
