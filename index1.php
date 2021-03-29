

<?php
$con=mysqli_connect("localhost", "root","", "agriculture");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

?>

 <!-- <link href="style.css" type="text/css" rel="stylesheet" /> -->


<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
		<div class="product-item">
			<form method="post" action="shoppingcart1.php?action=add&pid=<?php echo $row["id"]; ?>">
			<div class="product-image" ><img src="<?php echo $row["image"]; ?>"></div>
			<div class="product-tile-footer">
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
	product-image {
	height: 155px;
	width: 250px;
	background-color: #FFF;
}
</style>



