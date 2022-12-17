<head>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      text-decoration: none;
      list-style: none;
    }

    :root {
      --bg-color: #222327;
      --text-color: #7d605c;
      --main-color: #db6551;
    }

    /* custom scroll bar */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: #db6551;
    }

    /* END OF CUSTOM SCROLLBAR */
    #navigation-bar {
      position: fixed;
      width: 100%;
      top: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 12%;
      transition: all .50s ease;
      border-bottom: 2px solid #db6551;
      background-color: floralwhite;
    }

    #user-name {
      font-family: "DM Sans", sans-serif;
      font-weight: bold;
      margin-top: -1px;
      margin-left: -25px;
      font-size: 18px;
      color: #2f1f18;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo i {
      color: var(--main-color);
      font-size: 28px;
      margin-right: 3px;
    }

    .logo span {
      color: var(--text-color);
      font-size: 1.7rem;
      font-weight: 600;
    }

    #navlogo {
      height: 80px;
      width: 100%;
    }

    .navbar {
      display: flex;
    }

    .navbar a {
      color: var(--text-color);
      font-size: 1.1rem;
      font-weight: 500;
      padding: 5px 0;
      margin: 0px 30px;
      margin-top:10px;
      transition: all .50s ease;
      font-family: "DM Sans", sans-serif;
      font-weight: bold;
    }

    .navbar a:hover {
      color: var(--main-color);
    }

    .navbar a.active {
      color: var(--main-color);
    }

    .main {
      display: flex;
      align-items: center;
    }

    .main a {
      margin-right: 25px;
      margin-left: 10px;
      color: var(--text-color);
      font-size: 1.1rem;
      font-weight: 500;
      transition: all .50s ease;
    }

    .user {
      display: flex;
      align-items: center;
    }

    .user i {
      color: var(--main-color);
      font-size: 28px;
      margin-right: 7px;
    }

    .main a:hover {
      color: var(--main-color);
    }

    #menu-icon {
      font-size: 35px;
      color: var(--text-color);
      cursor: pointer;
      z-index: 10001;
      display: none;
    }

    #login-btn {
      background-color: #db6551;
      border-radius: 30px;
      border: 1px solid #ffffff;
      cursor: pointer;
      color: #ffffff;
      font-family: "Poppins";
      font-size: 18px;
      padding: 10px 30px;
      text-decoration: none;
      text-shadow: 0px 1px 0px #ffffff;
    }

    #login-btn:hover {
      background-color: #c0b65a;
      cursor: pointer;
    }

    /* ######################## USER DROPDOWN IMPROVISE = RESIZE BOX AND FONTS #########################*/
    .action {
      position: relative;
    }

    .action .profile {
      position: relative;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }

    .action .profile img {
      position: relative;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .action .menu {
      position: absolute;
      top: 120px;
      padding: 10px 20px;
      background: white;
      width: 320px;
      box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      transition: 0.2s;
      visibility: hidden;
      opacity: 0;
    }

    .action .menu.active {
      top: 80px;
      visibility: visible;
      opacity: 1;
    }

    .action .menu::before {
      content: "";
      position: relative;
      top: -5px;
      right: 28px;
      width: 20px;
      height: 20px;
      background: #fff;
      transform: rotate(45deg);
    }

    .action .menu h3 {
      width: 100%;
      font-size: 20px;
      padding: 20px 0;
      font-weight: 500;
      color: black;
      line-height: 1.5em;
      text-align: center;
    }

    .action .menu ul li {
      list-style: none;
      padding: 12px 0;
      display: flex;
      align-items: center;
    }

    .action .menu ul li img {
      max-width: 20px;
      margin-left: 20px !important;
      opacity: 0.5;
      transition: 0.5s;
    }

    .action .menu ul li:hover img {
      opacity: 1;
    }

    .action .menu ul li a {
      display: inline-block;
      text-decoration: none;
      color: #000000;
      font-size: 16px;
      transition: 0.5s;
    }

    .action .menu ul li:hover a {
      color: #db6551;
    }


    @media (max-width: 1280px) {
      #navigation-bar {
        padding: 14px 2%;
        transition: .2s;
      }

      .navbar a {
        padding: 5px 0;
        margin: 0px 20px;
      }

      .action .menu {
        right: -5px;
      }

    }

    @media (max-width: 1090px) {
      #menu-icon {
        display: block;
      }

      .navbar {
        position: absolute;
        top: 100%;
        right: -100%;
        width: 270px;
        height: 30vh;
        background: #faf8f0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        border-radius: 10px;
        transition: all .50s ease;
      }

      .navbar a {
        display: block;
        margin: 12px 0;
        padding: 0px 25px;
        transition: all .50s ease;
      }

      .navbar a:hover {
        color: var(--text-color);
        transform: translateY(5px);
      }

      .navbar a.active {
        color: var(--text-color);
      }

      .navbar.open {
        right: 2%;
        background-color: #faf8f0;
      }
    }
  </style>
</head>
<header id="navigation-bar">
  <a href="/" class="logo">
    <img src="/Ohana/src/images/Landing/navlogo.png" class="img-fluid" id="navlogo">
  </a>
  <ul class="navbar">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="/#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/#about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/#services">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/#contact">Contact</a>
    </li>
  </ul>
  <div class="main">
    <a class="btnLogin" href="/login" name="btnLogin" id="login-btn"> Login </a>
    <div class="bx bx-menu" id="menu-icon"></div>
  </div>
</header>

<script>
  let menu = document.querySelector('#menu-icon');
  let navbar = document.querySelector('.navbar');
  menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
  }
</script>
<script>
  function menuToggle() {
    const toggleMenu = document.querySelector(".menu");
    toggleMenu.classList.toggle("active");
  }
</script>