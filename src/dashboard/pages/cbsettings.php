<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - CHATBOT SETTINGS </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="UTF-8"> </script>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <div class="container-fluid">
        <main class="main users chart-page" id="skip-target">
          <div class="d-flex justify-content-center">
            <?php
            include_once dirname(__DIR__) . '/../models/ChatbotInformation.php';
            include_once dirname(__DIR__) . '/../config/db-config.php';
            include_once dirname(__DIR__) . '/../database/Database.php';
            include_once dirname(__DIR__) . '/../dao/ChatbotDAO.php';
            include_once dirname(__DIR__) . '/../services/ChatbotServices.php';

            $database = new Database($servername, $database, $username, $password);
            $dao = new ChatbotDAO($database);
            $services = new ChatbotServices($dao);
            $information = $services->getAllSettings();

            if (!empty($information)) {
            ?>
              <form method="POST" class="form-inline" action="/dashboard/chatbot-settings/update" enctype="multipart/form-data">
                <h2 class="main-title text-center mt-5"> Chatbot Settings </h2>
                <div id="cb-settings">
                  <div class="row">
                    <div class="col">
                      <center> <img src="<?php echo $information->getAvatar(); ?>" class="rounded-circle mb-3" style="height:150px;width:150px;"> </center>
                      <input type="file" class="form-control" name="image">
                      <input type="hidden" name="old-image" value="<?php echo $information->getAvatar(); ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="mb-2 mt-4 fs-5" for="name" style="display:block"> <b>CHATBOT NAME:</b> </label>
                      <input class="form-control" type="text" id="name" value="<?php echo $information->getName(); ?>" name="name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="mb-2 mt-4 fs-5" for="introduction" style="display:block"> <b>CHATBOT GREETING:</b> </label>
                      <input class="form-control" type="text" id="introduction" value="<?php echo $information->getIntroduction(); ?>" name="introduction">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label class="mb-2 mt-4 fs-5" for="noResponse" style="display:block"> <b>CHATBOT NO REPLY:</b> </label>
                      <input class="form-control" type="text" id="noResponse" value="<?php echo $information->getNoResponse(); ?>" name="noResponse">
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <input class="btn mt-5" type="submit" value="Save Changes" id="btn-Submit" style="background-color:#db6551; width:250px; color:white; font-size:16px;">
                  </div>
                </div>
              </form>
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
  </div>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>