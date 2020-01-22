<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
extract($_POST);
extract($_GET);
extract($_SESSION);
?>
<!--/ PHP Code: Token Entery -->
<!DOCTYPE html>
<html>
<!--Head-->
<?php include('Head.php')?>
<!--/Head-->
<?php
    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "questions/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
    }// Select file type $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // Valid file extensions $extensions_arr = array("jpg","jpeg","png","gif"); // Check extension if( in_array($imageFileType,$extensions_arr) ){ // Insert record $query = "insert into images(name) values('".$name."')"; mysqli_query($con,$query); // Upload file move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name); } } ?>
<!--Body-->
<!--/Body-->

</html>
