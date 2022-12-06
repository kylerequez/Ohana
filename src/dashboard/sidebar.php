<aside class="sidebar">
  <!-- PHP ADMIN/STAFF SESSION -->
  <?php
  include_once dirname(__DIR__) . '/config/app-config.php';
  if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
  ?>
    <script>
      window.location = 'http://<?php echo DOMAIN_NAME; ?>/login';
    </script>
  <?php
  } else {
    include_once dirname(__DIR__) . '/models/Account.php';
    $user = unserialize($_SESSION['user']);
    $user->getType() == "USER" ? header("Location: http://" . DOMAIN_NAME . "/home") : null;
  }
  ?>
  <div class="sidebar-start">
    <a href="/dashboard/home" class="logo-wrapper" title="Home"> <img src="/Ohana/src/dashboard/img/Ohana Kennel.png" aria-hidden="true"></a>
    <div class="sidebar-head">
      <span class="sr-only">Home</span>
      <div class="logo-text"></div>

      <button class="sidebar-toggle transparent-btn" title="MENU" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle" aria-hidden="true"></span>
      </button>
    </div>
    <div class="sidebar-body">
      <ul class="sidebar-body-menu">
        <li><a href="/dashboard/home"><span class="icon home" aria-hidden="true"></span>Dashboard Home</a></li>
        <li><a href="/dashboard/pet-profiles"><img src="/Ohana/src/dashboard/img/main/ohanapets.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Ohana Pets</span></a></li>
        <li><a href="/dashboard/customer-pets"><img src="/Ohana/src/dashboard/img/main/customer.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Customer Pets</span></a></li>
        <li><a href="/dashboard/petboarding"><img src="/Ohana/src/dashboard/img/main/boarding.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Pet Boarding Slots</span></a></li>
        <li><a href="/dashboard/appointments"><span class="icon calendar" aria-hidden="true"></span>Appointments</a></li>
        <li><a href="/dashboard/website-content"><span class="icon image" aria-hidden="true"></span>Manage Content</a></li>
        <li><a href="/dashboard/customers"><span class="icon user-3" aria-hidden="true"></span>Customer Accounts</a></li>
        <li><a href="/dashboard/staff"> <span class="icon user2" aria-hidden="true"></span>Staff Accounts</a></li>
        <li><a href="/dashboard/transactions"><span class="icon chartico" aria-hidden="true"></span>User Transactions</span></a></li>
        <li><a href="/dashboard/feedbacks"><span class="icon message" aria-hidden="true"></span>User Feedback</a></li>
        <li>
          <a class="show-cat-btn" href="##">
           <img src="/Ohana/src/dashboard/img/main/cb.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Chat Bot<span class="sr-only">Open list</span></span>
          </a>
          <ul class="cat-sub-menu">
            <li><a href="/dashboard/chatbot-settings">Settings </a></li>
            <li><a href="/dashboard/chatbot-responses">Responses</a></li>
          </ul>
        </li>
        <li><a href="/dashboard/logs"><span class="icon edit" aria-hidden="true"></span>System Logs</a></li>
      </ul>
    </div>
  </div>
  <br>
</aside>