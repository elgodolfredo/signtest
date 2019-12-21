<?php
$con = mysqli_connect('localhost','root','','roadtest_ctpfsd');
if(!$con)
{
	echo "Db Connection Error ".mysqli_error($con) ;
}
else
{
	echo "";
}

/*
$con = mysqli_connect('localhost','stachrke_school','abc@143','stachrke_school');
if(!$con)
{
	echo "Db Connection Error ".mysqli_error($con) ;
}
else
{
	echo "";
}
*/
function CleanData($Data)
{
	$Data = addslashes($Data);
	$Data = trim($Data);
	$Data = stripslashes($Data);
	return $Data;
}
?>