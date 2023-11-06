<?php
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
	require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");

	$product_slug = $_GET['product'];
	$q="SELECT * FROM ".$subscript."add_products where slug='".$product_slug."'";
	$product_data = $db->query($q);
	$product = mysqli_fetch_array($product_data);

?>
<script> 
function dec(){
	var x=document.getElementById("qty");
	if(x.value>1){
		x.value--;

	}
}
function inc(){
	var x=document.getElementById("qty");
	if(x.value<10){
		x.value++;

	}
}
function check(){
	var x=document.getElementById("qty");
	<?php $p2 = 0;
	$p1=$p2 ?>+x.value;
}
function check1(){
	var x=document.getElementById("qty");
	var pid=document.getElementById("addbtn");
	$.ajax({
		method:"POST",
		url:"./map1.php",
		data:{
			"pid":pid,
			"pqty":x,
			"scope":"add"
		},
		success: function(reponse){
			if(reponse==200){
			alert("It is done");
		}
		}
	});
alert(pid.value);
}
</script>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME." - Med Descriptions"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row product_data">
				<div class="authpage-main-image col-md-7">
				<img src="./images/<?= $product['images'];?>" alt="<?=$product['pname']?>"aria-label="Login"
						class="resimage loginimage">
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h2 class="authpage-main-desc-heading">
							<?=$product['pname'];?>
					</h2>
					<hr>

					<div class="row">
			<h4>Product Description: &nbsp;   </h4>
			<p><?= $product ['description'];?></p><ul>
			<div class="input-group mb-3" style="width:130px">
				<button  class="input-group-text" onclick="dec()">-</button>
				<input id="qty" type="text" class="form-control text-center bg-white" value=1 disabled>
				<button class="input-group-text" onclick="inc()">+</button>
			</div>
			<b style="font-size:1.8vw">
			Price per unit&nbsp;<a><?= $product['price'];?></a>&nbsp; Rs</b></ul>
			<!-- href="./processors/addcart.php?h1=<?= $product['pid'];?>&hh=<?$p1;?>" -->
				</div><h4><a href="./processors/addcart.php?h1=<?= $product['pid']; ?>&hh=1">
				<button id="addbtn" class="primarybutton addToCartBtn" value="<?=$product['pid']?>"><i class="fa fa-shopping-cart to Cart me-2"></i>Add to Cart</button></a>
				<button class="dangerbutton"><i class="fa fa-heart me-2"></i>Add to Wishlist</button></h4>
				&nbsp;<a title="Cancel" class="dangerbutton" href="./prolist.php?h1=d">Cancel</a>
				</div>
			</div>
		</div>
	</body>
</html>
