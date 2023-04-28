<?php 
session_id('2');
session_start();
$error = ""; // Variable To Store Error Message 
if (isset($_POST['submit'])) { 
  if (empty($_POST['username']) || empty($_POST['password'])) { 
    $error = "hgcbv km"; 
  } 
  else{ 
    // Define $username and $password 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    // mysqli_connect() function opens a new connection to the MySQL server. 
    $conn = mysqli_connect("localhost", "root", "", "company"); 
    // SQL query to fetch information of registerd users and finds user match. 
    $query = "SELECT username, password from user where username=? AND password=? LIMIT 1"; 
    // To protect MySQL injection for Security purpose 
    $stmt = $conn->prepare($query); 
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute(); 
    $stmt->bind_result($username, $password); 
    $stmt->store_result();
    
    
    if($stmt->fetch()) //fetching the contents of the row { 
      {$_SESSION['login_user'] = $username; // Initializing Session 
    header("location: cart.php"); }// Redirecting To Profile Page 
   else
       $error = "Invalid Id or Password";
     } 
  //mysqli_close($conn); // Closing Connection 
}
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
	<h2 style="color: ghostwhite; font-size: 20px;">Don't Have an Account?  <a href="reg.php">Register</a></h2>
	<b><h3 style="color: ghostwhite; font-size: 35px;"><u><center>Customer Login</center></u></h3><br>
		<form action="" method="POST">
		 <p class="nam">
		 <label>Username :</label> <input type="text" name="username" placeholder="Enter your Username" required><br><br>
		<label>Password  : </label><input type="password" name="password" placeholder="Enter your Password" required><br><br>
		</p>
		<input type="reset" class="res" name="reset" value="Reset">
		<input type="submit" class="regg" name="submit" value="Login"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $error;?></div>
	</form>
</div>
</header>
</body>
</html>
