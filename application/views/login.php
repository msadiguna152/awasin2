<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url()?>assets/logo_cikarang.png">
  <title><?= ucfirst("Awasin Elektronik (Aplikasi Pengawasan Internal Elektronik)");?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
  <style type="text/css">
    .ignielPelangi {
        background: linear-gradient(45deg, #fff1f0, #4dfff6, #1fff26);
        background-size: 500% 500%;
        -webkit-animation: ignielGradient 12s ease infinite;
        -moz-animation: ignielGradient 12s ease infinite;
        animation: ignielGradient 12s ease infinite;
    }
    @-webkit-keyframes ignielGradient {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @-moz-keyframes ignielGradient {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @keyframes ignielGradient {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
  </style>
  <style type="text/css">
    .bg {
      background: url(assets/bg.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body class="hold-transition login-page ignielPelangi">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary ignielPelangi">
    <div class="card-header text-center">

      <div class="text-center">
        <img src="<?= base_url()?>assets/logo_cikarang.png" class="img img-fluid mx-auto d-block">
      </div>

      <span class="h1"><b>Awasin Elektronik</b></span><br>
      <span class="h3"><b>(Aplikasi Pengawasan Internal Elektronik)</b></span>

    </div>
    <div class="card-body">
      <form action="<?= base_url('Login/proses_login')?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Masukan Username . . .">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Masukan Password . . .">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="social-auth-links text-center mt-2 mb-3">
          <button type="submit" class="btn btn-block btn-primary">MASUK</button>
        </div>

      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
