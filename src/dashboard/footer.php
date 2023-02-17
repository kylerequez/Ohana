<style>
   @media (max-width: 480.98px) {
      #adminfooter {
        font-size: 12px;
      }
    }
</style>
<!-- ! Footer -->
<footer class="footer" style="text-align:center;">
  <div class="container-fluid">
    <div class="footer-start">
      <p id="adminfooter" > Ohana Kennel PH &copy; Copyright 2022. |
        <a rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#termsModal" style="cursor: pointer;"> Terms and
          Conditions </a> <a rel="noopener noreferrer" data-bs-toggle="modal" data-bs-target="#privacyModal" style="cursor: pointer;"> | Data Privacy </a>
        <a rel="noopener noreferrer" href="https://drive.google.com/file/d/1oo0rNRlPcLvEDKpSWWbTu9tS5V5WevjE/view?usp=sharing" target="_blank" style="cursor: pointer;"> | User Manual |</a>
      </p>
      <!-- TERMS Modal -->
      <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsandconditions" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color:black">
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
            <div class="modal-body" style="color:black">
              <?php include_once dirname(__DIR__) . '/pages/privacy.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>