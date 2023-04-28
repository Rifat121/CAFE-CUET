<?php
$conn = mysqli_connect("localhost", "root", "", "test");
$message = "";
if(!empty($_POST))
	{
		$id = $conn->real_escape_string($_POST['id']);
		$name = $conn->real_escape_string($_POST['name']);
		$image = $conn->real_escape_string($_POST['image']);
		$price = $conn->real_escape_string($_POST['price']);

		$sql = "INSERT INTO tbl_product(id,name,image,price) VALUES ('$id', '$name', '$image', '$price')";
		$quer = "SELECT * FROM tbl_product WHERE id='$id'";
		$result = mysqli_query($conn,$quer);
		$count = mysqli_num_rows($result);
$insert = $conn->query($sql);
if($count>0)
$message= "Sorry! This Item Already Exists in the menu Try Another";
else
$message = $user." Item Added Succesfully ";}
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
		 <label>Item ID :</label> <input type="text" name="id" placeholder="Enter id" required><br><br>
		<label>Item Name  : </label><input type="text" name="name" placeholder="Enter item name" required><br><br>
		<label>Image File : </label><input type="file" name="image" placeholder="Enter image file name" required><br><br>
		<label>Price : </label><input type="text" name="price" placeholder="Enter price" required><br><br>

		</p>
		<input type="submit" class="regg" name="submit" value="ADD"><br><br>
		<div style="font-size: 20px; color: red; font-weight: bold;"><?php echo $message;?></div>
	</form>
</div>
</header>
</body>
</html>
