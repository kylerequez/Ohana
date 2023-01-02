<style>
  @media screen and (min-width: 360px) and (max-width: 550px) {
    #paragraph {
      font-size: 12px;
    }

    #terms {
      font-size: 12px;
    }

    .container-fluid {
      margin-top: -10%
    }

    #ohanafooter {
      margin-top: 15%;
    }

    @media screen and (min-width: 551px) and (max-width: 1090px) {
      #footercontainer {
        margin-top: 15%;
      }
    }
  }
@media screen and (min-width: 1100px) and (max-width: 1366px) {
        
      }
</style>
<div class="container-fluid" id="footercontainer" style="width:75%; color:#db6551">
  <footer id="ohanafooter" class="py-3 my-4 border-top border-warning bottom-0">
    <p id="paragraph" class="text-center mt-4"> &copy; 2022 Ohana Kennel PH. All Rights Reserved</p>
    <ul class="nav justify-content-center pb-3 mb-3 mt-3">
      <a id="terms" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#termsModal"> TERMS AND CONDITIONS </a>
      <a id="terms" style="text-decoration:none; color:#c0b65a;" data-bs-toggle="modal" data-bs-target="#privacyModal">&nbsp; DATA PRIVACY </a>
    </ul>
  </footer>
</div>
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsandconditions" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include_once 'terms.php'; ?>
      </div>
    </div>
  </div>
</div>
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