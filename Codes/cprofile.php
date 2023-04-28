<?php
include 'update-profile.php';
include 'csession.php';
$conn = mysqli_connect("localhost", "root", "", "company");
$message = "";
if(isset($_SESSION['login_user']) )
	{
		$user = $login_session;

		$sql = "SELECT * FROM user WHERE username = '$user'";
   	  $get_user = $conn->query($sql);        
   	  if ($get_user->num_rows == 1) {
   	              $profile_data = $get_user->fetch_assoc();       
   	               }    }
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
	<b><h3 style="color: ghostwhite; font-size: 35px;"><u><center><?php echo $profile_data['fullname'] ?>'s Profile</center></u></h3><br>
		<form action="update-profile.php?user=<?php echo $profile_data['username'] ?>" method="POST">
		 <p class="nam">
		 <label>Full Name :</label> <input type="text" name="fullname" value="<?php echo $profile_data['fullname'] ?>"><br><br>
		<label>Password  : </label><input type="text" name="password" value="<?php echo $profile_data['password'] ?>" ><br><br>
		<label>ContactNo : </label><input type="text" name="contact" value="<?php echo $profile_data['cno'] ?>" ><br><br>
		<label>Address   : </label><input type="text" name="address" value="<?php echo $profile_data['address'] ?>"><br><br>

		</p>
		<a href="cart.php" class="res" name="reset" >Back </a>
		<input type="submit" class="regg" name="update" value="Update"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $message;?></div>
	</form>
</div>
</header>
</body>
</html>
