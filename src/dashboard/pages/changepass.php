<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tags-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">

    <!-- end of meta tags-->
    <title> CHANGE PASSWORD </title>

    <!-- WEB ICON-->
    <link rel="shortcut icon" href="/Ohana/src/dashboard/img/ohana.png" type="image/x-icon">

    <!-- ICONS IMPORT  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Custom styles -->
    <link rel="stylesheet" href="/Ohana/src/dashboard/css/adminpages.css">

    <style>
        #box {
            width: 700px;
            margin: 10% auto;
            text-align: center;
            background: rgba(255, 255, 255, 0.6);
            padding: 20px 50px;
            box-sizing: border-box;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
            border-radius: 2%
        }

        h1 {
            margin-bottom: .75em;
            font-size: 50px;
            color: #db6551;
            font-weight: bold;
        }

        h1 span,
        small {
            display: block;
            font-size: 14px;
            color: #989598;
        }

        small {
            font-style: italic;
            font-size: 11px;
        }

        form p {
            position: relative;
        }

        .password {
            width: 90%;
            padding: 15px 12px;
            margin-bottom: 5px;
            border: 1px solid #e5e5e5;
            border-bottom: 2px solid #ddd;
            background: rgba(255, 255, 255, 0.2) !important;
            color: #555;
        }

        .password+.unmask {
            position: absolute;
            right: 5%;
            top: 10px;
            width: 25px;
            height: 25px;
            background: transparent;
            border-radius: 50%;
            cursor: pointer;
            border: none;
            font-family: 'fontawesome';
            font-size: 14px;
            line-height: 24px;
            -webkit-appearance: none;
            outline: none
        }

        .password+.unmask:before {
            content: "\f06e";
            position: absolute;
            top: 0;
            left: 0;
            width: 25px;
            height: 25px;
            background: rgba(205, 205, 205, 0.2);
            z-index: 1;
            color: #aaa;
            border: 2px solid;
            border-radius: 50%;
        }

        .password[type="text"]+.unmask:before {
            content: "\f070";
            background: rgba(105, 205, 255, 0.2);
            color: #06a
        }

        #valid {
            font-size: 12px;
            color: #daa;
            height: 15px
        }

        #strong {
            height: 20px;
            font-size: 12px;
            color: #daa;
            text-transform: capitalize;
            background: rgba(205, 205, 205, 0.1);
            border-radius: 5px;
            overflow: hidden
        }

        #strong span {
            display: block;
            box-shadow: 0 0 0 #fff inset;
            height: 100%;
            transition: all 0.8s
        }

        #strong .weak {
            box-shadow: 5em 0 0 #daa inset;
        }

        #strong .medium {
            color: #da6;
            box-shadow: 10em 0 0 #da6 inset
        }

        #strong .strong {
            color: #595;
            box-shadow: 50em 0 0 #ada inset
        }

        .lists {
            padding: 0%;
        }
    </style>

</head>

<body>
    <?php
    if (!isset($_SESSION)) session_start();
    include_once dirname(__DIR__) . '/../models/Account.php';

    if (empty($_SESSION['user'])) {
        session_unset();
        session_destroy();
        header("Location: http://localhost/login");
        exit();
    } else {
        $user = unserialize($_SESSION['user']);
    ?>
        <div class="layer"> </div>

        <!-- Body -->

        <div class="page-flex">
            <!-- Dashboard Sidebar -->
            <?php include_once dirname(__DIR__) . '/sidebar.php'; ?>

            <div class="main-wrapper">
                <!-- END OF ADMIN DASHBOARD SIDE-->

                <!-- ! Main nav -->
                <?php include_once dirname(__DIR__) . "/navbar.php" ?>

                <!-- CALENDAR Main content -->
                <main class="main users chart-page" id="skip-target">
                    <div class="container">
                        <br>

                        <div id="box">
                            <form id="myform-search" method="post" autocomplete="off">
                                <h1>Change Password</h1>
                                <form>
                                    <p>
                                        <input type="password" value="" placeholder="Enter Password" id="p" class="password">
                                        <button class="unmask" type="button"></button>
                                    </p>
                                    <p>
                                        <input type="password" value="" placeholder="Confirm Password" id="p-c" class="password">
                                        <button class="unmask" type="button"></button>
                                    <div id="strong"><span></span></div>
                                    <div id="valid"></div>
                                    <br>
                                    <p>Must be 6+ characters long and contain at least 1 upper case letter, 1 number, 1 special character</p>
                                    </p>
                                    <span>
                                        <div class="mb-5 text-center"><a href="/dashboard/adminprofile">
                                                <button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:left">Back to profile</button></a></div>
                                        <div class="mb-5 text-center"><button class="btn profile-button" type="button" style="background-color:#db6551; color:white; float:right">Save Changes</button></div>
                                    </span>
                                    <br><br>

                                </form>
                        </div>

                    </div>

                    <!-- CHANGE PASSWORD CONTENT -->

                </main>

                <!-- FOOTER -->
                <?php include_once dirname(__DIR__) . '/footer.php'; ?>

            </div>
        </div>

        <!-- SCRIPTS -->

        <script>
            $('.unmask').on('click', function() {
                if ($(this).prev('input').attr('type') == 'password')
                    $(this).prev('input').prop('type', 'text');
                else
                    $(this).prev('input').prop('type', 'password');
                return false;
            });
            //Begin supreme heuristics 
            $('.password').on('keyup', function() {
                var p_c = $('#p-c');
                var p = $('#p');
                console.log(p.val() + p_c.val());
                if (p.val().length > 0) {
                    if (p.val() != p_c.val()) {
                        $('#valid').php("Passwords Don't Match");
                    } else {
                        $('#valid').php('');
                    }
                    var s = 'weak'
                    if (p.val().length > 5 && p.val().match(/\d+/g))
                        s = 'medium';
                    if (p.val().length > 6 && p.val().match(/[^\w\s]/gi))
                        s = 'strong';
                    $('#strong span').addClass(s).php(s);
                }
            });
        </script>

        <!-- Chart library -->
        <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

        <!-- Icons library -->
        <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

        <!-- Custom scripts -->
        <script src="/Ohana/src/dashboard/js/script.js"></script>

        <!-- JavaScript BOOTSTRAP Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>

        <!--SCRIPT FOR BOOTSTRAP MODAL-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <?php
    }
    ?>
</body>

</html>