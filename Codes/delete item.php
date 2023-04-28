<?php
$conn = mysqli_connect("localhost", "root", "", "test");
$message = "";
if(!empty($_POST))
	{
		
		$name = $conn->real_escape_string($_POST['name']);
		
		$sql = "DELETE FROM `tbl_product` WHERE name='$name'";
		$quer = "SELECT * FROM tbl_product WHERE name='$name'";
		$result = mysqli_query($conn,$quer);
		$count = mysqli_num_rows($result);
$delete = $conn->query($sql);
if($count>0)
$message= "Item has been deleted";
else
$message = $user." Item has been deleted";}
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
	
		<form action="" method="POST">
		 <p class="nam">
		
		<label>Item Name  : </label><input type="text" name="name" placeholder="Enter item name" required><br><br>
		

		</p>
		<input type="submit" class="regg" name="submit" value="DELETE"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $message;?></div>
	</form>
</div>
</header>
</body>