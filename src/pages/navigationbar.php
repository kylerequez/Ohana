<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navigation Bar</title>
    <link rel="stylesheet" type="text/css" href="css/navigationbar.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <style>
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

        header {
            position: fixed;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: transparent;
            padding: 28px 12%;
            transition: all .50s ease;
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
            transition: all .50s ease;
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
            border-radius: 20px;
            border: 1px solid #ffffff;
            cursor: pointer;
            color: #ffffff;
            font-family: "Poppins";
            font-size: 14px;
            padding: 10px 20px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #ffffff;
        }

        #login-btn:hover {
            background-color: #c0b65a;
            cursor: pointer;
        }

        @media (max-width: 1280px) {
            header {
                padding: 14px 2%;
                transition: .2s;
            }

            .navbar a {
                padding: 5px 0;
                margin: 0px 20px;
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
                height: 40vh;
                background: var(--main-color);
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

<body>
    <header>

        <a href="/" class="logo">
            <img src="../images/Landing/navlogo.png" class="img-fluid" id="navlogo">
        </a>
        <ul class="navbar">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pawcart"> Paw Cart <i class="uil uil-shopping-bag"></i></a>
            </li>
            <li class="nav-item">
                <div class="action" style="margin-right:25px;">
                    <div class="profile" onclick="menuToggle();">
                        <img src="/Ohana/src/images/icons/customer.png" id="customerprofile">
                    </div>
                    <div class="menu">
                        <h3 class="text-center mt-3 font-weight-bold"><?php echo $user->getFullName(); ?></h3>
                        <ul>
                            <?php
                            if ($user->getType() != 'USER') {
                            ?>
                                <li>
                                    <img src="/Ohana/src/images/icons/dashboard.png" /><a href="/dashboard/home" target="_blank"><span class="icon home" aria-hidden="true">
                                            Admin Dashboard
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <img src="/Ohana/src/images/icons/pencil.png" /><a href="/userprofile">My profile</a>
                            </li>
                            <li>
                                <img src="/Ohana/src/images/icons/doggy.png" /><a href="/ownedpets">Pet profile</a>
                            </li>
                            <li>
                                <img src="/Ohana/src/images/icons/file.png" /><a href="/transactions">Transactions</a>
                            </li>
                            <li>
                                <img src="/Ohana/src/images/icons/calendar.png" /><a href="/appointments">Appointment</a>
                            </li>
                            <li>
                                <img src="/Ohana/src/images/icons/log-out.png" />
                                <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
            </li>
        </ul>
        <div class="main">
            <a class="btnLogin" href="/login" name="btnLogin" id="login-btn"> Login </a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <form method="POST" action="/accounts/logout">
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutTitle"> Do you want to logout? </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 55%;"></button>
                    </div>
                    <div class="modal-body">
                        All the unsaved changes will be lost. Are you sure you would like to log-out?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btnLogout" class="btn btn-danger"> Logout </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
</body>

</html>