<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <title> DASHBOARD - WEBSITE CONTENT </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

</head>

<body>
  <div class="layer"> </div>

    <!-- Body -->

    <div class="page-flex">

      <!-- Dashboard Sidebar -->
      <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

      <div class="main-wrapper">


        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/navbar.php" ?>

        <!--  SYSTEM LOGS MAIN CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> WEBSITE CONTENT </h2>
            </center>
          </div>

          <div class="users-table table-wrapper">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder=" Search ">
              <button type="filter" style="color:white"> FILTER </button>
              <button type="sort" style="color:white"> SORT </button>
            </div>

            <br>

            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th> <b> CONTENT I.D</b> </th>
                  <th> <b> CONTENT DESCRIPTION</b> </th>
                  <th> <b> CONTENT TYPE</b> </th>
                  <th> <b> DATE</b></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>I.D NUMBER 12345</td>
                  <td>Content Description </td>
                  <td>
                    <div class="pages-table-img">Jenny Wilson</div>
                  </td>
                  <td>17.04.2021</td>
                </tr>

              </tbody>
            </table>
          </div>

          <div class="paginations">
            <li class="page-item previous-page"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">1</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">2</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">3</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">4</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
            <li class="page-item dots"><a class="page-link" href="#">...</a></li>
            <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
          </div>

        </main>

        <!-- FOOTER -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>

      </div>
    </div>
    <!-- TOAST -->
    <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
      <div class="toast-container top-0 end-0 p-3">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
          <div class="toast-header">
            <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
            <strong class="me-auto" style="font-size:20px;"> &nbsp; Notification </strong>
            <small> JUST NOW </small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body" style="color:#db6551; font-size:15px;"><?php echo $_SESSION["msg"] ?></div>
        </div>
      </div>
    <?php
    }
    unset($_SESSION["msg"]);
    ?>
    <!-- SCRIPTS -->
    <!-- Custom scripts -->
    <script src="/Ohana/src/dashboard/js/script.js"></script>

    <!-- JavaScript BOOTSTRAP Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

  <!--SCRIPT FOR BOOTSTRAP MODAL-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
</body>

</html>