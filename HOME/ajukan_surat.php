<?php 
session_start();
include 'koneksi.php';
// Periksa apakah session username telah diatur
if (!isset($_SESSION['pengguna_type'])) {
    echo '<script language="javascript" type="text/javascript">
    alert("Anda Tidak Berhak Masuk Kehalaman Ini!");</script>';
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Surat - Ajukan Surat Keluar</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->  
  <link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
  <!-- Bootstrap Touchspin -->
  <link href="vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
  <!-- ClockPicker -->
  <link href="vendor/clock-picker/clockpicker.css" rel="stylesheet">
  <!-- RuangAdmin CSS -->
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'menu.php'; ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small"
                      placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2"
                      style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <?php include 'profil.php'; ?>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajukan Surat</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Ajukan Surat</li>
            </ol>
          </div>

          <?php
          $id = $_GET['id']; 
          $sk = mysqli_query($koneksi,"SELECT * FROM tb_sk WHERE id_sk = '$id'");
          $rk = mysqli_fetch_assoc($sk);
          ?>

          <div class="row">
            <div class="col-lg-8">
              <!-- Select2 -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ajukan Surat</h6>
                </div>
                <div class="card-body">        
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Tgl. Surat Keluar</th>
                        <th>:</th>
                        <td><?php echo $rk['tgl_keluar']; ?></td>
                      </tr>
                      <tr>
                        <th>Nomor Agenda</th>
                        <th>:</th>
                        <td><?php echo $rk['nomor_agenda']; ?></td>
                      </tr>
                      <tr>
                        <th>No. Surat Keluar</th>
                        <th>:</th>
                        <td><?php echo $rk['nomor_sk']; ?></td>
                      </tr>
                      <tr>
                        <th>Tanggal Surat</th>
                        <th>:</th>
                        <td><?php echo $rk['tgl_sk']; ?></td>
                      </tr>
                      <tr>
                        <th>Penerima</th>
                        <th>:</th>
                        <td><?php echo $rk['penerima_sk']; ?></td>
                      </tr>
                      <tr>
                        <th>Perihal</th>
                        <th>:</th>
                        <td><?php echo $rk['perihal_sk']; ?></td>
                      </tr>
                      <tr>
                        <th>Lampiran</th>
                        <th>:</th>
                        <td><?php echo $rk['lampiran_sk']; ?></td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                          <?php if ($rk['status'] == 1) { ?>
                            <span class="badge badge-primary"><i class="fas fa-spinner"></i> Proses Pengecekan</span>
                          <?php }elseif ($rk['status'] == 2) { ?>
                            <span class="badge badge-warning"><i class="fas fa-check"></i> Berkas Dicek Pimpinan</span>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Tindakan</th>
                        <th>:</th>
                        <td><?php echo $rk['tindakan']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php if ($rk['status'] == 1) { ?>
                    <hr>
                    <div class="form-group">
                      <label>Cek Proses</label>
                      <select class="form-control" id="cek" onchange="showForm()">
                        <option selected disabled>Pilih Proses</option>
                        <option value="Ajukan Baca">Ajukan Baca</option>
                        <option value="perbaiki">Perbaiki</option>
                      </select>
                    </div><br>
                    <div id="ajukanForm" style="display:none;">
                      <form method="POST" action="proses_baca.php">
                        <input type="hidden" name="idsk" value="<?php echo $rk['id_sk']; ?>">
                        <div class="form-group">
                          <label for="">Cek Baca Pimpinan</label>
                          <select class="form-control" id="baca" name="baca">
                            <option selected disabled>Pimpinan Baca</option>
                            <?php 
                            $p = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE izin_akses='pimpinan'");
                            while ($rp = mysqli_fetch_assoc($p)){
                            ?>
                            <option value="<?php echo $rp['id_pg']; ?>"><?php echo $rp['nama_lengkap']; ?> ( <?php echo $rp['jabatan']; ?> )</option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-sm btn-success">Ajukan Baca</button>
                        </div>
                      </form>
                    </div>

                    <div id="perbaikiForm" style="display:none;">
                      <form method="POST" action="proses_perbaiki.php">
                        <input type="hidden" name="idk" value="<?php echo $rk['id_sk']; ?>">
                        <div class="form-group">
                          <label for="keteranganPerbaiki" class="form-label">Keterangan Perbaiki</label>
                          <input type="text" class="form-control" id="keteranganPerbaiki" name="keteranganPerbaiki">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-sm btn-danger">Perbaiki</button>
                        </div>
                      </form>
                    </div>
                  <?php } ?>
                </div>
              </div>

            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="keluar.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script>
              <b><a href="#" target="_blank"></a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Select2 -->
  <script src="vendor/select2/dist/js/select2.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap Touchspin -->
  <script src="vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <!-- ClockPicker -->
  <script src="vendor/clock-picker/clockpicker.js"></script>
  <!-- RuangAdmin Javascript -->
  <script src="js/ruang-admin.min.js"></script>
  <!-- Javascript for this page -->
  <script>
    $(document).ready(function () {


      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-daterange').datepicker({        
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });    

      // TouchSpin

      $('#touchSpin1').TouchSpin({
        min: 0,
        max: 100,                
        boostat: 5,
        maxboostedstep: 10,        
        initval: 0
      });

      $('#touchSpin2').TouchSpin({
        min:0,
        max: 100,
        decimals: 2,
        step: 0.1,
        postfix: '%',
        initval: 0,
        boostat: 5,
        maxboostedstep: 10
      });

      $('#touchSpin3').TouchSpin({
        min: 0,
        max: 100,
        initval: 0,
        boostat: 5,
        maxboostedstep: 10,
        verticalbuttons: true,
      });

      $('#clockPicker1').clockpicker({
        donetext: 'Done'
      });

      $('#clockPicker2').clockpicker({
        autoclose: true
      });

      let input = $('#clockPicker3').clockpicker({
        autoclose: true,
        'default': 'now',
        placement: 'top',
        align: 'left',
      });

      $('#check-minutes').click(function(e){        
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
      });

    });
  </script>

  <script>
  function showForm() {
    var selectedOption = document.getElementById("cek").value;
    var ajukanForm = document.getElementById("ajukanForm");
    var perbaikiForm = document.getElementById("perbaikiForm");

    if (selectedOption === "Ajukan Baca") {
      ajukanForm.style.display = "block";
      perbaikiForm.style.display = "none";
    } else if (selectedOption === "perbaiki") {
      ajukanForm.style.display = "none";
      perbaikiForm.style.display = "block";
    } else {
      ajukanForm.style.display = "none";
      perbaikiForm.style.display = "none";
    }
  }
</script>

</body>

</html>