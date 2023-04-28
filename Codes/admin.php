<?php
include('session.php');
if(!isset($_SESSION['login_user'])){ 
	header("location: cafe.php"); // Redirecting To Home Page 
}
//include('Home.php');
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "company");
$message = "";
if(!empty($_POST))
	{
		$user = $conn->real_escape_string($_POST['username']);
		$sql = "INSERT INTO login(username ,password) VALUES ('$user', '{$conn->real_escape_string($_POST['password'])}')";
		$quer = "SELECT * FROM login WHERE username='$user'";
		$result = mysqli_query($conn,$quer);
		$count = mysqli_num_rows($result);
$insert = $conn->query($sql);
if($count>0)
$message= "Sorry! Username Already Exists. Try Another";
else
$message = $user." as an Admin Added Succesfully by ".$login_session;}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cafe Cuet</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<h1><a href="cafe.php"> C@FE CUET</a></h1>
	<h4>Welcome Admin   : <?php echo $login_session; ?></h4>
	<header>
	<div class="main"><br><br>
		<ul>
			<li><a href="new menu.php"><b> Menu</b></a></li>
			<li><a href="#"><b> Order List</b></a></li>
			<li><a href="logout.php"><b> Log Out</b></a></li>
		</ul>
	</div>
	<div class="reg">
	<b><h3 style="color: ghostwhite; font-size: 30px;"><u><center>Register a new Admin</center></u></h3><br>
		<form action="" method="POST">
		 <p class="nam">
		 Username : <input type="text" name="username" placeholder="Enter an Username" required><br><br>
		 Password : <input type="password" name="password" placeholder="Enter Password" required><br><br></p>
		<input type="reset" class="res" name="reset" value="Reset">
		<input type="submit" class="regg" name="submit" value="Register"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $message;?></div>
	</form>
</div>
</header>
</body>
</html>
