<?php   
$conn = mysqli_connect("localhost", "root", "", "company");  
    if (isset($_POST['update'])) 
    	{     
    		$user = $_GET['user'];   
    		$fullname = $_POST['fullname'];       
    		 $pass = $_POST['password'];     
    		 $mbl = $_POST['contact'];   
    		 $address = $_POST['address'];  
$sql = "UPDATE user SET fullname = '$fullname', cno = '$mbl',  password = '$pass', address = '$address' WHERE username = '$user'";
    $update_profile = $conn->query($sql);        
    	if ($update_profile) 
    		{            
    			header("Location: cprofile.php?user=$user");  
    		    $message = "Successfully Updated";                    	     
    		     }
    		    else {            echo $conn->error;        }    }?>