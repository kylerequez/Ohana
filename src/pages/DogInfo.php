<!doctype html>
<html lang="en">

<head>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->

  <title> OHANA DOGS </title>

  <!-- Web Icon -->
  <link rel="shortcut icon" href="../images/Landing/ohana.png" type="image/x-icon">

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
  <link rel="stylesheet" href="../css/Dogs.css">

</head>

<body style="background-color: #FAF8F0;">

  <!-- REGISTERED USERS NAVIGATION BAR-->
  <?php include_once 'Rnavbar.php'; ?>

  <main>
    <div class="container-fluid">
      <div class="header" style="margin-top:10%">
        <h1> -------------------- DOG NAME -------------------- </h1>
      </div>
      <!-- START OF STUD PROFILES CONTENT-->
      <div class="container">
        <div class="card border-dark mb-3" style="max-width: 1000px; margin-top:5%;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../images/petprofile/dog1.jpg" class="img-fluid rounded-start" alt="dogpic" style="margin-top:15%">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title" style="text-align:center;"> DOG INFORMATION </h3><br>
                <p class="card-text"> BIRTHDAY </p>
                <p class="card-text"> COLOR </p>
                <p class="card-text"> BREED </p>
                <p class="card-text"> GENDER </p>
                <p class="card-text"> WEIGHT </p>
                <p class="card-text"> QUANTITY: 1 </p>
                <br>
                <form>
                  <div class="cart__button" style="float:right; margin-bottom:15px;">
                    <span class="cart__button">
                      <span class="add__to-cart" style="text-align:center;">Add to cart</span>
                      <span class="added">Added</span>
                      <i class="fas fa-shopping-cart"></i>
                      <i class="fas fa-box"></i>
                    </span>
                  </div>
                </form>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>

  </main>
  <!-- END OF STUD PROFILES CONTENT-->

  <!-- FOOTER -->
  <div class="container-fluid">
    <?php include_once '../pages/pagesfooter.php'; ?>
  </div>

  <!-- SCRIPTS-->
  <script>
    const cartButton = document.querySelectorAll(".cart__button");
    cartButton.forEach((button) => {
      button.addEventListener("click", cartClick);
    });

    function cartClick() {
      let button = this;
      button.classList.add("clicked");
    }
  </script>
  <!-- JAVASCRIPT -->
  <script>
    function menuToggle() {
      const toggleMenu = document.querySelector(".menu");
      toggleMenu.classList.toggle("active");
    }
  </script>
  <script src="https://kit.fontawesome.com/3431c04d0c.js" crossorigin="anonymous"></script>
  <!-- Chart library -->
  <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

  <!-- Icons library -->
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

  <!-- Custom scripts -->
  <script src="/Ohana/src/dashboard/js/script.js"></script>
  
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>