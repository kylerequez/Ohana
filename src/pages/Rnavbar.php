<!DOCTYPE html>
<html lang="en">

<head>
  <title> OHANA - NAVBAR </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include_once 'stylesheets.php'; ?>

  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

  <style>
    #customerprofile {
      width: 50px;
      height: 40px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      .container-fluid {
        height:100px;
        width:100%;
      }
    }

  </style>
</head>
<?php
if (!isset($_SESSION["user"])) {
  session_unset();
  session_destroy();
  header("Location: http://localhost/login");
} else {
  include_once dirname(__DIR__) . '/models/Account.php';
  $user = unserialize($_SESSION['user']);
}
?>

<nav class="navbar navbar-expand-xl fixed-top">
  <div class="container-fluid">
    <div class="logo">
      <a href="/home"> <img src="/Ohana/src/images/Landing/navlogo.png" class="img-fluid" style="width: 100%; height: 90px;"> </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pawcart/get"> Paw Cart <i class="uil uil-shopping-bag"></i></a>
        </li>

        <li class="nav-item">
          <div class="action" style="margin-right:25px;">
            <div class="profile" onclick="menuToggle();">
              <img src="/Ohana/src/images/icons/customer.png" id="customerprofile">
            </div>
            <div class="menu">
              <h3 class="text-center mt-3 font-weight-bold"><?php echo $user->getFullName(); ?></h3>
              <ul>
                <li>
                  <img src="/Ohana/src/images/icons/pencil.png" /><a href="/userprofile">My profile</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/doggy.png" /><a href="/ownedpets/get">Pet profile</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/file.png" /><a href="/transactions/get">Transactions</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/calendar.png" /><a href="/appointments/get">Appointment</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/log-out.png" />
                  <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                </li>
              </ul>
            </div>
        </li>
        <!-- END OF USER DROPDOWN-->
      </ul>
    </div>
  </div>
</nav>

<!-- LOGOUT MODAL -->
<form method="POST" action="/accounts/logout">
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutTitle"> Do you want to logout? </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 45%;"></button>
        </div>
        <div class="modal-body">
          All the unsaved changes will be lost. Are you sure you would like to log-out?
        </div>
        <div class="modal-footer">
          <button type="submit" name="btnLogout" class="btn btn-danger"> Logout </button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- SCRIPTS -->
<script>
  function menuToggle() {
    const toggleMenu = document.querySelector(".menu");
    toggleMenu.classList.toggle("active");
  }
</script>

</body>

</html>