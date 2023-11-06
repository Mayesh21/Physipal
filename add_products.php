<?php
	// ini_set('display_errors',0);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/db.php";
	require_once "./inc/config.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
$id = $_GET['id'];
if (!$id){
	$id=0;
}
$e = "SELECT * FROM " . $subscript . "add_products WHERE pid='" . $id . "'";
$q = $db->query($e);
$q = $db->fetch($q);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME." - Vendor"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img
						src="./assets/Pharmacy_hero-1.jpg"
						onmouseover="this.src='./assets/Pharmacy_hero-1.gif'"
						onmouseout="this.src='./assets/Pharmacy_hero-1.jpg'"
						alt="Register"
						title="Register"
						aria-label="Register"
						class="resimage registerimage"
					/>
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
						<?php if ($id!=0) {?>Update Product <?php } else{?>
							Add Products <?php } ?>
						</h1>
						<br />
						<form class="authpage-form" action="./processors/products.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
							<input
								placeholder="Product Name"
								type="text"
								name="pname"
								<?php if ($id!=0) {?>value="<?= $q['pname']?>" <?php } ?>
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="Image"
								type="file"
								name="image"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
                            <input
								placeholder="Description"
								type="text"
								name="description"
								<?php if ($id!=0) {?>value="<?= $q['description']?>" <?php } ?>
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="category"
								type="text"
								name="category"
								<?php if ($id!=0) {?>value="<?= $q['category']?>" <?php } ?>
								class="input form-control authpage-form-input"
								required
							/>
                            <br />
							<input
								placeholder="price"
								type="numeric"
								name="price"
								<?php if ($id!=0) {?>value="<?= $q['price']?>" <?php } ?>
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="quantity per strip"
								type="numeric"
								name="quantity"
								<?php if ($id!=0) {?>value="<?= $q['quantity']?>" <?php } ?>
								class="input form-control authpage-form-input"
								required
							/>
							
							<br />
                            
							<div
								class="authpage-form-buttons d-flex align-items-center justify-content-center"
							><?php if ($id != 0) { ?><button
									type="submit"
									class="button primarybutton loginbutton"
								>
									Update
								</button> <?php }
                            else{?>
								<button
									type="submit"
									class="button primarybutton loginbutton"
								>
									Add product
								</button><?php }?>
								&nbsp;<a
									title="submit"
									class="primarybutton"
									href="./prolist.php?h1=d"
								>
									Checklist</a
								>
							</div>
						</form>
			</div>
		</div>
	</body>
</html>