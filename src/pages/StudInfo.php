<!doctype html>
<html lang="en">

<head>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <title> STUD INFORMATION </title>

  <!-- Web Icon -->
  <link rel="shortcut icon" href="/Ohana/src/images/Landing/ohana.png" type="image/x-icon">

  <!-- AJAX LIBRARY IMPORTS/ FONT AWSOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- MORE icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/Ohana/src/css/Dogs.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
  </style>
</head>

<body style="background-color: #FAF8F0; color:#2f1f18">

  <!-- REGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'Rnavbar.php'; ?>

  <main>
    <div class="header" style="margin-top:8%; margin-bottom:10px">
      <center>
      <h1 style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800"> FRENCH BULLDOGS FOR STUD </h1>
      </center>
    </div><br>
    <!-- START OF PROFILES CONTENT-->
    <center>
      <div class="card mx-auto img-fluid" style="max-width: 60vw; max-height:60vh; background-color:#2f1f18">
        <img class="card-img-top" src="/Ohana/src/images/Ohanapups/cardbg.png" alt="Card image" style="width:100%; height:70vh">
        <div class="card-img-overlay">
          <div class="card-header">
            <p style="font-size: 40px; text-align:center">&#10084;<b> FRENCH BULLDOG NAME </b>&#10084;</p>
          </div>
          <div class="row justify-content">
            <hr style="color:white">
            <div class="col-md-5 mx-auto">
              <img src="/Ohana/src/images/petprofile/studog.png" class="card-img">
            </div>
            <div class="col-md-5">
              <div class="card-body"><br>
                <p class="card-text"> <b>BIRTHDAY:</b> June 13, 2018 </p>
                <p class="card-text"> <b>COLOR:</b> Brown Tan </p>
                <p class="card-text"> <b>GENDER:</b> Male </p>
                <p class="card-text"> <b>WEIGHT:</b> 12 kg </p>
                <p class="card-text"> <b>GENES:</b> Lilac Tan Carrier & Isabella Carrier </p>
                <p class="card-text"> <b>PCCI PAPERS:</b> COMPLETE</p>
                <p class="card-text"> <b>Note: Our Adult Frenchies are fully vaccinated. </b></p>
              </div>
            </div>

            <div class="row justify-content"> <!-- BUTTON ROW -->
              <div class="col-md-5">
                <div class="backbtn">
                  <span class="backbtn">
                    <a href="/stud"><span class="back">Back</span></a>
                </div>
              </div>

              <div class="col-md-7">
                <form>
                  <div class="cart__button" style="float:right;background-color:#DB6551">
                    <span class="cart__button">
                      <span class="add__to-cart" style="font-weight:bold"> Perfect Pair </span>
                      <span class="added">Added</span>
                      <i class="fas fa-shopping-cart"></i>
                      <i class="fas fa-box"></i>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </center>


  </main>
  <!-- END OF STUD PROFILES CONTENT-->

  <!-- FOOTER -->
  <div class="container-fluid">
    <?php include_once 'footer.php'; ?>
  </div>

  <!-- JAVASCRIPT -->
  <script>
    function menuToggle() {
      const toggleMenu = document.querySelector(".menu");
      toggleMenu.classList.toggle("active");
    }
  </script>

  <script src="https://kit.fontawesome.com/3431c04d0c.js" crossorigin="anonymous"></script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>