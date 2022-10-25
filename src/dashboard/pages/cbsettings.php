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

        <!-- MAIN CONTENT -->
        <div class="container-fluid">
          <main class="main users chart-page" id="skip-target">
            <br>
            <center>

            </center><br>
            <div class="users-table table-wrapper">

              <?php
              require_once dirname(__DIR__) . '/../models/ChatbotInformation.php';
              $information = unserialize($_SESSION["cb_settings"]);
              // print_r($information);

              if (!empty($information)) {

                // foreach ($information as $data) {
                //   echo $data->getId() . " // " . $data->getType() . " // " . $data->getName() . " // " . $data->getInformation() . " // ";
                //   if (!is_null($data->getBlob())) {
                //     echo '<img src="data:image/jpeg;base64,' . base64_encode($data->getBlob()) . '" height="10%" width="10%"><br>';
                //   } else {
                //     echo "NO BLOB<br>";
                //   }
                // }
              ?>
                <center>
                  <form method="POST" class="form-inline" action="/dashboard/chatbot-settings/update">
                    <h2 class="main-title"> CHATBOT SETTINGS </h2>
                    
                    <div class="chatbot-image">
                      <img src="data:image/jpeg;base64,<?php echo base64_encode($information->getBlob()); ?>" style="width:150px; height:150px;">
                      <br><input type="file" id="myFile" name="filename" style="background-color: #FAF8F0;">
                    </div>
                    </center><br>
                    <label for="name" style="font-size:20px; margin-left:10%;"> <b>CHATBOT NAME:</b> </label>
                    <input type="text" id="name" value="<?php echo $information->getName(); ?>" name="email" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                    <br><label for="greeting" style="font-size:20px; margin-left:10%;"> <b>CHATBOT GREETING:</b> </label>
                    <input type="text" id="greeting" value="<?php echo $information->getIntroduction(); ?>" name="pswd" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                    <br><label for="noReply" style="font-size:20px; margin-left:10%;"> <b>CHATBOT NO REPLY:</b> </label>
                    <input type="text" id="noReply" value="<?php echo $information->getNoResponse(); ?>" name="pswd" size="100" style="background:#eed1c2; float:right; margin-right:10%;"><br>

                    <input class="btn" type="submit" value="Save Changes" id="btn-Submit" style="margin-top:5%; margin-left:65%; background-color:#db6551; color:white; width:25%; font-size:20px;">

                  </form>
               
              <?php
              }
              ?>
            </div>
          </main>

          <!-- ! Footer -->
          <?php include_once dirname(__DIR__) . '/footer.php'; ?>

        </div>
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