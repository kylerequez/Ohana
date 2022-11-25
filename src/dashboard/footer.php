<!-- ! Footer -->
<footer class="footer" style="text-align:center;">
  <div class="container-fluid">
    <div class="footer-start">
      <p> Ohana Kennel PH &copy; Copyright 2022. |
        <a href="#" rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#termsModal"> Terms and
          Conditions </a> <a href="#" rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#privacyModal"> | Data Privacy </a>
        <a href="#" rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#"> | User Manual |</a>
      </p>
    </div>
  </div>
</footer>
<!-- TERMS Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsandconditions" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include_once dirname(__DIR__) . '/pages/terms.php'; ?>
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
        <?php include_once dirname(__DIR__) . '/pages/privacy.php'; ?>
      </div>
    </div>
  </div>
</div>