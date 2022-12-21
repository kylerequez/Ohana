<aside class="sidebar">
  <!-- PHP ADMIN/STAFF SESSION -->
  <?php
  include_once dirname(__DIR__) . '/config/app-config.php';
  if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
  ?>
    <script>
      window.location = 'https://<?php echo DOMAIN_NAME; ?>/login';
    </script>
    <?php
    exit();
  } else {
    include_once dirname(__DIR__) . '/models/Account.php';
    $user = unserialize($_SESSION['user']);
    if (!$user->getType() == 'USER') {
    ?>
      <script>
        window.location = 'https://<?php echo DOMAIN_NAME; ?>/home';
      </script>
  <?php
      exit();
    }
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
        <li><a href="/dashboard/home" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/home') echo 'active'; ?>"><span class="icon home" aria-hidden="true"></span>Dashboard Home</a></li>
        <li><a href="/dashboard/pet-profiles" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/pet-profiles') echo 'active'; ?>"><img src="/Ohana/src/dashboard/img/main/ohanapets.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Ohana Pets</span></a></li>
        <li><a href="/dashboard/customer-pets" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/customer-pets') echo 'active'; ?>"><img src="/Ohana/src/dashboard/img/main/customer.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Customer Pets</span></a></li>
        <li><a href="/dashboard/petboarding" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/petboarding') echo 'active'; ?>"><img src="/Ohana/src/dashboard/img/main/boarding.png" style="display:inline-flex;width:24px;height:24px;">&nbsp;&nbsp;Pet Boarding Slots</span></a></li>
        <li><a href="/dashboard/appointments" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/appointments') echo 'active'; ?>"><span class="icon calendar" aria-hidden="true"></span>Appointments</a></li>
        <li><a href="/dashboard/customers" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/customers') echo 'active'; ?>"><span class="icon user-3" aria-hidden="true"></span>Customer Accounts</a></li>
        <li><a href="/dashboard/staff" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/staff') echo 'active'; ?>"> <span class="icon user2" aria-hidden="true"></span>Staff Accounts</a></li>
        <li><a href="/dashboard/transactions" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/transactions') echo 'active'; ?>"><span class="icon chartico" aria-hidden="true"></span>User Transactions</span></a></li>
        <li><a href="/dashboard/feedbacks" class="<?php if ($_SERVER['REQUEST_URI'] == '/dashboard/feedbacks') echo 'active'; ?>"><span class="icon message" aria-hidden="true"></span>User Feedback</a></li>
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