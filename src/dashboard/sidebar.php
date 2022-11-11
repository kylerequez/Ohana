<aside class="sidebar">
  <?php
  if (empty($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("Location: http://localhost/login");
    exit();
  } else {
    include_once dirname(__DIR__) . '/models/Account.php';
    $user = unserialize($_SESSION['user']);
    $user->getType() == "USER" ? header("Location: http://localhost/home") : null;
  }
  ?>
  <div class="sidebar-start">
    <a href="/dashboard" class="logo-wrapper" title="Home"> <img src="/Ohana/src/dashboard/img/Ohana Kennel.png" aria-hidden="true"></a>

    <div class="sidebar-head">
      <span class="sr-only">Home</span>
      <div class="logo-text">
        <span class="logo-title"> DASHBOARD </span>
      </div>

      <!-- COLLAPSE SIDEBAR-->
      <button class="sidebar-toggle transparent-btn" title="MENU" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle" aria-hidden="true"></span>
      </button>
    </div>

    <div class="sidebar-body">
      <ul class="sidebar-body-menu">
        <li>
          <a class="" name="adminhome" href="/dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard Home</a>
        </li>

        <li>
          <a href="/dashboard/petprofiles/get">
            <span class="icon document" aria-hidden="true"></span> Inventory - Pet Profiles </span>
          </a>
        </li>

        <li>
          <a href="/dashboard/petboarding/get">
            <span class="icon paperplus" aria-hidden="true"></span> Pet Boarding Slots </span>
          </a>
        </li>

        <!-- <li><a href="/dashboard/appointments">
            <span class="icon notification" aria-hidden="true"></span> List of Appointments</a></li> -->

        <li><a href="/dashboard/appointments/get">
            <span class="icon calendar" aria-hidden="true"></span> Appointments </a> </li>


        <!-- <li><a href="/dashboard/website-settings">
            <span class="icon setting" aria-hidden="true"></span>Website Settings </a>
        </li> -->

        <li><a href="/dashboard/website-content">
            <span class="icon image" aria-hidden="true"></span> Website Content </a>
        </li>

        <li>
          <a href="/dashboard/customers/get"><span class="icon user-3" aria-hidden="true"></span> Customer Accounts </a>
        </li>
        <li>
          <a href="/dashboard/staff/get"> <span class="icon user2" aria-hidden="true"></span>Staff Accounts </a>
        </li>

        <li>
          <a href="/dashboard/transactions">
            <span class="icon chartico" aria-hidden="true"></span> User Transactions
            </span>
          </a>
        </li>

        <li>
          <a href="/dashboard/feedbacks">
            <span class="icon message" aria-hidden="true"></span>
            User Feedback
          </a>
        </li>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon category" aria-hidden="true"></span> Chat Bot
            <span class="sr-only">Open list</span></span>
          </a>
          <ul class="cat-sub-menu">
            <li>
              <a href="/dashboard/chatbot-settings/get"> Settings </a>
            </li>
            <li>
              <a href="/dashboard/chatbot-responses/get"> Queries and Responses </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="/dashboard/logs/get"><span class="icon edit" aria-hidden="true"></span> System
            Logs</a>
        </li>
      </ul>
    </div>
  </div>
  <br>
</aside>