<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> DASHBOARD - CHATBOT RESPONSES </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #db6551;
      border: #db6551;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      color: white !important;
      background-color: #C0B65A;
      border: #C0B65A;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
      cursor: default;
      color: white !important;
      background-color: #C0B65A;
      box-shadow: none;
      margin-left: 10px;
      margin-right: 10px;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
      cursor: default;
      color: white !important;
      border: none;
      background: #db6551;
      box-shadow: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      box-sizing: border-box;
      display: inline-block;
      min-width: 1.5em;
      padding: 0.5em 1em;
      margin-left: 2px;
      text-align: center;
      text-decoration: none !important;
      cursor: pointer;
      color: white !important;
      border: 1px solid #db6551;
      border-radius: 30px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #C0B65A;
    }

    .paginate_button {
      background-color: #db6551;
      border-radius: 30px;
      margin-top: 20px;
    }

    .paginate_button:hover {
      background-color: #C0B65A;
    }

    #logs_next {
      background: #C0B65A;
      border-radius: 30px;
      margin-top: 20px;
      border: none;
    }

    #logs_previous {
      background: #C0B65A;
      border-radius: 30px;
      margin-top: 20px;
      border: none;
    }
  </style>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3">Chatbot Responses</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="createstaff-wrapper">
            <a class="create-response-btn" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><button type="create" style="color:white">
                <i data-feather="plus" aria-hidden="true"></i>
                Add Response </button></a>
          </div>
          <?php
          include_once dirname(__DIR__) . '/../models/ChatbotResponse.php';
          require dirname(__DIR__) . '/../config/db-config.php';
          require dirname(__DIR__) . '/../database/Database.php';
          require dirname(__DIR__) . '/../dao/ChatbotDAO.php';
          require dirname(__DIR__) . '/../services/ChatbotServices.php';

          $database = new Database($servername, $database, $username, $password);
          $dao = new ChatbotDAO($database);
          $services = new ChatbotServices($dao);

          $responses = $services->getAllResponses();
          if (!empty($responses)) {
          ?>
            <table id="responses" class="posts-table">
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
                                <button type="submit" class="btn text-white" style="background-color:#db6551"> Save Changes </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
          ?>
            <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551">
              No existing chatbot responses
            </div>
          <?php
          }
          ?>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
    <div class="toast-container top-0 end-0 p-3">
      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="toast-header">
          <img src="/Ohana/src/dashboard/img/main/notification.png" width="25px" height="25px" alt="">
          <strong class="me-auto fs-4"> &nbsp; Notification </strong>
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
  <form method="POST" action="/dashboard/chatbot-responses/add">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addResponseModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStaffTitle" style="font-family:'Acme', sans-serif;"> ADD CHATBOT RESPONSE </h5>
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
  <script>
    $(document).ready(function() {
      $('#responses').DataTable({
        "searching": true,
        "processing": true,
      });
    });
  </script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>