<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> DASHBOARD - CHATBOT RESPONSES </title>

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
  <?php
  if (!isset($_SESSION)) session_start();
  include_once dirname(__DIR__) . '/../models/Account.php';

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
      <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

      <div class="main-wrapper">

        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/navbar.php" ?>

        <!--  CUSTOMER ACCOUNTS CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> CHATBOT RESPONSES </h2>
            </center>
          </div>
          <div class="users-table table-wrapper">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder=" Search..">
            </div>
            <br>
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th> <b>RESPONSE I.D</b> </th>
                  <th> <b>RESPONSE</b></th>
                  <th> <b>QUERY</b> </th>
                  <th> <b>TIMES ASKED</b> </th>
                  <th> <b>ACTION</b> </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    I.D NUMBER 12345
                  </td>
                  <td>
                    Chatbot Response
                  </td>
                  <td>
                    <div class="pages-table-img">
                      Jenny Wilson
                    </div>
                  </td>
                  <td> 10 </td>
                  <td>
                  <a href="" data-bs-toggle="modal" data-bs-target="#editModalId">
                    <button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button></a>
                    <button class="delete-btn transparent-btn" type="delete" style="color:red; font-size: 25px;"> <i class="uil uil-trash-alt"> </i> </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>

        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>
      </div>
    </div>

    <!--EDIT RESPONSES MODAL -->
    <form method="POST" action="/dashboard/petprofiles/add">
      <div class="modal fade" id="editModalId" tabindex="-1" aria-labelledby="addSlotModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCbresponses"> EDIT CHATBOT RESPONSES </h5>
              <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
              <input name="type" type="hidden" value="STAFF">
              <div class="mb-3">
                <label for="name" class="col-form-label"> DOG NAME </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Dog Name" required style="background-color:#eed1c2; color:black">
              </div>
              <div class="mb-3">
                <label for="owner" class="col-form-label"> DOG OWNER </label>
                <input type="text" class="form-control" name="owner" placeholder="Name of Dog Owner" required style="background-color:#eed1c2; color:black">
              </div>
              <input type="hidden" class="form-control" name="status"> <!-- FOR OHANA OWNER -->
              <div class="mb-3">
                <label for="image" class="col-form-label"> DOG IMAGE </label><br>
                <input type="file" name="fileToUpload" id="fileToUpload" style="background-color:transparent;">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn" id="ToastBtn" style="background-color:#db6551"> SAVE CHANGES </button>
            </div>
          </div>
        </div>
      </div>
    </form>

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