<!DOCTYPE html>
<html lang="en">

<head>
  <title> CREATE YOUR PET PROFILE </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    #header {
      color: #DB6551;
      font-size: 80px;
      font-family: 'Acme', sans-serif;
      margin-top: 12%;
    }

    .card {
      max-width: 68vw;
      max-height: 80vh;
      border-style: solid;
      border-color: #c0b65a;
      border-width: 3px;
    }

    #pet-image {
      border-top-left-radius: .25rem;
      border-bottom-left-radius: .25rem;
      height: 60vh;
    }

    #ohanafooter {
      margin-top: 5%;
    }

    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    @media screen and (min-width: 360px) {}

    @media screen and (min-width: 1100px) and (max-width: 1366px) {}
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <main>
    <?php include_once 'navigationbar.php'; ?>
    <div class="container-fluid">
      <div class="container h-90" id="create-profile">
        <h1 class="mb-5 text-center" id="header"> Create Pet Profile </h1><br>
        <div class="card mx-auto">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block">
              <img src="/Ohana/src/images/sideimg.png" alt="Side photo" class="img-fluid p-5" id="pet-image" />
            </div>
            <div class="col-md-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-3 text-uppercase">
                </h3>
                <form action="/ownedpets/new" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="type" value="STUD">
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row ">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Birthday: </label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056">Color:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="color" name="color" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="inputTrait" class="col-sm-2 col-form-label" style="color:#7d6056">Trait:</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="trait" required>
                          <option class="text-center" style="color:#DB6551" disabled>Standard</option>
                          <option value="Fawn">Fawn</option>
                          <option value="Sable">Sable</option>
                          <option value="Brindle">Brindle</option>
                          <option class="text-center" style="color:#DB6551" disabled>Exotic</option>
                          <option value="Blue">Blue</option>
                          <option value="Chocolate">Chocolate</option>
                          <option value="Lilac">Lilac</option>
                          <option value="Isabella">Isabella</option>
                          <option value="Newshade Isabella">Newshade Isabella</option>
                          <option value="Newshade">Newshade</option>
                          <option value="Black Tan">Black Tan</option>
                          <option value="Blue Tan">Blue Tan</option>
                          <option value="Choco Tan">Choco Tan</option>
                          <option value="Isabella Tan">Isabella Tan</option>
                          <option value="Newshade Isabella Tan">Newshade Isabella Tan</option>
                          <option class="text-center" style="color:#DB6551" disabled>Platinum</option>
                          <option value="Lilac Plat">Lilac Plat</option>
                          <option value="Champaigne Plat">Champaigne Plat</option>
                          <option value="Newshade Plat">Newshade Plat</option>
                          <option value="Merle">Merle</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="selectGender" class="col-sm-2 col-form-label" style="color:#7d6056">Gender:</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="sex" aria-label="Default select example">
                          <option value="MALE">Male</option>
                          <option value="FEMALE">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 row">
                      <label for="selectGender" class="col-sm-2 col-form-label" style="color:#7d6056">PCCI</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="pcciStatus" aria-label="Default select example">
                          <option value="REGISTERED">Registered</option>
                          <option value="PENDING">Pending</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-3 row">
                      <label for="selectGender" class="col-sm-2 col-form-label" style="color:#7d6056">Vaccine</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="isVaccinated" aria-label="Default select example">
                          <option value="YES">Vaccinated</option>
                          <option value="NO">Not Vaccinated</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 mt-2 row text-center">
                    <label for="formFile" class="form-label"> Choose and Upload an image of your Dog.</label>
                    <input class="form-control" type="file" id="formFile" name="image" required>
                  </div>

                  <div class="d-flex justify-content-end pt-2" style="margin-right:10%;">
                    <button type="reset" class="btn btn-outline-dark">Reset</button>
                    <button type="submit" id="submitbtn" class="btn ms-2" style="background-color: #c0b65a; color:white; margin-left:20px;">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div id="ohanafooter">
    <?php include_once 'footer.php'; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>