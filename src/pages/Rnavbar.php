<!DOCTYPE html>
<html lang="en">

<head>

  <title> OHANA - NAVBAR </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

  <!-- FONT AWESOME ICONS IMPORT -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS CDN --><!-- 5.2.1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
</head>

<body>

  <!-- NAVIGATION BAR FOR UNREGISTERED USERS -->
  <nav class="navbar navbar-expand-md fixed-top">
    <div class="container-fluid">
      <div class="logo">
        <a href="/home"> <img src="/Ohana/src/images/Landing/navlogo.png" style="width: 100%; height: 100px;"> </a>
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
            <div class="action">
              <div class="profile" onclick="menuToggle();">
                <img src="/Ohana/src/images/icons/customer.png" style="width:60px; height:50px;">
              </div>
              <div class="menu">
                <h3> Registered Customer Name<br /><span>customer@gmail.com</span></h3>
                <ul>
                  <li>
                    <img src="/Ohana/src/images/icons/edit.png" /><a href="/userprofile">My profile</a>
                  </li>
                  <li>
                    <img src="/Ohana/src/images/icons/dog.png" /><a href="/ownedpets">Pet profile</a>
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

  <!-- BOOTSTRAP LOGOUT MODAL -->
  <form method="GET" action="/login">
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
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>
