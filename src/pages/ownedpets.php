<!DOCTYPE html>
<html lang="en">

<head>

  <title> OWNED PETS </title>

  <!-- META TAGS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">

  <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">

  <?php include_once 'stylesheets.php'; ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    @media screen and (min-width: 360px) and (max-width: 929.98px) {}
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <main>
    <!-- REGISTERED USERS NAVIGATION BAR-->
    <?php include_once 'Rnavbar.php'; ?>

    <div class="container-fluid">
      <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
      <div class="container h-90" style="margin-top:10%;">
        <h1 class="text-center" style="color:#DB6551; font-size: 80px; font-family: 'Acme', sans-serif; font-weight:800;"> Pet Profile </h1><br>
        <div class="card mx-auto" style="max-width: 68vw; max-height:80vh; border-style: solid; border-color: #c0b65a; border-width:5px">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block">
              <img src="/Ohana/src/images/sideimg.png" alt="Side photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height: 60vh; " />
            </div>

            <div class="col-md-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-3 text-uppercase"></h3>
                <form action="/pages/home.php" method="post">

                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="petname" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Birthday: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="birthday" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Color:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="color" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Trait:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="trait" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Gender: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="gender" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">PCCI: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pcci" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Vaccine : </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="vaccine" disabled>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="d-flex justify-content-end pt-2" style="margin-right:10%">
                <button type="reset" class="btn btn-md mt-3" style="background-color: #db6551; color:white">Go Back</button>
                <button type="submit" id="submitbtn" class="btn ms-2 mt-3" data-bs-toggle="modal" data-bs-target="#editModal" style="background-color: #c0b65a; color:white; margin-left:20px;">Edit</button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Pet Profile Information</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:60%;"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3 row">
                        <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="petname">
                        </div>
                      </div>
                      <div class="mb-3 row ">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Birthday: </label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="color">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Color:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="color">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Trait:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="color">
                        </div>
                      </div>
                      <div class="mb-3 row ">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Gender: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="color">
                        </div>
                      </div>
                      <div class="mb-3 row ">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">PCCI: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="color">
                        </div>
                      </div>
                      <div class="mb-3 row ">
                        <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Vaccine : </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="color">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning">Save changes</button>
                    </div>
                  </div>
                </div>
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

  <div id="ohanafooter">
    <?php include_once 'footer.php'; ?>
  </div>

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