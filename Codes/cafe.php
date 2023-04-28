<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: admin.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>
<title> Cafe Cuet</title>
<h1><center> <pre>C @ F E    C U E T</pre> </center></h1>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
	<header>
		<div class="main">
			<ul><br><br>
				<li class="active"><a href="#"><b>Home</b></a></li>
				<li><b><a href="search.php">Menu</a></b></li>
				<li><b><a href="clogin.php">Order</a></b></li>
				<li class="login" onclick="openForm()"><a><b>Admin Login</b></a></li>
				<li><b><a href="about.html">Contact Us</a></b></li>
			</ul>
		</div>
		<div class="form-popup" id="myform">
	<form action="" method="POST"  class="form-container">
		<h2><center> Sign In </center></h2><hr><br><br>
		<label for="email"></label>
		<input type="text" placeholder="Enter UserName" name="username" required><br>
		<label for psw></label>
		<input type="password" placeholder="Enter Password" name="password" required>
		<div class="error">
			<?php echo $error; ?>
		</div>
		<button name="submit" type="submit" class="btn"><b>Log in</b></button>
		<button name="submit" type="submit" class="btncancel" onclick="closeForm()"><b>Cancel</b></button>
					
	</form>
</div>
	<br>
	<script>
	function openForm(){
	document.getElementById("myform").style.display="block";
}
function closeForm(){
	document.getElementById("myform").style.display="none"
}
</script></header>
</body>
</html>