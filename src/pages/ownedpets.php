<!DOCTYPE html>
<html lang="en">

<head>
  <title> OWNED PETS </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
  <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
  <meta name="keywords" content="Kennel Business, French Bulldogs">
  <link rel="stylesheet" href="/Ohana/src/css/puppies.css">
  <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  <?php include_once 'stylesheets.php'; ?>
  <style>
    #header {
      margin-top: 15%;
      font-size: 80px;
    }

    #editcard {
      max-width: 65 vw;
      max-height: 80vh;
      border-style: solid;
      border-color: #c0b65a;
      border-width: 5px;
    }

    #picture {
      height: 60vh;
      width: 60vh;
    }

    #ohanafooter {
      margin-top: 10%;
    }

    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    @media screen and (min-width: 360px) and (max-width: 929.98px) {}
  </style>
</head>

<body style="background-color: #FAF8F0;">
  <?php
  include_once dirname(__DIR__) . '/models/PetProfile.php';
  include_once dirname(__DIR__) . '/config/db-config.php';
  include_once dirname(__DIR__) . '/config/app-config.php';
  include_once dirname(__DIR__) . '/database/Database.php';
  include_once dirname(__DIR__) . '/dao/PetProfileDAO.php';
  include_once dirname(__DIR__) . '/services/PetProfileServices.php';

  $database = new Database($servername, $database, $username, $password);
  $dao = new PetProfileDAO($database);
  $services = new PetProfileServices($dao);

  $profile = $services->getOwnedPet($id, $name);
  if (is_null($profile)) {
  ?>
    <script>
      window.location = 'http://<?php echo DOMAIN_NAME; ?>/ownedpets';
    </script>
  <?php
  } else if ($profile->getId() != $id) {
  ?>
    <script>
      window.location = 'http://<?php echo DOMAIN_NAME; ?>/ownedpets';
    </script>
  <?php
  } else if ($profile->getName() !=  $name) {
  ?>
    <script>
      window.location = 'http://<?php echo DOMAIN_NAME; ?>/ownedpets';
    </script>
  <?php
  } else if ($profile->getStatus() != 'AVAILABLE') {
  ?>
    <script>
      window.location = 'http://<?php echo DOMAIN_NAME; ?>/ownedpets';
    </script>
  <?php
  }
  ?>
  <main>
    <?php include_once 'Rnavbar.php'; ?>
    <div class="container-fluid">
      <div class="container h-90">
        <h1 class="text-center mb-5" id="header" style="color:#DB6551; font-family: 'Acme', sans-serif; "> Pet Profile </h1><br>
        <div class="card mx-auto" id="editcard">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($profile->getImage()); ?>" class="img-fluid p-5" id="picture" />
            </div>
            <div class="col-md-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-3 text-uppercase"></h3>
                <div class="row">
                  <div class="mb-3 row">
                    <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="petname" value="<?php echo $profile->getName(); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row ">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Birthday: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="birthday" value="<?php echo $profile->getBirthdate()->format('M-d-Y'); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Color:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="color" value="<?php echo $profile->getColor(); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Trait:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="trait" value="<?php echo $profile->getTrait(); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row ">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Sex: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="gender" value="<?php echo $profile->getSex(); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row ">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">PCCI: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pcci" value="<?php echo $profile->getPcciStatus(); ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 row ">
                    <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Vaccine: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="vaccine" value="<?php echo ($profile->getIsVaccinated() == true) ? "COMPLETE" : "NO VACCINATION"; ?>" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end pt-2" id="button-group" style="margin-right:10%">
                <a href="/ownedpets" type="reset" class="btn btn-outline-dark mt-3">Go Back</a>
                <a href="/ownedpets/delete/<?php echo $profile->getId(); ?>" onclick="return confirm('Are you sure you want to delete this pet profile?');"><button id="deletebtn" class="btn btn-danger me-4 mt-3">Delete</button></a>
                <button type="submit" id="submitbtn" class="btn ms-2 mt-3" data-bs-toggle="modal" data-bs-target="#editModal" style="background-color: #c0b65a; color:white; margin-left:20px;">Edit</button>
              </div>
              <form method="POST" action="/ownedpets/update/<?php echo $profile->getId(); ?>" enctype="multipart/form-data">
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel" style="font-family: 'Acme', sans-serif;"> Edit Pet Profile Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:60%;"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3 row">
                          <input type="hidden" name="type" value="<?php echo $profile->getType(); ?>">
                          <input type="hidden" name="status" value="<?php echo $profile->getStatus(); ?>">
                          <input type="hidden" name="price" value="<?php echo $profile->getPrice(); ?>">
                          <label for="inputPetName" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $profile->getName(); ?>">
                          </div>
                        </div>
                        <div class="mb-3 row ">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Birthday: </label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $profile->getBirthdate()->format('Y-m-d'); ?>">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Color:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="color" name="color" value="<?php echo $profile->getColor(); ?>">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Trait:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="trait" name="trait" value="<?php echo $profile->getTrait(); ?>">
                          </div>
                        </div>
                        <div class="mb-3 row ">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Gender: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $profile->getSex(); ?>">
                          </div>
                        </div>
                        <div class="mb-3 row ">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">PCCI Status: </label>
                          <div class="col-sm-10">
                            <select class="form-control" id="pcciStatus" name="pcciStatus">
                              <option value="REGISTERED" <?php if ($profile->getPcciStatus() == "REGISTERED") echo "selected"; ?>>Registered</option>
                              <option value="PENDING" <?php if ($profile->getPcciStatus() == "PENDING") echo "selected"; ?>>Pending</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 row ">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Vaccine : </label>
                          <div class="col-sm-10">
                            <select class="form-control" id="isVaccinated" name="isVaccinated">
                              <option value="Yes" <?php if ($profile->getIsVaccinated() == true) echo "selected"; ?>>Vaccinated</option>
                              <option value="No" <?php if ($profile->getIsVaccinated() == false) echo "selected"; ?>>Not Vaccinated</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 row ">
                          <label for="inputColor" class="col-sm-2 col-form-label" style="color:#7d6056;font-family: 'Acme', sans-serif;">Dog Image : </label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" class="form-control" name="old_image" value="<?php echo base64_encode($profile->getImage()); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn text-light" style="background-color:#DB6551">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </section>
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