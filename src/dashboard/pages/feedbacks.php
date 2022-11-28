<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> DASHBOARD - USER FEEDBACK </title>
  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">
</head>
<body>
  <div class="layer"> </div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/navbar.php" ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title text-center mt-3">USER FEEDBACKS</h2>
        </div>
        <div class="users-table table-wrapper">
          <div class="search-wrapper">
            <i data-feather="search" aria-hidden="true"></i>
            <input type="text" placeholder=" Search..">
          </div>
          <table class="posts-table">
            <thead>
              <tr class="users-table-info">
                <th>FEEDBACK I.D </th>
                <th>NAME OF USER</th>
                <th>DATE</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  I.D NUMBER 12345
                </td>
                <td>
                  <div class="pages-table-img">
                    Jenny Wilson
                  </div>
                </td>
                <td>17.04.2021</td>
                <td>
                  <button class="view-btn transparent-btn" data-bs-toggle="modal" data-bs-target="#viewModal" type="view" style="color:#7d605c; margin-right: 15px; font-size: 25px;"> <i class="uil uil-eye"></i> </button>
                </td>
              </tr>
              <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="viewLabel" style="font-family:'Acme', sans-serif;"> Customer Feedback</h1>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <p>Date:</p>
                        </div>
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Customer Name:</label>
                          <input type="text" class="form-control" id="recipient-name" style="background-color:#eed1c2" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Message:</label>
                          <textarea class="form-control" id="message-text" style="background-color:#eed1c2" disabled></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:#db6551;color:white;">Close</button>
                    </div>
                  </div>
                </div>
            </tbody>
          </table>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>