<?php 
include 'csession.php';
if(!isset($_SESSION['login_user'])){ 
  header("location: cafe.php"); // Redirecting To Home Page 
}
$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

$message = '';

if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:cart.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:cart.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:cart.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}
if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been cleared...
 </div>
 ';
}
if(isset($_GET["submit"]))
{
  foreach($cart_data as $keys => $values)
   {
    $sql = "INSERT INTO `cartvalue` (item_id, item_name, item_price, item_quantity) VALUES ('1', 'Burger', '170', '5')";
    //$qur = mysql_query($connect,$sql);
    $insert = $connect->query($sql);
    if($insert)
    {
      echo "Submitted";
    }
    else
      echo "Not Submitted";
   }
    //function option1($array, $connect)
    //{
      //if(is_array($array))
      //{
        //foreach ($array as $key => $value) {
          //$item = mysqli_real_escape_string($connect,$value[item_id]);$values["item_id"]
       // }
      //}
    //}
     // $coloumns = implode(", ", array_keys($array));
     // $escaped_values = array_map("mysql_real_escape_string", array_values($array));
     // $val = implode(", ", $escaped_values);
     // $sql = "INSERT INTO 'cartvalue' ($coloumns) VALUES ($val)";  
//$insert = $connect->query($sql);
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Cafe Cuet- Order</title>
  <script src="jq.js"></script>
  <link rel="stylesheet" href="carrt.css">
  <script src="https:/jq1.js"></script>
  <style>
    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  /*border-radius: 8px;*/
  font-size: 16px;
  border: none;
  vertical-align: right;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  text-align: left;
  float: right;

}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 14px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

  	.submit_cart{
	background-color: green;
	color: white;
	margin-left: 75%;
	border-radius: 6px;
	border-color: gray;
	padding: 8px 10px;
	font-weight: bold;
}
.submit_cart:hover{
	background-color: rgb(0,170,0);
	color: white;
}
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <br />
   <h3 align="center" class="text-center text-danger mb-5"  style= "font-family: 'waterlily'; font-size: 45px; "><a href="cafe.php" style="text-decoration: none;"> Cafe Cuet</a></h3><br />
   <span class="dropdown" align="center">
  <p class="dropbtn" align="right"><?php echo $login_session;?></p>
  <div class="dropdown-content">
    <a href="cprofile.php">Settings</a>
    <a href="clogout.php">Log Out</a>
  </div>
</span>
   <br /><br>
   <br>
   <?php
   $query = "SELECT * FROM tbl_product ORDER BY id ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
   ?>
   <div class="col-md-3">
    <form method="post">
     <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
      <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />

      <h4 class="text-info"><?php echo $row["name"]; ?></h4>

      <h4 class="text-danger">৳ <?php echo $row["price"]; ?></h4>

      <input type="text" name="quantity" value="1" class="form-control" />
      <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
      <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
      <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
     </div>
    </form>
   </div>
   <?php
   }
   ?>
   
   
   <div style="clear:both"></div>
   <br />
   <h3>Order Details</h3>
   <div class="table-responsive">
   <?php echo $message; ?>
   <div align="right">
    <a href="cart.php?action=clear"><b>Clear Cart</b></a>
   </div>
   <table class="table table-bordered">
    <tr>
     <th width="40%">Item Name</th>
     <th width="10%">Quantity</th>
     <th width="20%">Price</th>
     <th width="15%">Total</th>
     <th width="5%">Action</th>
    </tr>
   <?php
   if(isset($_COOKIE["shopping_cart"]))
   {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
   ?>
    <tr>
     <td><?php echo $values["item_name"]; ?></td>
     <td><?php echo $values["item_quantity"]; ?></td>
     <td>৳ <?php echo $values["item_price"]; ?></td>
     <td>৳ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
     <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
   <?php 
     $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
   ?>
    <tr>
     <td colspan="3" align="right">Total</td>
     <td align="right">৳ <?php echo number_format($total, 2); ?></td>
     <td></td>
    </tr>
   <?php
   }
   else
   {
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
   </table>
   </div>
  </div>
  <input type="submit"  name="submit" class="submit_cart" value="Submit">
  <br />
 </body>
</html>