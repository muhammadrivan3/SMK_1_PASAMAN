<?php
include '../../db/koneksi.php';
include '../akses.php';
include '../../layout/header.php';
?>

<div id="content" style="margin-top:60px;">
  <div class="regular-page-area section-padding-20">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="details-content">
            <h2 id="xs"><i class="icon-calendar"></i> KELAS ONLINE </h2>
            <div id="myDiv" class="container-fluid">
              <hr>
              <div class="card">
                <!-- <img src="http://localhost/SMK_1_PASAMAN/absensi/assets/image/siswa/744926.jpg" alt="Avatar" style="width:20%"> -->
                <div class="container">
                  <!-- <h4><b>John Doe</b></h4> -->
                  <p>Architect & Engineer</p>
                  <p>Architect & Engineer</p>
                  <p>Architect & Engineer</p>
                  <p>Architect & Engineer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="../../js/custom/custom.js"></script>
<script >
  $('.pane-hScroll').scroll(function() {
    $('.pane-vScroll').width($('.pane-hScroll').width() + $('.pane-hScroll').scrollLeft());
  });
</script>
<!--end-main-container-part-->
<?php include '../../layout/footer.php'; ?>
