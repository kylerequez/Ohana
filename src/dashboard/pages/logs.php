<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - LOGS </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3"> System Logs </h2>
        </div>
        <div class="users-table table-wrapper">
          <?php
          include_once dirname(__DIR__) . '/../models/Log.php';
          $logs = unserialize($_SESSION["logs"]);
          if (!empty($logs)) {
          ?>
            <table id="logs" class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th><b>LOG I.D </b></th>
                  <th><b>DESCRIPTION</b></th>
                  <th><b>DATE</b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($logs as $log) {
                ?>
                  <tr>
                    <td><?php echo $log->getId(); ?></td>
                    <td><?php echo $log->getLog(); ?></td>
                    <td><?php echo $log->getDate()->format('M-d-Y H:i:s'); ?></td>
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
              No existing System Logs
            </div>
          <?php
          }
          ?>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#logs').DataTable({
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