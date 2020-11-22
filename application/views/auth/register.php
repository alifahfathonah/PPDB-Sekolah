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
  <div class="container-fluid py-5">
    <div class="d-flex flex-column align-items-center vh-100">
      <h1 class="font-weight-bold text-primary">Daftar</h1>
      <h6><?= $web->nama_sekolah ?></h6>

      <?= $this->session->flashdata('error') ? "<div class='small text-danger'>{$this->session->flashdata('error')}</div>" : null ?>
      <?= $this->session->flashdata('success') ? "<div class='small text-success'>{$this->session->flashdata('success')}</div>" : null ?>

      <form method="POST" action="/auth/daftarAct" class="my-3">
        <label class="input-container-bottom py-2">
          <div class="small">Nama</div>
          <img src="/static/images/icons/user.svg" />
          <input required name="nama" type="text" placeholder="John Doe" class="ml-2" />
        </label>

        <label class="input-container-bottom py-2">
          <div class="small">Nama Pengguna</div>
          <img src="/static/images/icons/user.svg" />
          <input required name="username" type="text" placeholder="johndoe89" class="ml-2" />
        </label>

        <label class="input-container-bottom py-2">
          <div class="small">Alamat Email</div>
          <img src="/static/images/icons/mail.svg" />
          <input required name="email" type="email" placeholder="johndoe89@gmail.com" class="ml-2" />
        </label>

        <label class="input-container-bottom py-2">
          <div class="small">Kata Sandi</div>
          <img src="/static/images/icons/lock.svg" />
          <input required name="password" type="password" placeholder="*******" class="ml-2" />
        </label>

        <div class="row no-gutters">
          <div class="col-12 small font-weight-bold mt-3">Nilai</div>
          <label class="col-3 input-container-bottom py-2">
            <div class="small">B.Indonesia</div>
            <input required name="ind" type="number" class="w-100" placeholder="100" max="100" min="0" />
          </label>

          <label class="col-3 input-container-bottom py-2">
            <div class="small">B.Inggris</div>
            <input required name="ing" type="number" class="w-100" placeholder="100" max="100" min="0" />
          </label>

          <label class="col-3 input-container-bottom py-2">
            <div class="small">Matematika</div>
            <input required name="mtk" type="number" class="w-100" placeholder="100" max="100" min="0" />
          </label>

          <label class="col-3 input-container-bottom py-2">
            <div class="small">IPA</div>
            <input required name="ipa" type="number" class="w-100" placeholder="100" max="100" min="0" />
          </label>
        </div>

        <label class="w-100">
          <div class="small">Jurusan</div>
          <select required name="jurusan" class="w-100 py-2">
            <?php foreach ($jurusan as $value) : ?>
              <option value="<?= $value->id ?>"><?= $value->nama ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <button class="btn btn-primary w-100 mt-4 py-2">Daftar</button>

        <div class="text-center small d-flex align-items-center justify-content-center mt-2">
          Sudah mempunyai akun?
          <a href="/auth" class="text-primary d-block mx-1 font-weight-bold">
            Masuk
          </a>
          disini!
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="/static/js/bootstrap.min.js"></script>
</body>

</html>