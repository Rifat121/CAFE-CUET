<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Helvetica;
}

* {
  box-sizing: border-box;
  font-family: /*Century Gothic*/waterlily;
}

.row {
  display: flex;
}


.left {
  flex: 35%;
  padding: 15px 0;
}

.left h2 {
  padding-left: 8px;
}


.right {
  flex: 100%;
  padding: 57px;
}

#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

#myMenu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myMenu li a {
  padding: 16px;
  text-decoration: none;
  color: black;
  display: block;
  font-weight: bold;
}

#myMenu li a:hover {
  background-color: white;
  
}
</style>
</head>
<body>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

h1{
	font-size: 24px;
	background-image: url(../new.jpg);
	background-color: #333;
	border-color: red;
	color: #f92;
	position: absolute;
	margin-left: 5%;
	font-family: waterlily;

}
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 18px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: blue;
  color: ghostwhite;
  font-weight: bold;

}
ul{
  float: right;
  list-style-type: none;
}
ul li{
  display: inline-block;
}
ul li a{
  text-decoration: none;
  /*color: #f92;*/
  color: white;
  font-family: Century Gothic;
  padding: 6px 15px;
  margin-right: 10px;
  border: 1px solid transparent;
  transition: 0.5s ease;
  font-size: 20;
  border-radius: 10px;
}

ul li a:hover{
  background-color: blue;
  color: #fff;

}
ul li.active a{
  background-color: blue;
  color: #fff;
}

</style>
<div><h1><center> <pre><font size="30 px">C@FE  CUET</font></pre> </center></h1></div>
<div class="scrollmenu">
      <ul><br><br>
        <li ><b><a href="cafe.php">Home</a></b></li>
        <li class="active"><b><a href="#">Menu</a></b></li>
        <li><b><a href="cart.php">Order</a></b></li>
        <li><b><a href="about.html">Contact Us</a></b></li>
        
       
      </ul>
    </div>

</div>



<div class="row">
  <div class="left" style="background-color:skyblue;">
    <h2>Menu Items</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search items" title="Type in a category">
    <ul id="myMenu">
      <li><a href="burgers.html">Burgers</a></li>
      <li><a href="pizzas.html">Pizzas</a></li>
      <li><a href="biriyani.html">Biriyani</a></li>
      <li><a href="platters.html">Platters</a></li>
      <li><a href="soups.html">Soups</a></li>
      <li><a href="noodles.html">Noodles</a></li>
      <li><a href="fastfoods.html">FastFoods</a></li>
      <li><a href="shakes.html">Coffees and Shakes</a></li>
      <li><a href="sweets.html">Sweets and Appetizer</a></li>
      <li><a href="drinks.html">Cold Drinks</a></li>

    </ul>
  </div>
  
  <div class="right" style="background-color:skyblue;">
    <img  src="250.jpg">
    
  </div>
</div>

<script>
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>
