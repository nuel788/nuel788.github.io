<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="HOME/img/logo/logo.png" rel="icon">
  <title>Surat - Login</title>
  <link href="HOME/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="HOME/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="HOME/css/ruang-admin.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('background_depan.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      height: 90vh;
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 mb-4"><marquee>Sistem Infromasi Surat Masuk & Surat Keluar</marquee></h1>
                  </div>
                  <form class="user" method="POST" action="proses_login.php">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputuser" name="username" aria-describedby="userHelp"
                        placeholder="Enter Your Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="HOME/vendor/jquery/jquery.min.js"></script>
  <script src="HOME/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="HOME/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="HOME/js/ruang-admin.min.js"></script>
</body>

</html>