<?php
$conn = mysqli_connect("localhost", "root", "", "company");
$message = "";
if(!empty($_POST))
	{
		$user = $conn->real_escape_string($_POST['username']);
		$password = $conn->real_escape_string($_POST['password']);
		$cno = $conn->real_escape_string($_POST['contact']);
		$add = $conn->real_escape_string($_POST['address']);

		$sql = "INSERT INTO user(username ,password,cno,address) VALUES ('$user', '$password', '$cno', '$add')";
		$quer = "SELECT * FROM user WHERE username='$user'";
		$result = mysqli_query($conn,$quer);
		$count = mysqli_num_rows($result);
$insert = $conn->query($sql);
if($count>0)
$message= "Sorry! Username Already Exists. Try Another";
else
$message = $user." as an Customer , Registered Succesfully ";}
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
	
	<header>
	<div class="main"><br><br>
	<!--	<ul>
			<li><a href="menu.php"><b> Menu</b></a></li>
			<li><a href="#"><b> Order List</b></a></li>
			<li><a href="cafe.php"><b> Employee</b></a></li>
			<li><a href="logout.php"><b> Log Out</b></a></li>
		</ul>-->
	</div>
	<div class="creg">
	<h2 style="color: ghostwhite; font-size: 20px;">Already Have an Account?  <a href="clogin.php">Login</a></h2>
	<b><h3 style="color: ghostwhite; font-size: 35px;"><u><center>Customer Registration</center></u></h3><br>
		<form action="" method="POST">
		 <p class="nam">
		 <label>Username :</label> <input type="text" name="username" placeholder="Enter an Username" required><br><br>
		<label>Password  : </label><input type="password" name="password" placeholder="Enter a Password" required><br><br>
		<label>ContactNo : </label><input type="text" name="contact" placeholder="Enter an Active Contact Number" required><br><br>
		<label>Address   : </label><input type="text" name="address" placeholder="Enter Your Address in Details" required><br><br>

		</p>
		<input type="reset" class="res" name="reset" value="Reset">
		<input type="submit" class="regg" name="submit" value="Register"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $message;?></div>
	</form>
</div>
</header>
</body>
</html>
