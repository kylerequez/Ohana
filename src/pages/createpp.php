<!DOCTYPE html>
<html lang="en">

<head>

  <title> CREATE YOUR PET PROFILE </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <!-- END OF META TAGS -->
  <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <link rel="stylesheet" href="/Ohana/src/css/footer.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    @media screen and (min-width: 375px) and (max-width: 767.98px) { }
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <main>
    <!-- REGISTERED USERS NAVIGATION BAR-->
    <?php include_once 'Rnavbar.php'; ?>

    <div class="container-fluid">
      <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
      <div class="container h-90" style="margin-top:10%;">
        <h1 style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800;text-align:center;"> Create Pet Profile </h1><br>
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
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Birthday: </label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="birthday">
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
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Trait:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="trait">
                      </div>
                    </div>
                  </div>

                  <div class="row " style="margin-top:10px">
                    <div class="d-flex justify-content-start mb-2 ">

                      <h6 class="mb-0" style="color:#7d6056">Dog Gender: </h6>

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
                    <div class="d-flex justify-content-start mb-2">

                      <h6 class="mb-0" style="color:#7d6056">PCCI Papers?</h6>

                      <div class="form-check form-check-inline mb-0 me-6">
                        <input class="form-check-input" type="radio" name="pcciStatus" id="pcciStatus" value="option1" />
                        <label class="form-check-label" for="registered">Registered</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-6">
                        <input class="form-check-input" type="radio" name="pcciStatus" id="pcciStatus" value="option2" />
                        <label class="form-check-label" for="pending">Pending</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="d-flex justify-content-start mb-2">

                      <h6 class="mb-0" style="color:#7d6056">Vaccinated?</h6>

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
              <div class="d-flex justify-content-end pt-2" style="margin-right:10%;">
                <button type="reset" class="btn btn-md " style="background-color: #db6551; color:white">Reset</button>
                <button type="submit" id="submitbtn" class="btn ms-2" style="background-color: #c0b65a; color:white; margin-left:20px;">Create</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </section>
    </div>
    </div>
  </main>

  <div class="container-fluid">
    <?php include_once 'footer.php'; ?>
  </div>

  <!-- SCIPTS -->

  <!-- Chart library -->
  <script src="/Ohana/src/dashboard/plugins/chart.min.js"></script>

  <!-- Icons library -->
  <script src="/Ohana/src/dashboard/plugins/feather.min.js"></script>

  <!-- Custom scripts -->
  <script src="/Ohana/src/dashboard/js/script.js"></script>

  <!-- JAVASCRIPT IMPORTS -->
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</body>

</html>