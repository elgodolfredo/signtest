<?php
require_once('connection.php');

if(!isset($_SESSION['Email']))
{
	// 
    // <script>
    //     window.location = "Login.php";
    // </script>
    // 
    header("location:Login.php");
    exit();
}

?>
