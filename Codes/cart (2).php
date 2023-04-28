<?php

	
//connection to database

	
  session_start();

	
  $connect = mysqli_connect("localhost", "root", "", "order");
	

	
    if(isset($_POST["add_to_cart"]))

	
    {

	
      if(isset($_SESSION["shopping_cart"]))

	
      {

	
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

	
        if(!in_array($_GET["id"], $item_array_id))

	
        {

	
          $count = count($_SESSION["shopping_cart"]);

	
    //get all item detail

	
            $item_array = array(

	
                      'item_id'       =>   $_GET["id"],

	
                      'product_img'     =>   $_POST["hidden_image"],

	
                      'item_name'     =>   $_POST["hidden_name"],

	
                      'item_price'    =>   $_POST['hidden_price'],

	
                      'item_quantity' =>   $_POST["quantity"]

	

	
            );

	
            $_SESSION["shopping_cart"][$count] = $item_array;

	
        }

	
        else

	
        {

	
          //product added then this block 

	
          echo '<script>alert("Item allready added ")</script>';

	
          echo '<script>window.location = "cart.php"</script>';

	
        }

	
      }

	
      else

	
      {

	
        //cart is empty excute this block

	
         $item_array = array(

	
                      'item_id'       =>   $_GET["id"],

	
                      'product_img'     =>   $_POST["hidden_image"],

	
                      'item_name'     =>   $_POST["hidden_name"],

	
                      'item_price'    =>   $_POST['hidden_price'],

	
                      'item_quantity' =>   $_POST["quantity"]

	

	
            );

	
           $_SESSION["shopping_cart"][0] = $item_array;

	
      }

	
    }

	
//Remove item in cart 

	
    if(isset($_GET["action"]))

	
    {

	
      if($_GET["action"] == "delete")

	
      {

	
        foreach($_SESSION["shopping_cart"] as $key=>$value)

	
            {

	
              if($value["item_id"] == $_GET["id"])

	
              {

	
                unset($_SESSION["shopping_cart"][$key]);

	
                echo '<script>alert("Item removed")</script>';

	
                echo '<script>window.location="cart.php</script>';

	
              }

	
            }

	
      }

	
    }

	

	

	

	

	

	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body style="background-color: skyblue" " margin-left: 15px" >
	<h1 class="text-center text-danger mb-5"
	style= "font-family: 'waterlily'"> MENU ITEMS</h1>

	<div class="row">

	<?php

	$con = mysqli_connect("localhost", "root", "", "order");

       
	$query ="SELECT `item name`, `image`, `price` FROM `menu cart`";
	$queryfire = mysqli_query($con, $query);
	$num = mysqli_num_rows($queryfire);

	if($num > 0){
        while($product = mysqli_fetch_array($queryfire)){
               
             ?>

             <div class="col-lg-3 col-md-3 col-sm-12">
             	<form>
             		<div style=" background-color: white " align="center">
             			
             		<div class="card">
             			<h6 class="card-title bg-info text-white p-2 text-uppercase"> <?php echo 
             			$product['item name']; ?> </h6>

             			<div class="card-body">
             				<img src="<?php echo
             				$product['image']; ?>"alt="menu"class="img-fluid">
             	<h5>  ৳ <?php echo $product['price']; ?> </h5>
             		
             		</div>
             		<div class="">
             		     <input type="text" name="quantity" class="form-control" value="1" />

	
                            <input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>" />

	
                           <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">

	
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">

	

	

	
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  

             		</div>
             	
             </div>
         </div>

             </form>

             </div>


                  <?php } } ?>

	
                <div style="clear:both"></div>  

	
                <br />  

	
                
                <div class="table-responsive">  

	
                     <table style="text-align:center" bgcolor="green"  
                     class="table table-bordered">  

	
                          <tr> 
 

	
                               <th width="20%">Item Name</th>  

	
                               <th width="10%">Quantity</th>  

	
                               <th width="20%">Price</th>  

	
                               <th width="15%">Total</th>  

	
                               <th width="3%">Action</th>  

	
                          </tr>  

	
                             <?php 

	
                           if(!empty($_SESSION["shopping_cart"]))

	
                           {

	
                            $total = 0;

	
                            foreach($_SESSION["shopping_cart"] as $key => $value)

	
                           {

	
                            

	

	
                             ?>

	
                          <tr> 

	
                             
	
                               <td><?php echo $value['item_name'];?></td>  

	
                               <td><?php echo $value['item_quantity']; ?></td>  

	
                               <td>$<?php echo $value['item_price'];?></td>  

	
                               <td>$<?php echo number_format($value["item_quantity"] * $value["item_price"],2);?></td>  

	
                               <td><a href="cart.php?action=delete&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">Remove</span></a></td>  

	
                          </tr>  

	
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);

	
                        }

	
                        ?>

	
                           

	
                          <tr>  

	
                               <td colspan="3" align="right">Total</td>  

	
                               <td align="right">$<?php echo number_format($total);?></td>  

	
                               <td></td>  

	
                          </tr> 

	
                          <?php } 
                          else
                          	echo "No item inserted";?> 

	
                           

	
                     </table>  

	
                </div>  

	
           </div>  

	
           <br /> 


</body>
</html>