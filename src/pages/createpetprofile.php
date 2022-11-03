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
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
  </style>

</head>

<body style="background-color:#FAF8F0;">
  <?php include_once 'Rnavbar.php'; ?>
  <div class="container-fluid">
    <center>
      <h1 style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800; margin-top:10%"> Create Pet Profile </h1><br>
      <div class="container h-90" style="margin:top 15px;">
        <div class="card mx-auto" style="max-width: 68vw; max-height:80vh; border-style: solid; border-color: #c0b65a; border-width:5px">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block">
              <img src="/Ohana/src/images/sideimg.png" alt="Side photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height: 60vh; " />
            </div>

            <div class="col-md-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-3 text-uppercase">
                </h3>
                <form action="/pages/home.php" method="post">
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="petname">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Color:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="color">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Age: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="color">
                      </div>
                    </div>
                  </div>
                    
                    <div class="row" style="margin-top:10px">
                      <div class="d-md-flex justify-content-between align-items-center mb-2 py-2">

                        <h6 class="mb-0 me-3" style="color:#7d6056">Dog Gender: </h6>

                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="Gender" id="femaleGender" value="option1" />
                          <label class="form-check-label" for="femaleGender"> Female</label>
                        </div>
                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="Gender" id="maleGender" value="option2" />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="d-md-flex justify-content-between align-items-center mb-2 py-2">

                        <h6 class="mb-0 me-3" style="color:#7d6056">PCCI Papers?</h6>

                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="pcciStatus" id="pcciStatus" value="option1" />
                          <label class="form-check-label" for="papersYes">Yes</label>
                        </div>

                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="pcciStatus" id="pcciStatus" value="option2" />
                          <label class="form-check-label" for="papersNo">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="d-md-flex justify-content-between align-items-center mb-2 py-2">

                        <h6 class="mb-0 me-3" style="color:#7d6056">Vaccinated?</h6>

                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="isVaccinated" id="isVaccinated" value="option1" />
                          <label class="form-check-label" for="papersYes">Yes</label>
                        </div>

                        <div class="form-check form-check-inline mb-0 me-6">
                          <input class="form-check-input" type="radio" name="isVaccinated" id="isVaccinated" value="option2" />
                          <label class="form-check-label" for="papersNo">No</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 ms-3 me-3">
                    <label for="formFile" class="form-label"> Choose and Upload an image of your Dog.</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                  <div class="d-flex justify-content-between pt-2 me-3">
                    <button type="reset" class="btn btn-md " style="background-color: #db6551; color:white">Reset</button>
                    <button type="submit" id="submitbtn" class="btn ms-2" style="background-color: #c0b65a; color:white">Submit Form</button>
                  </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </center>
    </main>
    <!-- END OF STUD PROFILES CONTENT-->

    <!-- FOOTER -->
    <div class="container-fluid" style="margin-top:10%">
      <?php include_once 'footer.php'; ?>
    </div>


    <!--SCRIPT FOR TOAST -->
    </script>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>