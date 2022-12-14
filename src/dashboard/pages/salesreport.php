<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <title> DASHBOARD - SALES REPORT </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
  <style>
    .chartCard {
      height: calc(60vh - 40px);
      display: flex;

      align-items: center;
      justify-content: center;
    }

    .chartBox {
      width: 300px;

      padding: 20px;
      border-radius: 20px;
      border: solid 3px #db6551;
      background: white;
      margin: 25px;
    }

    #chartcontainer {
      margin-top: -5%;
    }

    #export .btn-warning {
      color: white;
      background-color: #db6551;
      border-color: #db6551;
      font-size: 16px;
      border-radius: 30px;
      padding: 10px 30px;
      cursor: pointer;
    }
  </style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Number'],
        <?php
        foreach ($result as $row) {
          echo "['" . $row["gender"] . "', " . $row["number"] . "],";
        }
        ?>
      ]);

      var options = {
        title: 'Monthly Transactions of Ohana',
        pieHole: 0.4,
        chartArea: {
          left: 100,
          top: 70,
          width: '100%',
          height: '80%'
        }
      };
      var chart_area = document.getElementById('piechart');
      var chart = new google.visualization.PieChart(chart_area);

      google.visualization.events.addListener(chart, 'ready', function() {
        chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
      });
      chart.draw(data, options);

      var options = {
        title: 'Monthly Sales',
        pieHole: 0.4,
        chartArea: {
          left: 100,
          top: 70,
          width: '100%',
          height: '80%'
        }
      };
      var chart_area = document.getElementById('barchart');
      var chart = new google.visualization.BarChart(chart_area);

      google.visualization.events.addListener(chart, 'ready', function() {
        chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
      });
      chart.draw(data, options);

    }
  </script>
</head>

<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container-fluid">
          <h2 class="main-title text-center mt-5"> Business Sales Report </h2>
          <div class="text-center" id="export">
            <button type="submit" class="btn btn-warning" target="_blank"> <i data-feather="file-text" aria-hidden="true"></i> Export Report </button>
          </div>
          <div class="container d-flex justify-content-center" id="chartcontainer">
            <div class="chartCard ">
              <div id="piechart" style="max-width:200px; height: 200px; "></div>
              <div id="barchart" style="max-width:200px; height: 200px; "></div>
            </div>
          </div>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>