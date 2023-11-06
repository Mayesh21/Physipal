<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$pname = $_POST['pname'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$category = $_POST['category'];
	$image=$_FILES['image']['name'];
	$id = $_GET['id'];
$path = "../images";
$image_ext = pathinfo($image, PATHINFO_EXTENSION);
$filename = time() . '.' . $image_ext;
function slug($pname){
	$pname = str_replace(' ', '-', $pname);
	return $pname;
}
$slug = slug($pname);

	if(!$pname || !$description || !$price || !$category || !$quantity ){
		// No details of user received.
		echo "Please enter name, description, category ,quantity and price.";
		header("refresh:2; url=../add_products.php");
		exit();
	}

	// Escaping strings to avoid sequel injection.
	$pname = $db->escape($_POST['pname']);
	$description= $db->escape($_POST['description']);
	$price = $db->escape($_POST['price']);
	$name = $db->escape($_POST['quantity']);
	$phone = $db->escape($_POST['category']);

			$userQuery = "SELECT * FROM ".$subscript."vendor WHERE aid='".$_SESSION[SESSION_ID_KEY]."'";
			$userQuery = $db->query($userQuery);
			$user = $db->fetch($userQuery);
			$vid = $user['vid'];

if (!$id) {

	$creatorQuery = "INSERT INTO " . $subscript . "add_products(
				vid,
				pname,
				description,
				price,
				quantity,
				category,
				images,
				slug
			) VALUES(
				\"" . $vid . "\",
				\"" . $pname . "\",
				\"" . $description . "\",
				\"" . $price . "\",
				\"" . $quantity . "\",
				\"" . $category . "\",
				\"" . $filename . "\",
				\"" . $slug . "\"
			)";
} 
	else 
	{
	$creatorQuery="UPDATE ".$subscript."add_products SET
	pname=\"" . $pname . "\",
	description=\"" . $description . "\",
	price=\"" . $price . "\",
	quantity=\"" . $quantity . "\",
	category=\"" . $category . "\",
	images=\"" . $filename . "\" WHERE pid='".$id."'";
	}
			
			$created = $db -> query($creatorQuery);

			if($created){
				move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
				echo "Successfully added.";
				header("refresh:2;url=../prolist.php?h1=none");
			} else{
				echo "Something went wrong, please try again later.";
				header("refresh:2;url=../add_products.php");
			}
?>