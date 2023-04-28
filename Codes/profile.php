<?php
include('session.php'); 
if(!isset($_SESSION['login_user'])){ 
  header("location: cafe.php"); // Redirecting To Home Page 
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Your Home Page</title>
 <link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div id="profile">
 <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
 <b id="logout"><a href="logout.php">Log Out</a></b>
 </div>
 <div class="reg">
	<b><h3><u><center>Register a new Admin</center></u></h3>
		<form action="" method="POST">
		 <p class="nam">
		 Username : <input type="text" name="username" required><br><br>
		  Password : <input type="password" name="password" required><br><br></p>
		<input type="reset" class="res" name="reset" value="Reset">
		<input type="submit" class="regg" name="submit" value="Register"><br></b>
	</form>
</div>
	
</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "company");
if(!empty($_POST))
	{
		$sql = "INSERT INTO login(username ,password) VALUES ('{$conn->real_escape_string($_POST['username'])}', '{$conn->real_escape_string($_POST['password'])}')";
$insert = $conn->query($sql);
if($insert)
echo "Success";
else
echo "Failed";}
?>