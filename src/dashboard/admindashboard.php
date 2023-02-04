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
    @media (max-width: 766px) {
      .main-title {
        font-size: 55px;
      }
    }
    @media (max-width: 480.98px) {
      .main-title {
        font-size: 32px;
      }
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
      include_once dirname(__DIR__) . '/dao/StudHistoryDAO.php';
      include_once dirname(__DIR__) . '/dao/FeedbackDAO.php';
      include_once dirname(__DIR__) . '/services/FeedbackServices.php';

      ?>
      <main class="main users chart-page" id="skip-target"><br>
        <div class="container-fluid">
          <div class="container">
            <h2 class="main-title text-center mb-5"> Welcome Back, <?php echo $user->getFname(); ?>! </h2>
            <div class="row stat-cards d-flex justify-content-center mt-2">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/pet-profiles">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/1.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new PetProfileDAO($servername, $database, $username, $password);
                                                              $services = new PetProfileServices($dao, null);
                                                              echo $services->getOhanaPetsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Ohana Pet Profiles </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/customer-pets">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/2.png">
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
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/3.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new BoardingSlotDAO($servername, $database, $username, $password);
                                                              $services = new BoardingSlotServices($dao);
                                                              echo $services->getBoardingSlotCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Pet Boarding Slots </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
            <div class="row stat-cards d-flex justify-content-center mt-3">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/customers">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/4.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AccountDAO($servername, $database, $username, $password);
                                                              $services = new AccountServices($dao);
                                                              echo $services->getUsersCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Registered Users </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/staff">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/5.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php echo $services->getStaffCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Staff Accounts </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/transactions">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/8.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new TransactionDAO($servername, $database, $username, $password);
                                                              $order = new OrderDAO($servername, $database, $username, $password);
                                                              $petprofile = new PetProfileDAO($servername, $database, $username, $password);
                                                              $history = new StudHistoryDAO($servername, $database, $username, $password);
                                                              $slot = new BoardingSlotDAO($servername, $database, $username, $password);
                                                              $services = new TransactionServices($dao, $order, $petprofile, $history, $slot);
                                                              echo $services->getTransactionsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Customer Transactions </p>
                      <p class="stat-cards-info__progress">
                      </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
            <div class="row stat-cards d-flex justify-content-center mt-3">
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/appointments">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/7.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new AppointmentDAO($servername, $database, $username, $password);
                                                              $services = new AppointmentServices($dao, null);
                                                              echo $services->getCompletedAppointmentsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Completed Appointments</p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/appointments">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/6.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php echo $services->getCompletedAppointmentsCount(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Pending Appointments </p>
                    </div>
                  </article>
                </a>
              </div>
              <div class="col-md-6 col-xl-3">
                <a href="/dashboard/feedbacks">
                  <article class="stat-cards-item">
                    <div class="stat-cards-icon">
                      <img src="/Ohana/src/dashboard/img/main/9.png">
                    </div>
                    <div class="stat-cards-info">
                      <p class="stat-cards-info__num"> Total: <?php $dao = new FeedbackDAO($servername, $database, $username, $password);
                                                              $services = new FeedbackServices($dao, null);
                                                              echo $services->getTotalFeedback(); ?></p>
                      <p class="stat-cards-info__title" style="color:#db6551"> Customer Feedbacks </p>
                    </div>
                  </article>
                </a>
              </div>
            </div>
          </div>
        </div>
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