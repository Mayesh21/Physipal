<?php $al = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
if ($_GET['h1']) {
  $h1 = $_GET['h1'];
  $al=$al."?h1=".$h1;}
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./ " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Physipal</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $al == "index.php?h1=none" ? 'active bg-gradient-info' : '';?>" href="./index.php?h1=none">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $al == "tables.php?h1=customer" ? 'active bg-gradient-info' : '';?>" href="./tables.php?h1=all&&hh=none">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Users</span>
          </a>
          </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $al == "ord.php?h1=none" ? 'active bg-gradient-info' : '';?>" href="./ord.php?h1=none">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Orders</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-danger mt-4 w-100" href="../processors/logoutuser.php" type="button">Logout</a>
      </div>
    </div>
  </aside>