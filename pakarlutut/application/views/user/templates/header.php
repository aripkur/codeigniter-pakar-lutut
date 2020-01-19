<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/user/vendor/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/user/css/custom.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand text-uppercase" href="<?=base_url()?>">Sistem Pakar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link <?= $aktifHome ?>" href="<?= base_url()?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $aktifKonsultasi ?>" href="<?= base_url('konsultasi')?>">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $aktifAbout ?>" href="<?= base_url('about')?>">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>