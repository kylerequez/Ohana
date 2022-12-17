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

    .form-control {
      border-color: #db6551;
      border-style: solid;
      border-width: 2px;
      background-color: white;
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
          <h2 class="main-title text-center mt-3">User Feedbacks</h2>
        </div>
        <div class="users-table table-wrapper">
          <?php
          include_once dirname(__DIR__) . '/../config/db-config.php';
          include_once dirname(__DIR__) . '/../dao/FeedbackDAO.php';
          include_once dirname(__DIR__) . '/../services/FeedbackServices.php';

          $dao = new FeedbackDAO($servername, $database, $username, $password);
          $services = new FeedbackServices($dao);
          $feedbacks = $services->getAllFeedbacks();
          if (!empty($feedbacks)) {
          ?>
            <table id="feedbacks">
              <thead>
                <tr class="users-table-info">
                  <th>RATING</th>
                  <th>NAME OF USER</th>
                  <th>DATE</th>
                  <th>ACTION</th>
                </tr>
                <tr>
                  <th>
                    <select data-column="0" class="form-control filter-select">
                      <option value="">Select a rating...</option>
                      <option value="Very Satisfactory">Very Satisfactory</option>
                      <option value="Satisfactory">Satisfactory</option>
                      <option value="Neutral">Neutral</option>
                      <option value="Dissatisfied">Dissatisfied</option>
                      <option value="Very Dissastified">Very Dissastified</option>
                    </select>
                  </th>
                  <th>
                    <input type="text" class="form-control filter-input" placeholder="Enter Full Name..." data-column="1">
                  </th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($feedbacks as $feedback) { ?>
                  <tr>
                    <td><?php echo $feedback->formatRating(); ?></td>
                    <td><?php echo $feedback->getAccount()->getFullName(); ?></td>
                    <td><?php echo $feedback->getDate()->format('M-d-Y h:i:s A'); ?></td>
                    <td>
                      <button class="view-btn transparent-btn fs-4" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $feedback->getId(); ?>" type="view" style="color:#7d605c; margin-right: 15px;"> <i class="uil uil-eye"></i> </button>
                      <div class="modal fade" id="viewModal<?php echo $feedback->getId(); ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="viewLabel" style="font-family:'Acme', sans-serif;"> Customer Feedback</h1>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="date" class="col-form-label">Date:</label>
                                <input type="text" class="form-control" id="date" value="<?php echo $feedback->getDate()->format('M-d-Y h:i:s A'); ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="rating" class="col-form-label">Rating:</label>
                                <input type="text" class="form-control" id="rating" value="<?php echo $feedback->formatRating(); ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Customer Name:</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?php echo $feedback->getAccount()->getFullName(); ?>" disabled>
                              </div>
                              <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text" disabled><?php echo $feedback->getMessage(); ?></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:#db6551;color:white;">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } else { ?>
            <div class="alert text-light text-center ms-5 me-5" role="alert" style="margin-top:10%;background-color:#db6551;">
              No existing Feedbacks from the users
            </div>
          <?php } ?>
        </div>
      </main>
      <?php include_once dirname(__DIR__) . '/footer.php'; ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      var table = $('#feedbacks').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        searching: true,
        responsive: true,
        initComplete: function() {
          var api = this.api();
          api
            .columns()
            .eq(0)
            .each(function(colIdx) {
              var cell = $('.filters th').eq(
                $(api.column(colIdx).header()).index()
              );
              var title = $(cell).text();
              $(cell).html('<input type="text" placeholder="' + title + '" />');
              $(
                  'input',
                  $('.filters th').eq($(api.column(colIdx).header()).index())
                )
                .off('keyup change')
                .on('change', function(e) {
                  $(this).attr('title', $(this).val());
                  var regexr = '({search})';
                  var cursorPosition = this.selectionStart;
                  api
                    .column(colIdx)
                    .search(
                      this.value != '' ?
                      regexr.replace('{search}', '(((' + this.value + ')))') :
                      '',
                      this.value != '',
                      this.value == ''
                    )
                    .draw();
                })
                .on('keyup', function(e) {
                  e.stopPropagation();
                  $(this).trigger('change');
                  $(this)
                    .focus()[0]
                    .setSelectionRange(cursorPosition, cursorPosition);
                });
            });
        },
      });

      $('.filter-input').keyup(function() {
        table.column($(this).data('column'))
          .search($(this).val())
          .draw();
      });

      $('.filter-select').change(function() {
        table.column($(this).data('column'))
          .search($(this).val())
          .draw();
      });
    });
  </script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>