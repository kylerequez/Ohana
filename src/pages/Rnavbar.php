<!DOCTYPE html>
<html lang="en">

<head>
  <title> OHANA - NAVBAR </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once 'stylesheets.php'; ?>
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <style>
    #navlogo {
      width: 100%;
      height: 90px;
    }

    #customerprofile {
      width: 50px;
      height: 40px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      .navbar.navbar-expand-xl {
        height: 110px;
      }

      #navlogo.img-fluid {
        margin-top: -40%;
      }

      .navbar-toggler {
        margin-top: -20%;
      }
    }
  </style>
</head>
<?php
include_once dirname(__DIR__) . '/config/app-config.php';
if (!isset($_SESSION['user'])) {
  session_unset();
  session_destroy();
?>
  <script>
    window.location = 'http://<?php echo DOMAIN_NAME; ?>/login';
  </script>
<?php
} else {
  include_once dirname(__DIR__) . '/models/Account.php';
  $user = unserialize($_SESSION['user']);
}
?>
<nav class="navbar navbar-expand-xl fixed-top">
  <div class="container-fluid">
    <div class="logo">
      <a href="/home"> <img src="/Ohana/src/images/Landing/navlogo.png" class="img-fluid" id="navlogo"></a>
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
          <a class="nav-link" href="/pawcart"> Paw Cart <i class="uil uil-shopping-bag"></i></a>
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
                  <img src="/Ohana/src/images/icons/dashboard.png" /><a href="/dashboard/home" target="_blank"><span class="icon home" aria-hidden="true">
                      Admin Dashboard
                  </a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/pencil.png" /><a href="/userprofile">My profile</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/doggy.png" /><a href="/ownedpets">Pet profile</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/file.png" /><a href="/transactions">Transactions</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/calendar.png" /><a href="/appointments">Appointment</a>
                </li>
                <li>
                  <img src="/Ohana/src/images/icons/log-out.png" />
                  <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                </li>
              </ul>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form method="POST" action="/accounts/logout">
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutTitle"> Do you want to logout? </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 55%;"></button>
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
<script>
  function menuToggle() {
    const toggleMenu = document.querySelector(".menu");
    toggleMenu.classList.toggle("active");
  }
</script>
</body>

</html>