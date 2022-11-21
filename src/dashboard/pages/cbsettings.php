<!DOCTYPE html>
<html lang="en">

<head>
  <!-- META TAGS -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <title> DASHBOARD - CHATBOT SETTINGS </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

  <!-- JQUERY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="UTF-8"> </script>

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

      <!-- MAIN CONTENT -->
      <div class="container-fluid">
        <main class="main users chart-page" id="skip-target">
          <div class="users-table table-wrapper">
            <?php
            require_once dirname(__DIR__) . '/../models/ChatbotInformation.php';
            $information = unserialize($_SESSION["cb_settings"]);

            if (!empty($information)) {
            ?>
              <center>
                <form method="POST" class="form-inline" action="/dashboard/chatbot-settings/update" enctype="multipart/form-data">
                  <h2 class="main-title mt-5"> CHATBOT SETTINGS </h2>

                  <div class="chatbot-image">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($information->getBlob()); ?>" style="width:150px; height:150px;">
                    <br><input type="file" id="myFile" name="filename" style="background-color: #FAF8F0;">
                    <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($information->getBlob()); ?>">
                  </div>
              </center>
              <div id="cb-settings" style="margin-left:25%">
                <span style="display:inline-block">
                  <label class="mb-2" for="name" style="font-size:20px;display:block"> <b>CHATBOT NAME:</b> </label>
                  <input type="text" id="name" value="<?php echo $information->getName(); ?>" name="name" size="100" style="background:#eed1c2;">
                </span>
                <span style="display:inline-block">
                  <label class="mb-2" for="introduction" style="font-size:20px;display:block"> <b>CHATBOT GREETING:</b> </label>
                  <input type="text" id="introduction" value="<?php echo $information->getIntroduction(); ?>" name="introduction" size="100" style="background:#eed1c2; "><br>
                </span>
                <span style="display:inline-block">
                  <label class="mb-2" for="noResponse" style="font-size:20px;display:block"> <b>CHATBOT NO REPLY:</b> </label>
                  <input type="text" id="noResponse" value="<?php echo $information->getNoResponse(); ?>" name="noResponse" size="100" style="background:#eed1c2;"><br>
                </span>
                <input class="btn mt-5" type="submit" value="Save Changes" id="btn-Submit" style=" margin-left:50%; background-color:#db6551; color:white; width:25%; font-size:20px;">
              </div>
              </form>

            <?php
            }
            ?>
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
                </center><br>
                <label for="name" style="font-size:20px; margin-left:10%;"> <b>CHATBOT NAME:</b> </label>
                <input type="text" id="name" value="<?php echo $information->getName(); ?>" name="name" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                <br><label for="introduction" style="font-size:20px; margin-left:10%;"> <b>CHATBOT GREETING:</b> </label>
                <input type="text" id="introduction" value="<?php echo $information->getIntroduction(); ?>" name="introduction" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                <br><label for="noResponse" style="font-size:20px; margin-left:10%;"> <b>CHATBOT NO REPLY:</b> </label>
                <input type="text" id="noResponse" value="<?php echo $information->getNoResponse(); ?>" name="noResponse" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                <input class="btn" type="submit" value="Save Changes" id="btn-Submit" style="margin-top:5%; margin-left:65%; background-color:#db6551; color:white; width:25%; font-size:20px;">

                </form>

              <?php
            }
              ?>
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
        </main>

        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>

      </div>
    </div>
  </div>

  <!-- SCRIPTS -->

  <<<<<<< HEAD <!-- Chart library -->
    <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    =======
    <!-- Icons library -->
    <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
    >>>>>>> da2961b4d47efe43c4a6928f4fc4c2acc83e0dd4

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