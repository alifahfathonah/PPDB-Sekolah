<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/static/css/bootstrap-custom.css" />
  <link rel="stylesheet" href="/static/css/styles.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
      <h1 class="font-weight-bold text-primary">Login</h1>
      <h6><?= $web->nama_sekolah ?></h6>

      <?= $this->session->flashdata('error') ? "<div class='small text-danger'>{$this->session->flashdata('error')}</div>" : null ?>
      <?= $this->session->flashdata('success') ? "<div class='small text-success'>{$this->session->flashdata('success')}</div>" : null ?>

      <form class="my-3" method="POST" action="/auth/masukAct">
        <label class="input-container-bottom py-2">
          <div class="small">Nama Pengguna</div>
          <img src="/static/images/icons/user.svg" />
          <input type="text" name="username" required placeholder="johndoe89" class="ml-2" />
        </label>

        <label class="input-container-bottom py-2">
          <div class="small">Kata Sandi</div>
          <img src="/static/images/icons/lock.svg" />
          <input type="password" name="password" required placeholder="*******" class="ml-2" />
        </label>
        <div class="d-flex justify-content-end">
          <a href="#" class="small text-primary">Lupa Kata Sandi?</a>
        </div>

        <button class="btn btn-primary w-100 mt-4 py-2">Masuk</button>

        <div class="text-center small d-flex align-items-center justify-content-center mt-2">
          Mau sekolah disini?
          <a href="/auth/daftar" class="text-primary d-block mx-1 font-weight-bold">
            Daftar
          </a>
          dulu yuk!
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="/static/js/bootstrap.min.js"></script>
</body>

</html>