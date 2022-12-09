<head>
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <style>
    #navlogo {
      width: 100%;
      height: 90px;
    }

    @media screen and (min-width: 360px) and (max-width: 929.98px) {
      #navbar-spy {
        height: 110px;
      }

      #navlogo.img-fluid {
        margin-top: -60%;
      }

      /* .navbar-toggler {
        margin-right:5%;
      } */
      .navbar-toggler{
        margin-right:5%;
        margin-top: -60px;
      }
      #login-btn {
        background-color: #db6551;
        border-radius: 20px;
        border: 1px solid #ffffff;
        cursor: pointer;
        color: #ffffff;
        font-family: "Poppins";
        font-size: 12px;
        padding: 10px 30px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #ffffff;
      }
    }
  </style>
</head>

<nav class="navbar navbar-expand-md fixed-top" id="navbar-spy">
  <div class="container-fluid">
    <div class="logo">
      <a href="/"> <img src="/Ohana/src/images/Landing/navlogo.png" class="img-fluid" id="navlogo"> </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
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
        <li class="nav-item">
          <a class="btnLogin" href="/login" name="btnLogin" id="login-btn"> Login </a>
        </li>
      </ul>
    </div>
  </div>
</nav>