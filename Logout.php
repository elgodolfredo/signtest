<?php
session_start();
require_once('connection.php');
unset($_SESSION['Email']);

?>
<script>
    window.location = "Login.php";

</script>
