<?php require_once "../inc/config.php";
if ($_SESSION[SESSION_ID_KEY] != "") {
include('inc/header.php');


    $a = $db->numrows($db->query("SELECT * FROM " . $subscript . "allusers"));
    $u = $db->numrows($db->query("SELECT * FROM " . $subscript . "users"));
    $v = $db->numrows($db->query("SELECT * FROM " . $subscript . "vendor"));
    $m = $db->numrows($db->query("SELECT * FROM " . $subscript . "medibuddy"));

    // echo $a,$v,$u,$m;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-lg-7 position-relative z-index-2">


                    <div class="row">
                    <div class="col-lg-5 col-sm-5">
                        <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Users</p>
                    <h4 class="mb-0"><?= $a; ?></h4>  
                    </div>
                </div>

                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
                </div>
                </div>

                        <div class="card  mb-2">
                <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Customers</p>
                    <h4 class="mb-0"><?= $u; ?></h4>
                    </div>
                </div>

                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span>last month</p>
                </div>
                </div>

                    </div>
                    <div class="col-lg-5 col-sm-5">
                        <div class="card mb-2">
                <div class="card-header p-3 pt-2 ">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">store</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Vendors</p>
                    <h4 class="mb-0 "><?= $v; ?></h4>
                    </div>
                </div>

                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder"> </span></p>
                </div>
                </div>

                        <div class="card ">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize ">Medibuddy</p>
                    <h4 class="mb-0 "><?= $m; ?></h4>
                    </div>
                </div>

                <hr class="horizontal my-0 dark">
                <div class="card-footer p-3">
                    <p class="mb-0 ">Just updated</p>
                </div>
                </div>

                    </div>
                    </div>

                    </div> 
            </div>
        </div>
    </div>
</div>


<?php include('inc/footer.php');
} else {
    echo "You Are Not Signed In";
    header("refresh:2;url=../admin.php");
}?>