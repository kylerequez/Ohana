<style>
   @media screen and (min-width: 360px) and (max-width: 930px) { 

   }
</style>

<div class="container-fluid" style="width:75%; color:#db6551">
  <footer class="py-3 my-4 border-top border-warning bottom-0">
    <p class="text-center mt-4"> &copy; 2022 Ohana Kennel PH. All Rights Reserved</p>
    <ul class="nav justify-content-center pb-3 mb-3 mt-3">
      <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#termsModal"> TERMS AND CONDITIONS </a>
      <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#privacyModal">&nbsp; DATA PRIVACY </a>
    </ul>
  </footer>
</div>

<!-- TERMS Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsandconditions" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
        <?php include_once 'terms.php'; ?>
      </div>
    </div>
  </div>
</div>

<!-- DATA PRIVACY Modal -->
<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="dataprivacy" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include_once 'privacy.php'; ?>
      </div>
    </div>
  </div>
</div>