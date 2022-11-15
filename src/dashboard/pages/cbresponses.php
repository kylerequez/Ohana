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
            <div class="createstaff-wrapper">
              <a class="create-response-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white">
                  <i data-feather="plus" aria-hidden="true"></i>
                  Add Response </button></a>
            </div>

            <?php
            include_once dirname(__DIR__) . '/../models/ChatbotResponse.php';
            $responses = unserialize($_SESSION["cb_responses"]);
            
            if (!empty($responses)) {
            ?>
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
                  <?php
                  foreach ($responses as $response) {
                  ?>
                    <tr>
                      <td><?php echo $response->getId(); ?></td>
                      <td><?php echo $response->getResponse(); ?></td>
                      <td><?php echo $response->getQuery(); ?></td>
                      <td><?php echo $response->getTimesAsked(); ?></td>
                      <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editModalId<?php echo $response->getId(); ?>">
                          <button class="edit-btn transparent-btn" type="edit" style="color:#C0B65A; margin-right: 15px; font-size: 25px;"> <i class="uil uil-edit"> </i> </button></a>
                        <a href="/dashboard/chatbot-responses/delete/<?php echo $response->getId(); ?>"><button class="delete-btn transparent-btn" onclick="return confirm('Are you sure you want to delete Response ID <?php echo $response->getId(); ?>?');" type="delete" style="color:red; font-size: 25px;"><i class="uil uil-trash-alt"></i></button></a>
                      </td>
                      <!-- EDIT RESPONSE MODAL -->
                      <form method="POST" action="/dashboard/chatbot-responses/update/<?php echo $response->getId(); ?>">
                        <div class="modal fade" id="editModalId<?php echo $response->getId(); ?>" tabindex="-1" aria-labelledby="addResponseModal" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addStaffTitle"> EDIT CHATBOT RESPONSE </h5>
                                <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="timesAsked" value="<?php echo $response->getTimesAsked(); ?>">
                                <div class="mb-3">
                                  <label for="query" class="col-form-label"> QUERY </label>
                                  <input type="text" class="form-control" name="query" value="<?php echo $response->getQuery(); ?>" required style="background-color:#eed1c2; color:black">
                                </div>
                                <div class="mb-3">
                                  <label for="response" class="col-form-label"> RESPONSE </label>
                                  <input type="text" class="form-control" name="response" value="<?php echo $response->getResponse(); ?>" required style="background-color:#eed1c2; color:black">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn" style="background-color:#db6551"> Save Changes </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            <?php
            } else {
              echo "<h1>NULL</h1>";
            }
            ?>
            <!-- ADD PET PROFILE MODAL -->
            <form method="POST" action="/dashboard/chatbot-responses/add">
              <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addResponseModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addStaffTitle"> ADD CHATBOT RESPONSE </h5>
                      <a><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <input name="timesAsked" type="hidden" value="0">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="query" class="col-form-label"> QUERY </label>
                        <input type="text" class="form-control" name="query" placeholder="Enter User Query" required style="background-color:#eed1c2; color:black">
                      </div>
                      <div class="mb-3">
                        <label for="response" class="col-form-label"> RESPONSE </label>
                        <input type="text" class="form-control" name="response" placeholder="Enter Dog Name" required style="background-color:#eed1c2; color:black">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn" style="background-color:#db6551; color:white"> Add Response </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </main>

        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>

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
</body>

</html>