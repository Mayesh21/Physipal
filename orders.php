<?php 
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
    // $_SESSION[SESSION_ID_KEY] = 11;
    if ($_SESSION[SESSION_ID_KEY] != "") {
        $q="SELECT * FROM ".$subscript."allusers where aid='".$_SESSION[SESSION_ID_KEY]."'";
        $q = $db->query($q);
        $q = $db->fetch($q);

    function qur($sq1)
                                {
                                    global $db;
                                    $result = $db->query($sq1);
                                    return $result;
                                }
if ($q['ucat'] == "customer") {
   $userQuery = "SELECT * FROM " . $subscript . "users WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
    $userQuery = $db->query($userQuery);
    $user = $db->fetch($userQuery);
    $uid = $user['uid'];
    $sq1 = "SELECT * FROM " . $subscript . "orders WHERE uid='" . $uid . "'";
}
if($q['ucat'] == "vendor"){
    $userQuery = "SELECT * FROM " . $subscript . "vendor WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
    $userQuery = $db->query($userQuery);
    $user = $db->fetch($userQuery);
    $vid = $user['vid'];
    $sq1 = "SELECT * FROM " . $subscript . "orders WHERE vid='" . $vid . "'";
}
if ($q['ucat'] == "medibuddy") {
    $userQuery = "SELECT * FROM " . $subscript . "medibuddy WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
    $userQuery = $db->query($userQuery);
    $user = $db->fetch($userQuery);
    $mid = $user['mid'];
    $sq1 = "SELECT * FROM " . $subscript . "orders";
}
    $Tprofit = 0;
                   
?>
<!DOCTYPE html>
<html>
<head>
		<?php generateHead(APPNAME." - Orders"); ?>
	</head>
<div class="authpage">
    <div class ="authpage-main row">
        <div class="">
                <img
						src="./assets/vecteezy_delivery-van-movement-on-gps-map-laptop-screen-background_7278339.jpg"
						alt="Login"
						title="Login"
						aria-label="Login"
						class="resimage loginimage"
                        style="margin:0px 250px"
                        width=40%
                        height=40%
					/>
			</div>
                <div style="padding-left: 5%; padding-right: 5%;" class ="authpage-main-desc">
                    <h1 class = "authpage-main-desc-heading">
                        Orders
                    </h1><?php
                    $cat = qur($sq1);
                                if ($db->numrows($cat) > 0) {?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><th>Customer name</th><?php }?>
                                <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><th>Address</th><?php }?>
                                <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><th>Contact</th><?php }?>
                                <?php if($q['ucat']=="customer" || $q['ucat']=="medibuddy"){?><th>Pharmacy name</th><?php }?>
                                    <th>Product Name</th>
                                    <th>Image</th><?php if ($q['ucat'] != "medibuddy") { ?>
                                    <th>Quantity</th>
                                    <th>Price</th><?php }?>
                                    <th>Status</th>
                                    <?php if($q['ucat']=="customer" || $q['ucat']=="medibuddy"){?><th>Action</th><?php }?>
                                </tr>  
                            </thead> 
                            <tbody>
                                <?php

                                $cat = qur($sq1);

        foreach ($cat as $i) {
            $cr="SELECT * FROM ".$subscript."card WHERE uid='".$i['uid']."'";
            $cr = $db->query($cr);
            $cr = $db->fetch($cr);
                                ?>
                                            <tr>
                                            <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><td><?=$i['uname']?></td><?php }?>
                                            <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><td><?=$cr['address']?></td><?php }?>
                                            <?php if($q['ucat']=="vendor" || $q['ucat']=="medibuddy"){?><td><?=$cr['phone']?></td><?php }?>
                                            <?php if($q['ucat']=="customer" || $q['ucat']=="medibuddy"){?><td><?=$i['pharmname']?></td><?php }?>
                                                <td><?= $i['pname']; ?></td>
                                                <td>
                                                    <img src="./images/<?= $i['image'] ?>" width="50px" height="50px" alt="<?= $i['pname']; ?>">
                                                </td><?php if ($q['ucat'] != "medibuddy") { ?>
                                                <td><?= $i['quantity']; ?></td>
                                                <td><?= $i['tprice']; ?> Rs</td><?php if ($i['status'] == "delivered" || $i['status'] == "exchanging" || $i['status'] == "exchanged") {
                    $Tprofit = $Tprofit + ($i['tprice'] * 70 / 100);
                }
            }?>
                                                <td class="primary"><?= $i['status']; ?></td>
                                                <?php if ($q['ucat'] == "customer" && ($i['status']=="delivered")) { ?><td><a title="add" class="primarybutton" href="?h1=exchange&hh=<?= $i['oid'] ?>"onclick="return confirm('Are you sure you want to exchange order of <?= $i['pname'] ?>?')">Exchange</a><a href="?h1=return&hh=<?= $i['oid'] ?>" class="dangerbutton" onclick="return confirm('Are you sure you want to return order of <?= $i['pname'] ?>?')" >Return</td><?php }?>
                                                <?php if ($q['ucat'] == "customer" && ($i['status'] == "transporting" || $i['status'] == "exchanging")) { ?><td><a title="add" class="primarybutton" href="./track.php?h1=<?= $i['oid'] ?>&hh=none">Track order</a><a href="?h1=cancel&hh=<?= $i['oid'] ?>" class="dangerbutton" onclick="return confirm('Are you sure you want to cancel order of <?= $i['pname'] ?>?')">Cancel</td><?php }?>
                                                <?php if ($q['ucat'] == "customer" &&  $i['status'] == "pending") { ?><td>Waiting</td><?php }?>
                                                <?php if ($q['ucat'] == "customer" && $i['status'] == "cancelled") { ?><td>All done</td><?php }?>
                                                <?php if ($q['ucat'] == "customer" && $i['status'] == "exchanged") { ?><td>All done</td><?php }?>
                                                <?php if ($q['ucat'] == "customer" && $i['status'] == "returning") { ?><td><a title="add" class="primarybutton" href="./track.php?h1=<?= $i['oid'] ?>&hh=none">Track order</a><a href="?h1=cancel&hh=<?= $i['oid'] ?>" class="dangerbutton" onclick="return confirm('Are you sure you want to cancel return of <?= $i['pname'] ?>?')">Cancel</td><?php }?>
                                                    <!-- if ($q['ucat'] == "customer" && $i['status']=="delivered") { ?><td><a title="add" class="primarybutton" href="./track.php?h1=<?= $i['oid'] ?>&hh=none" onclick="return confirm('Are you sure you want to exchange order of <?= $i['pname'] ?>?')">Exchange</a><a href="?h1=cancel&hh=<?= $i['pid'] ?>" class="dangerbutton" onclick="return confirm('Are you sure you want to return order of <?= $i['pname'] ?>?')">Return</td> -->

<?php
                                        if ($_GET['h1'] != "none") {
                                            $hh = $_GET['hh'];
                                            if ($_GET['h1'] == "cancel") {

                                                $h = $db->query("UPDATE " . $subscript . "orders SET status='cancelled' WHERE oid='" . $hh . "'");
                                                header("refresh:0;url=./orders.php?h1=none&hh=none");
                                            }
                                            if ($_GET['h1'] == "exchange") {

                                                $h = $db->query("UPDATE " . $subscript . "orders SET status='exchanging' WHERE oid='" . $hh . "'");
                                                header("refresh:0;url=./orders.php?h1=none&hh=none");
                                            }
                                            if ($_GET['h1'] == "return") {

                                                $h = $db->query("UPDATE " . $subscript . "orders SET status='returning' WHERE oid='" . $hh . "'");
                                                header("refresh:0;url=./orders.php?h1=none&hh=none");
                                            }
                                        }


                        if ($q['ucat'] == "medibuddy" && $i['status'] == "pending") { ?><td><a href="?h1=take&hh=<?= $i['oid'] ?>" class="primarybutton" onclick="return confirm('Are you sure you want to take order for <?= $i['uname'] ?>?')">Take Order</td>
            <?php } if ($_GET['h1'] == "take") {
                    $hh = $_GET['hh'];
                    $h = $db->query("UPDATE " . $subscript . "orders SET status='transporting' WHERE oid='" . $hh . "'");
                    $h1 = $db->query("UPDATE " . $subscript . "orders SET mid='".$mid."' WHERE oid='" . $hh . "'");
                    header("refresh:0;url=./orders.php?h1=none&hh=none");
                }
            
            if ($q['ucat'] == "medibuddy" && ($i['status'] == "transporting" || $i['status']=="exchanging" || $i['status']=="returning")) { ?><td><a href="./track.php?h1=<?= $i['oid']?>&hh=none" class="primarybutton" >Directions</td>
<?php }             if ($q['ucat'] == "medibuddy" && ($i['status'] == "delivered"|| $i['status']=="exchanged" || $i['status']=="cancelled")) { ?><td>Done</td>
    <?php }
        }
                                               
                                               ?>
                                               
                                            </tr> 
                                        </tbody>   
                                    </table>
                                                   <?php
                                        }
                                
                                else{
                                    echo "No orders available..";
                                }
    if ($q['ucat'] == "vendor") {?><h2><?php
        echo "Total Profit = ", $Tprofit;?></h2><?php
    }
                                ?>
                       <?php if ($q["ucat"] == "medibuddy") { ?><a title="Cancel" class="dangerbutton" href="./processors/logoutuser.php">Logout</a> <?php } else { ?><a title="Cancel" style="display:flex" class="dangerbutton" href="./prolist.php?h1=none">Back</a><?php } ?>
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