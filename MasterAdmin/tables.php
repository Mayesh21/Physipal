<?php require_once "../inc/config.php";
if ($_SESSION[SESSION_ID_KEY] != "") {
 include('inc/header.php'); 



$h1 = $_GET['h1'];
function qur($sq1)
        {
            global $db;
            $result = $db->query($sq1);
            return $result;
        }
if($h1=='all'){
        $sq1 = "SELECT * FROM " . $subscript . "allusers";

    } else {
        $q = "SELECT * FROM " . $subscript . "allusers where ucat='" . $h1 . "'";
        $q = $db->query($q);
        $q = $db->fetch($q);

        
        if ($q['ucat'] == 'customer') {
            $sq1 = "SELECT * FROM " . $subscript . "users";
        }
        if ($q['ucat'] == 'vendor') {
            $sq1 = "SELECT * FROM " . $subscript . "vendor";
        }
        if ($q['ucat'] == 'medibuddy') {
            $sq1 = "SELECT * FROM " . $subscript . "medibuddy";
        }
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
	</style><div class="card mb-2">
    <div class="authpage">
    <div class ="authpage-main row">
                <div style="margin:0% 3%" class ="authpage-main-desc">
                    <h1 class = "authpage-main-desc-heading">
                    <?php if ($h1 == "customer") { ?>Customers<?php }
                    if ($h1 == "all") { ?>All Users<?php }
                            if ($h1 == "vendor") { ?>Vendors<?php }
                            if ($h1 == "medibuddy") { ?>Medibuddys<?php }?>
                    </h1><?php
                    $cat = qur($sq1);
                    if ($db->numrows($cat) > 0) {
                        if ($h1 == 'all') {
                            ?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>User Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>type</th>
                                    <th>action</th>
                                </tr>  
                            </thead> 
                            <tbody>
                                <?php

                                $cat = qur($sq1);

                                foreach ($cat as $i) {
                                    ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $i['name']; ?></td>
                                                <td><?= $i['email'] ?></td>
                                                <td><?= $i['phone']; ?></td>
                                                <td><?= $i['ucat']; ?></td>
                                                <td><a class="btn btn-danger" style="display: block;" href="?h1=<?= $h1; ?>&hh=<?= $i['aid'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a><td>
                                            </tr>
                                     <?php
                                }
                        } else {
                            ?>
                    <div class = "authpage-form" >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>User Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>action</th>
                                </tr>  
                            </thead> 
                            <tbody>
                                <?php

                                $cat = qur($sq1);

                                foreach ($cat as $i) {
                                    ?>
                                            <tr>
                                                <td></td>
                                                <td><?php if ($h1 == "customer") { ?><?= $i['name']; ?><?php }
                                                       if ($h1 == "vendor") { ?><?= $i['vendorname']; ?><?php }
                                                             if ($h1 == "medibuddy") { ?><?= $i['medibuddyname']; ?><?php } ?></td>
                                                <td>
                                                    <?= $i['email'] ?>
                                                </td>
                                                <td><?= $i['phone']; ?></td>
                                                <td><a class="btn btn-danger" style="display: block;" href="?h1=<?= $h1; ?>&hh=<?= $i['aid'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a><td>
                                            </tr>
                                     <?php
                                }
                        }
                    }
                                else{
        echo "No users yet";
                                }
                                ?>
                                
                                 
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