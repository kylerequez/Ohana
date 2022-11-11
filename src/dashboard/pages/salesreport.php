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

  <title> DASHBOARD - SALES REPORT </title>

  <!-- WEB ICON-->
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

  <!-- ICONS IMPORT  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- BOOTSTRAP CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

  <!-- CHART CUSTOM CSS-->
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    .chartMenu {
      height: 40px;
      color: rgba(255, 26, 104, 1);
    }

    .chartMenu p {
      padding: 10px;
      font-size: 20px;
    }

    .chartCard {
      height: calc(60vh - 40px);
      display: flex;
      /* ALLOWS YOU TO PUT ITEMS IN ONE LINE */
      align-items: center;
      justify-content: center;
    }

    .chartBox {
      width: 280px;
      /* WIDTH OF THE CHART BOX*/
      padding: 20px;
      border-radius: 20px;
      border: solid 3px #db6551;
      background: white;
    }
  </style>
</head>

<body>
    <div class="layer"> </div>

    <!-- Body -->

    <div class="page-flex">

      <!-- Dashboard Sidebar -->
      <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

      <div class="main-wrapper">
        <!-- END OF ADMIN DASHBOARD SIDE-->

        <!-- ! Main nav -->
        <?php include_once dirname(__DIR__) . "/navbar.php" ?>

        <!--  TRANSACTIONS CONTENT -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
            <br>
            <center>
              <h2 class="main-title"> BUSINESS SALES REPORT </h2>
            </center>

            <div class="chartCard">
              <div class="chartBox">
                <!-- 1st chart-->
                <canvas id="myChart"></canvas>
              </div>
              <div class="chartBox" style="margin-left:20px; margin-right:20px;">
                <canvas id="myChartLine"></canvas>
              </div>
              <div class="chartBox">
                <canvas id="myChartDoughnut"></canvas><!-- 3rd chart-->
              </div>
            </div>
            <div class="createstaff-wrapper">
              <button type="create"><i data-feather="file-text" aria-hidden="true"></i><a class="export-btn" href="staffpopout.html"> Export Report </a></button>
            </div>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script><!-- CHART JS IMPORT -->

            <script>
              // BAR CHART
              const data = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                  label: 'Monthly Sales',
                  data: [18, 12, 6, 9, 12, 3, 9],
                  backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                  ],
                  borderWidth: 1
                }]
              };

              // config 
              const config = {
                type: 'bar',
                data,
                options: {
                  aspectRatio: 1, //changes aspect ratio of chart
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              };

              // render init block
              const myChart = new Chart(
                document.getElementById('myChart'),
                config
              );

              // -------------------------- LINE CHART ------------------- //
              // setup 
              const dataLine = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                  label: 'Monthly Transactions',
                  data: [18, 12, 6, 9, 12, 3, 9],
                  backgroundColor: [
                    'rgba(0, 0, 0, 0.2)'
                  ],
                  borderColor: [
                    'rgba(0, 0, 0, 1)'
                  ],
                  borderWidth: 1
                }]
              };

              // configuration of the graph  
              const configLine = {
                type: 'line', //CHANGE TYPE OF GRAPH 
                data: dataLine, //always refer to constant data line
                options: {
                  aspectRatio: 1, //changes aspect ratio of chart
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              };

              // render init block
              const myChartLine = new Chart(
                document.getElementById('myChartLine'),
                configLine //shorthand refer to constant config line line 174
              );

              //DOUGNUT CHART
              // setup 
              const dataDoughnut = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                  label: 'Dougnut',
                  data: [18, 12, 6, 9, 12, 3, 9],
                  backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                  ],
                  borderWidth: 1
                }]
              };

              // config 
              const configDoughnut = {
                type: 'doughnut', //type of chart
                data: dataDoughnut, //there are no scales in a doughnut chart
                options: {}
              };

              // render init block
              const myChartDoughnut = new Chart(
                document.getElementById('myChartDoughnut'),
                configDoughnut
              );
            </script>
          </div>
        </main>
        <br><br><br>
        <!-- ! Footer -->
        <?php include_once dirname(__DIR__) . '/footer.php'; ?>

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
</body>

</html>