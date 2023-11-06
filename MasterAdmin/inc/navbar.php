<?php $al = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
if ($_GET['h1']) {
  $h1 = $_GET['h1'];
}
// echo $al;
?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class=" pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <?php if ($al == 'tables.php') { ?>
            <a class="<?php if ($h1 == 'all') { ?>btn btn-primary<?php } else { ?>btn btn-grey<?php } ?>" style="display: block;" href="./tables.php?h1=all&&hh=none" ">All</a>
            <a class="<?php if ($h1 == 'customer') { ?>btn btn-primary<?php } else { ?>btn btn-grey<?php } ?>" style="display: block;" href="./tables.php?h1=customer&&hh=none" ">Customers</a>
            <a class="<?php if ($h1 == 'vendor') { ?>btn btn-primary<?php } else { ?>btn btn-grey<?php } ?>" style="display: block;" href="./tables.php?h1=vendor&&hh=none" ">Vendors</a>
            <a class="<?php if ($h1 == 'medibuddy') { ?>btn btn-primary<?php } else { ?>btn btn-grey<?php } ?>" style="display: block;" href="./tables.php?h1=medibuddy&&hh=none" ">Medibuddy</a>
            <?php }?>
              <label class="form-label"></label>
              <!-- <input type="text" class="form-control" disabled> -->
            </div>
          </div>
          
        </div>
      </div>
    </nav>