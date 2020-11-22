<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PPDB</title>

  <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/static/css/bootstrap-custom.css" />
  <link rel="stylesheet" href="/static/css/styles.css" />
</head>

<body>
  <nav class="container py-4 d-flex justify-content-end align-items-center">
    <!-- <h3 class="font-weight-bold text-primary mb-0"></h3> -->
    <div class="d-flex align-items-center">
      <?php if ($logged) : ?>
        <a href="<?= $role === 0 ? "/dasboard" : "/siswa" ?>" class="btn text-primary mx-1 px-3">Masuk Dashboard</a>
      <?php else : ?>
        <a href="/auth" class="btn text-primary mx-1 px-3">Masuk</a>
        <a href="/auth/daftar" class="btn btn-primary mx-1 px-3">Daftar</a>
      <?php endif; ?>
    </div>
  </nav>

  <header>
    <div class="background-overlay-50vh d-flex align-items-end">
      <div class="text-white container my-5">
        <h1 class="font-weight-bold mb-3 text-center text-lg-left">
          Profil Sekolah
        </h1>

        <div class="font-weight-bold text-center text-lg-left">
          <?= $web->nama_sekolah ?>
        </div>

        <div class="w-50 small d-none d-lg-block">
          <?= $web->alamat_sekolah ?>
        </div>

        <div class="small text-center d-lg-none">
          <?= $web->alamat_sekolah ?>
        </div>
      </div>
    </div>
    <div class="background-home-50vh" style="background-image: url(/uploads/<?= $web->banner ?>) !important"></div>
  </header>

  <section class="container my-4">
    <div>
      <h4>Sejarah</h4>
      <div>
        <?= $web->sejarah ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 my-4">
        <h4>Visi</h4>
        <div>
          <?= $web->visi ?>
        </div>
      </div>

      <div class="col-lg-6 my-4">
        <h4>Misi</h4>
        <div>
          <?= $web->misi ?>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-primary py-4">
    <div class="container">
      <div class="text-white text-left">&copy; 2020 Alright Reserved</div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="/static/js/bootstrap.min.js"></script>
</body>

</html>