<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <title> OHANA KENNEL PH DASHBOARD </title>

  <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>

  <link rel="stylesheet" href="/Ohana/src/dashboard/css/admin.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    .main-title {
      color: #C0B65A;
      font-size: 80px;
      font-family: 'Acme', sans-serif;
    }
  </style>
</head>

<body>
  <div class="layer"></div>
  <div class="page-flex">
    <?php include_once dirname(__DIR__) . '/dashboard/sidebar.php' ?>
    <div class="main-wrapper">
      <?php include_once dirname(__DIR__) . "/dashboard/navbar.php" ?>
      <?php
      include_once dirname(__DIR__) . '/config/db-config.php';
      include_once dirname(__DIR__) . '/database/Database.php';
      include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
      include_once dirname(__DIR__) . '/services/PetProfileServices.php';
      include_once dirname(__DIR__) . '/dao/BoardingSlotDAO.php';
      include_once dirname(__DIR__) . '/services/BoardingSlotServices.php';
      include_once dirname(__DIR__) . '/dao/AccountDAO.php';
      include_once dirname(__DIR__) . '/services/AccountServices.php';
      include_once dirname(__DIR__) . '/dao/AppointmentDAO.php';
      include_once dirname(__DIR__) . '/services/AppointmentServices.php';
      include_once dirname(__DIR__) . '/dao/TransactionDAO.php';
      include_once dirname(__DIR__) . '/services/TransactionServices.php';
      include_once dirname(__DIR__) . '/dao/OrderDAO.php';

      $database = new Database($servername, $database, $username, $password);
      ?>
      <main class="main users chart-page" id="skip-target"><br>
        <div class="container-fluid">
          <div class="container">
            <h2 class="main-title text-center"> Welcome Back, <?php echo $user->getFname(); ?>! </h2>
            <div class="row stat-cards d-flex justify-content-center mt-2">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/pet-profiles">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart-2" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new PetProfileDAO($database);
                                                              $services = new PetProfileServices($dao);
                                                              echo $services->getOhanaPetsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Ohana Pet Profiles </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/customer-pets">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php
                                                              echo $services->getCustomerPetsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Customer Pet Profiles </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/petboarding">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="pie-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new BoardingSlotDAO($database);
                                                              $services = new BoardingSlotServices($dao);
                                                              echo $services->getBoardingSlotCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Pet Boarding Slots </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
            <div class="row stat-cards d-flex justify-content-center mt-3">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/customers">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart-2" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AccountDAO($database);
                                                              $services = new AccountServices($dao);
                                                              echo $services->getUsersCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Registered Users </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/appointments">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AppointmentDAO($database);
                                                              $services = new AppointmentServices($dao);
                                                              echo $services->getAppointmentsCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Staff Accounts </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/transactions">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="pie-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new TransactionDAO($database);
                                                              $order = new OrderDAO($database);
                                                              $services = new TransactionServices($dao, $order);
                                                              echo $services->getTransactionsCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Pending Appointments </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
            <div class="row stat-cards d-flex justify-content-center mt-3">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/customers">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart-2" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AccountDAO($database);
                                                              $services = new AccountServices($dao);
                                                              echo $services->getUsersCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Completed Appointments</p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/appointments">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="bar-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AppointmentDAO($database);
                                                              $services = new AppointmentServices($dao);
                                                              echo $services->getAppointmentsCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Customer Transactions </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/transactions">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                      <i data-feather="pie-chart" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new TransactionDAO($database);
                                                              $order = new OrderDAO($database);
                                                              $services = new TransactionServices($dao, $order);
                                                              echo $services->getTransactionsCount(); ?></p>
                      <p class="stat-cards-info__title"  style="color:#db6551"> Customer Feedbacks </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
          </div><!-- END OF CONTAINER -->
        </div><!-- END OF CONTAINER FLUID -->
      </main>
      <?php include_once dirname(__DIR__) . '/dashboard/footer.php'; ?>
    </div>
  </div>

  <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>