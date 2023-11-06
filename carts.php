<?php 
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
    if ($_SESSION[SESSION_ID_KEY] != "") {
    $q="SELECT * FROM ".$subscript."users where aid='".$_SESSION[SESSION_ID_KEY]."'";
	$q = $db->query($q);
    $q = $db->fetch($q);

    function qur($sq1)
                                {
                                    global $db;
                                    $result = $db->query($sq1);
                                    return $result;
                                }
                                    $sq1 = "SELECT * FROM " . $subscript . "cart WHERE uid=".$q['uid']."";               
?>
<!DOCTYPE html>
<html>
<head>
		<?php generateHead(APPNAME." - Cart"); ?>
	</head>
<div class="authpage">
    <div class ="authpage-main row">
        <div class="">
                <img
						src="./assets/cart.png"
						alt="Login"
						title="Login"
						aria-label="Login"
						class="resimage loginimage"
                        style="margin:0px 250px"
                        width=20%
                        height=20%
					/>
			</div>
                <div style="padding-left: 269px;" class ="authpage-main-desc">
                    <h1 class = "authpage-main-desc-heading">
                        Cart
                    </h1><?php
                    $cat = qur($sq1);
                                if ($db->numrows($cat) > 0) {?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>
                                </tr>  
                            </thead> 
                            <tbody>
                                <?php

                                $cat = qur($sq1);
                                
                                   foreach ($cat as $i) {
                                           ?>
                                            <tr>
                                                <td><?= $i['pname']; ?></td>
                                                <td>
                                                    <img src="./images/<?= $i['image'] ?>" width="50px" height="50px" alt="<?= $i['pname']; ?>">
                                                </td>
                                                <td><?= $i['quantity']; ?></td>
                                                <td><?= $i['price']; ?></td>
                                                <td><a href="?h1=delete&hh=<?= $i['pid'] ?>?" class="dangerbutton" onclick="return confirm('Are you sure you want to delete <?= $i['pname'] ?>?')">Delete</td>
                                                    <?php
                                               if ($_GET['h1'] == "delete") {
                                                   $hh = $_GET['hh'];
                                                   $h = $db->query("DELETE FROM " . $subscript . "cart WHERE pid='" . $hh . "'");
                                                  header("refresh:0;url=./carts.php?h1=none]");
                                                   }
                                               }
                                               
                                               ?>
                                               
                                            </tr> 
                                        </tbody>   
                                    </table>
                                                   <a title="add" class="primarybutton" href="./pay.php">Confirm</a>
                                                   <?php
                                        }
                                
                                else{
                                    echo "No products added in the cart yet..";
                                }
                                ?>
                       <a title="Cancel" style="display:flex;" class="dangerbutton" href="./prolist.php?h1=none">Back</a>
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