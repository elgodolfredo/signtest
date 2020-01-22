<?php
    
    include('connection.php');
 
    if(!$con)
    {
        die(mysqli_error());
    }
 
    if(isset($_POST['submit']))
    {
 
        $targetFolder = "images";
        $errorMsg = array();
        $successMsg = array();
 
        foreach($_FILES as $file => $fileArray)
        {
            
            if(!empty($fileArray['name']) && $fileArray['error'] == 0)
            {
                $getFileExtension = pathinfo($fileArray['name'], PATHINFO_EXTENSION);;
 
                if(($getFileExtension =='jpg') || ($getFileExtension =='jpeg') || ($getFileExtension =='png') || ($getFileExtension =='gif'))
                {
                    if ($fileArray["size"] <= 500000)
                    {
                        $breakImgName = explode(".",$fileArray['name']);
                        $imageOldNameWithOutExt = $breakImgName[0];
                        $imageOldExt = $breakImgName[1];
 
                        $newFileName = strtotime("now")."-".str_replace(" ","-",strtolower($imageOldNameWithOutExt)).".".$imageOldExt;
 
                        
                        $targetPath = $targetFolder."/".$newFileName;
 
                        
                        if (move_uploaded_file($fileArray["tmp_name"], $targetPath))
                        {
                            
                            $qry ="insert into images (image) values ('".$newFileName."')";
 
 
                            $rs  = mysqli_query($conn, $qry);
 
                            if($rs)
                            {
                                $successMsg[$file] = "Image is uploaded successfully";
                            }
                            else
                            {
                                $errorMsg[$file] = "Unable to save ".$file." file ";
                            }
                        }
                        else
                        {
                            $errorMsg[$file] = "Unable to save ".$file." file ";        
                        }
                    }
                    else
                    {
                        $errorMsg[$file] = "Image size is too large in ".$file;
                    }
 
                }
                else
                {
                    $errorMsg[$file] = 'Only image file required in '.$file.' position';
                }    
            }
            
        }
    }
?>
