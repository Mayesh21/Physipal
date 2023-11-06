<?php

	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
    // $_SESSION[SESSION_ID_KEY] = 7;
    // echo $_SESSION[SESSION_ID_KEY];
    if ($_SESSION[SESSION_ID_KEY] != "") {
    $q="SELECT * FROM ".$subscript."allusers where aid='".$_SESSION[SESSION_ID_KEY]."'";
	$q = $db->query($q);
    $q = $db->fetch($q);
    function qur($sq1)
                                {
                                    global $db;
                                    // var_dump($sq1);
                                    $result = $db->query($sq1);
                                    // $entries = array();
                                    // while ($data = $result->fetch_assoc()) {
                                    //     $entries[] = $data;
                                    // }
                                    return $result;
                                }
                                if ($q['ucat'] == 'customer') {
                                    $sq1 = "SELECT * FROM " . $subscript . "add_products";
                                }
                                if ($q['ucat'] == 'vendor') {
                                    $sq1 = "SELECT * FROM " . $subscript . "add_products WHERE vid=(SELECT vid FROM ".$subscript."vendor where aid='".$_SESSION[SESSION_ID_KEY]."')";
                                }
                                
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
		body
		{
		    counter-reset: Serial;          
		}

		table
		{
		    border-collapse: separate;
		}

		tr td:first-child:before
		{
		  counter-increment: Serial;      
		  content: counter(Serial); 
		}
	</style>
		<?php generateHead(APPNAME." - Product List"); ?>
	</head>
<div class="authpage">
    <div class ="authpage-main row">
        <div class="">
                <img
						src="./assets/eumeds-illustration-2.png"
						alt="Login"
						title="Login"
						aria-label="Login"
						class="resimage loginimage"
                        style="margin:0px 250px"
                        width=40%
                        height=40%
					/>
			</div>
                <div style="margin:0% 11%" class ="authpage-main-desc">
                    <h1 class = "authpage-main-desc-heading">
                        Products
                    </h1><?php
                    $cat = qur($sq1);
                                if ($db->numrows($cat) > 0) {?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product No.</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <?php
                                        if($q['ucat']=='vendor'){ 
                                    ?>
                                    <th>Edit</th>
                                    <th>Delete</th><?php } ?>
                                    <?php
                                        if($q['ucat']=='customer'){ 
                                    ?>
                                    <th>Description</th>
                                    <th>Add to Cart</th>
                                    <?php } ?>
                                </tr>  
                            </thead> 
                            <tbody>
                                <?php

                                $cat = qur($sq1);
                                
                                   foreach ($cat as $i) {
                                           ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $i['pname']; ?></td>
                                                <td>
                                                    <img src="./images/<?= $i['images'] ?>" width="50px" height="50px" alt="<?= $i['pname']; ?>">
                                                </td>
                                                <td><?= $i['price']; ?> Rs</td>
                                                <?php
                                                  if ($q['ucat'] == 'vendor') {
                                                ?>
                                                <td><a href="add_products.php?id=<?= $i['pid']; ?>" class="primarybutton">Edit</td>
                                                <td><a href="?h1=delete&hh=<?= $i['pid'] ?>?" class="dangerbutton" onclick="return confirm('Are you sure you want to delete?')">Delete</td>
                                                    <?php
                                               if ($_GET['h1'] == "delete") {
                                                   $hh = $_GET['hh'];
                                                   $h = $db->query("DELETE FROM " . $subscript . "add_products WHERE pid='" . $hh . "'");
                                                  header("refresh:0;url=./prolist.php?h1=none");
                                                   }

                                               }
                                               if ($q['ucat'] == 'customer') {
                                                    ?>
                                                <td><a href="descrip.php?product=<?= $i['slug']; ?>" class="primarybutton">Description</td>
                                                <td><a href="./processors/addcart.php?h1=<?= $i['pid']; ?>&hh=1" class="primarybutton"><i class="fa fa-shopping-cart">Add to Cart</td>
                                                <?php } ?>
                                            </tr>
                                     <?php
                                        }
                                }
                                else{
        echo "No products added yet, Please add some products using the add button below..";
                                }
                                ?>
                                
                                 
                            </tbody>   
                         </table><div style="display:block">
                         <?php if($q['ucat']=='vendor'){?><a title="add" class="primarybutton" href="./add_products.php?id=0">Add Products</a><?php  } 
                           if($q['ucat']=='customer'){?><a title="add" class="primarybutton" href="./carts.php?h1=none">Show Cart</a><?php  } ?> 
                         <a title="orders" class="primarybutton" href="./orders.php?h1=none">Orders</a> </div>
                         <a title="Cancel" class="dangerbutton" href="./processors/logoutuser.php">Logout</a> 
                     </div>
                    </div>
            </div>
    </div>

</html>
<?php
}
else{
		echo "You Are Not Signed In";
		header("refresh:0;url=./login.php");
	}

?>
