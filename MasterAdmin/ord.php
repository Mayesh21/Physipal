<?php
require_once "../inc/config.php";
if ($_SESSION[SESSION_ID_KEY] != "") {
 include('inc/header.php'); 

    function qur($sq1)
    {
        global $db;
        $result = $db->query($sq1);
        return $result;
    }

$sq1="SELECT * FROM ".$subscript."orders";



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
	</style><div class="card mb-2">
    <div class="authpage">
    <div class ="authpage-main row">
                <div style="margin:0% 3%" class ="authpage-main-desc">
                    <h1 class = "authpage-main-desc-heading">
                        Orders
                    </h1><?php
                    $cat = qur($sq1);
                                if ($db->numrows($cat) > 0) {
                                    ?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>User Name</th>
                                    <th>Vendor Name(Profit)</th>
                                    <th>Medibuddy Name(Profit)</th>
                                    <th>Product Name</th>
                                    <th>Admin Revenue</th>
                                    <th>Status</th>
                                </tr>  
                            </thead> 
                            <tbody style="margin-right: 0%;">
                                <?php

                                $cat = qur($sq1);
                                
                                   foreach ($cat as $i) {
                            $med = $db->fetch($db->query("SELECT * FROM ".$subscript."medibuddy WHERE mid='".$i['mid']."'"));
                                           ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $i['uname']; ?></td>
                                                <td><?= $i['vendorname']; ?>(<?= $i['vpro'];?> Rs)</td>
                                                <td><?php if ($i['status'] != "pending") { ?><?= $med['medibuddyname']; ?>(<?= $i['mpro']; ?> Rs) <?php } else { ?>No Medibuddy Assigned Yet<?php }?></td>
                                                <td><?= $i['pname'];?></td>
                                                <td><?=$i['apro']?> Rs</td>
                                                <td <?php if ($i['status'] == "delivered") { ?>class="btn-info"<?php }?>><?=$i['status']?><td>
                                            </tr><div style="padding-right: 0%;">
                                     <?php
                                        }                        $e = $db->fetch($db->query(("SELECT * FROM " . $subscript . "admin")));
                        echo "Total Profit till now:- ",$e['profit']," Rs";
                                }
                                else{
        echo "No orders yet";
                                }
                                ?>
                                
                            </div>
                            </tbody>   
                         </table> 
                     </div>
                    </div>
            </div>
    </div>
</div>
</html>
<?php
} else {
    echo "You Are Not Signed In";
    header("refresh:2;url=../admin.php");
}?>