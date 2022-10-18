<!-- FOOTER -->
<!-- OLD FOOTER DIV
<div class="container-fluid" style="width:100%; margin-top: 5%; align-items:center">
  <footer class="fixfooter d-flex flex-wrap justify-content-between align-items-center py-3 my-4" style="height:75px; font-size:20px; margin-top:10%;">
    <div class="col-md-5 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <img src="/Ohana/src/images/Landing/ohana.png" width="50px;" height="50px;">
      </a>
      <span class="mb-3 mb-md-0">
        &copy; 2022 OHANA KENNEL PH |
        <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#termsModal"> TERMS AND CONDITIONS | </a>
        <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#privacyModal"> DATA PRIVACY </a>
      </span>
    </div>
  </footer>
</div>
-->
<div class="container-fluid" style="width:75%; margin-top: 4%; color:#db6551">
  <footer class="py-3 my-4 border-top border-warning bottom-0">
    <p class="text-center" style="font-size:15px"><br> &copy; 2022 Ohana Kennel PH. All Rights Reserved</p>
    <ul class="nav justify-content-center pb-3 mb-3">
      <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#termsModal"> TERMS AND CONDITIONS | </a>
      <a href="#" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#privacyModal">&nbsp; DATA PRIVACY </a>
    </ul>
  </footer>
</div>

<!-- TERMS Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsandconditions" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="termsTitle"> OHANA KENNEL PH</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:800px"></button>
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
        <h3 class="modal-title" id="privacyTitle"> OHANA KENNEL PH</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:800px"></button>
      </div>
      <div class="modal-body">
        <?php include_once 'privacy.php'; ?>
      </div>
    </div>
  </div>
</div>