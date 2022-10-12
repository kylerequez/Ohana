<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META TAGS-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS-->

  <title> OHANA KENNEL PH DASHBOARD </title>

  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- BOOTSTRAP CSS CDN -->
  <!-- VERSION 5.2.1 FOR BOOSTRAP COMPONENTS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- JavaScript Includes -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/admin.css">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
  <?php
  if (!isset($_SESSION)) session_start();
  include_once dirname(__DIR__) . '/models/Account.php';

  if (empty($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("Location: http://localhost/login");
    exit();
  } else {
    $user = unserialize($_SESSION['user']);
  ?>
    <div class="layer"> </div>
    <!-- Body -->
    <div class="page-flex">
      <!-- Dashboard Sidebar -->
      <?php include_once dirname(__DIR__) . '/dashboard/sidebar.php' ?>
      <div class="main-wrapper">
        <!-- END OF ADMIN DASHBOARD SIDE-->

        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/dashboard/navbar.php" ?>

        <!--  MAIN OHANNA KENNEL ADMIN DASHBOARD -->
        <main class="main users chart-page" id="skip-target"><br>
          <div class="container-fluid">
            <div class="container">
              <center>
                <h2 class="main-title" style="color:#C0B65A; font-size:80px;"> WELCOME BACK ADMIN!</h2>
              </center>
              <div class="row">

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> REGISTERED USERS</h5>
                        <p class="card-text"> 100</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> STAFF ACCOUNTS </h5>
                        <p class="card-text"> 100</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> TOTAL SALES </h5>
                        <p class="card-text"> 100</p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row" style="margin-top:20px;">
                <!-- 2nd row -->

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> TOTAL AVAILABLE DOGS </h5>
                        <p class="card-text"> 10</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> AVAILABLE SLOTS </h5>
                        <p class="card-text"> 10</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> PET PROFILES CREATED </h5>
                        <p class="card-text">10</p>
                      </div>
                    </div>
                  </div>
                </div>

              </div><!-- END OF ROW-->

              <div class="row" style="margin-top:20px;">
                <!-- 3rd row -->

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> TOTAL AVAILABLE DOGS </h5>
                        <p class="card-text"> 10</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> AVAILABLE SLOTS </h5>
                        <p class="card-text"> 10</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3" style="max-width: 480px; margin-left:10px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="color:#db6551;font-weight:bold"> PET PROFILES CREATED </h5>
                        <p class="card-text"> 20 </p>
                      </div>
                    </div>
                  </div>
                </div>

              </div><!-- END OF ROW-->
            
            </div><!-- END OF CONTAINER -->
          </div><!-- END OF CONTAINER FLUID -->

        </main>

        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/dashboard/footer.php'; ?>
      </div>
    </div>
    <!-- SCRIPTS -->

    <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JavaScript BOOTSTRAP Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <!--SCRIPT FOR BOOTSTRAP MODAL-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
  <?php
  }
  ?>
</body>

</html>