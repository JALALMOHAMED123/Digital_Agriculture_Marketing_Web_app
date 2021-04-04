<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="./responsive.css">
    <link rel="stylesheet" href="./bootstrap.css"> -->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    
    <title>Agriculture App</title>
    <!-- chatbot -->
<!-- <link rel="stylesheet" type="text/css" href="./jquery.convform.css">
<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="./js/jquery.convform.js"></script>
<script type="text/javascript" src="./js/custom.js"></script> -->



  </head>
  <body>
    <!-- chatbot -->
      <a class="chat_icon" href="http://127.0.0.1:5000/"><i class="fab fa-facebook-messenger"></i></a>
      <!-- <i class="fa fa-paper-plane" aria-hidden="true"></i> -->
    <!-- <div class="chat_box">
      <div class="my-conv-form-wrapper">
        <form action="" method="GET" class="hidden">     
         
          <select data-conv-question="Hello! How can I help you" name="category">
            <option value="WebDevelopment">Website Development ?</option>
            <option value="DigitalMarketing">Digital Marketing ?</option>
          </select>
    
           <div data-conv-fork="category">
            <div data-conv-case="WebDevelopment">
              <input type="text" name="domainName" data-conv-question="Please, tell me your domain name">    
            </div>
            <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
              <input type="text" name="companyName" data-conv-question="Please, enter your company name"> 
            </div>
          </div>
    
          <input type="text" name="name" data-conv-question="Please, Enter your name">
    
          <input type="text" data-conv-question="Hi {name}, <br> It's a pleasure to meet you." data-no-answer="true">
    
          <input data-conv-question="Enter your e-mail" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" name="email" required placeholder="What's your e-mail?">
    
          <select data-conv-question="Please Conform">
            <option value="Yes">Conform</option>
          </select> 
    
        </form>
      </div>
    </div> -->
    <!-- /chatbot -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
      <a class="navbar-brand pl-5" href="#">Digital Agricultural Marketing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active ">
            <a class="nav-link pr-4" href="marketing.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="product.html"><i class="fa fa-product-hunt" aria-hidden="true"></i> Products</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-sign-in" aria-hidden="true"></i>  Login
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-white" href="login.html">Login</a>
              <a class="dropdown-item text-white" href="register.html">Register</a>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link pr-4" href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link pr-4" href="addcart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Addcart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="aboutus.html"><i class="fa fa-address-card" aria-hidden="true"></i> AboutUs</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-telegram"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </nav>
<?php
$con=mysqli_connect("localhost", "root","", "agriculture");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

?>

<!-- <link href="style.css" type="text/css" rel="stylesheet" /> -->


<div id="product-grid">
	<div class="txt-heading"><h1><b>Products</b></h1></div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
		<div class="product-item">
			<form method="post" action="shoppingcart.php?action=add&pid=<?php echo $row["id"]; ?>">
			<div class="product-image"><img src="<?php echo $row["image"]; ?>"></div>
			<div class="product-title-footer">
			<div class="product-title"><?php echo $row["name"]; ?></div>
			<div class="product-price"><?php echo "$".$row["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";

	}
	?>
</div>
<style>
	body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
}

#shopping-cart {
	margin: 40px;
}

#product-grid {
	margin: 40px;
}

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}

#shopping-cart table td {
	background-color: #FFFFFF;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 0px;
	border: #E0E0E0 1px solid;
}

.product-image {
	height: 155px;
	width: 250px;
	background-color: #FFF;
}

.clear-float {
	clear: both;
}

.demo-input-box {
	border-radius: 2px;
	border: #CCC 1px solid;
	padding: 2px 1px;
}

.tbl-cart {
	font-size: 0.9em;
}

.tbl-cart th {
	font-weight: normal;
}

.product-title {
	margin-bottom: 20px;
}

.product-price {
	float:left;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.cart-item-image {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}
.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
}
</style>



