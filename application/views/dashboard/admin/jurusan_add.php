<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Jurusan</title>

  <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/static/css/bootstrap-custom.css" />
  <link rel="stylesheet" href="/static/css/styles.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
</head>

<body class="bg-secondary">

  <!-- Side bar -->
  <aside class="sidebar-container px-3 py-4 bg-white shadow-sm" id="sidebar">
    <h3 class="text-primary mb-4">Dashboard</h3>
    <hr />
    <div class="text-center">

      <h5 class="mt-3 mb-0"><?= $userdata->nama ?></h5>
      <div class="small"><?= $userdata->email ?></div>
    </div>
    <hr />
    <ul>
      <li class="py-2 pl-3"><a href="/dashboard" class="text-dark">Halaman Utama</a></li>
      <?= $userdata->role === '2' ? '<li class="py-2 pl-3"><a href="/dashboard/tu" class="text-dark">Manajemen TU</a></li>' : "" ?>
      <li class="py-2 pl-3"><a href="/dashboard/guru" class="text-dark">Manajemen Guru</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/siswa" class="text-dark">Manajemen Siswa</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/grade" class="text-dark">Manajemen Grade</a></li>
      <li class="py-2 pl-3 active"><a href="/dashboard/jurusan" class="text-primary">Manajemen Jurusan</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/kelas" class="text-dark">Manajemen Kelas</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/jadwal" class="text-dark">Manajemen Jadwal</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/pelajaran" class="text-dark">Manajemen Pelajaran</a></li>
      <?= $userdata->role === '2' ? '<li class="py-2 pl-3"><a href="/dashboard/web" class="text-dark">Manajemen Website</a></li>' : '' ?>
    </ul>
  </aside>

  <div class="overlay-bg" id="sidebar-overlay"></div>

  <!-- Navbar -->
  <nav class="sticky-top px-5 py-4 shadow-sm bg-white">
    <div class="side d-flex justify-content-between justify-content-lg-end align-items-center">
      <button class="btn d-lg-none" id="more">
        <img src="/static/images/icons/menu.svg" height="24px" />
      </button>

      <a href="<?= base_url() ?>/dashboard/logout" class="d-flex">
        <img src="/static/images/icons/log-out.svg" height="24px" />
        <div class="ml-2 text-dark">Logout</div>
      </a>
    </div>
  </nav>

  <!-- Content -->
  <section class="side">
    <div class="container my-4">
      <?= $this->session->flashdata('error') ? "<div class='small text-danger'>{$this->session->flashdata('error')}</div>" : null ?>
      <?= $this->session->flashdata('success') ? "<div class='small text-success'>{$this->session->flashdata('success')}</div>" : null ?>

      <div class="d-flex justify-content-between">
        <h4>Tambah Data</h4>
      </div>

      <form method="POST" action="<?= base_url() ?>/dashboard/jurusan/act_tambah" class="row flex-column col-md-5">
        <label class="input-container-bottom py-2 my-2">
          <div class="small">Jurusan</div>
          <input class="w-100" type="text" name="nama" required placeholder="Teknik Komputer Jaringan" />
        </label>

        <button class="btn btn-primary w-100 mt-4 py-2">Tambah Jurusan</button>
      </form>
    </div>
  </section>

  <!-- <footer class="side py-4">
      <div class="container-fluid">
        <div class="text-white text-left">&copy; 2020 Alright Reserved</div>
      </div>
    </footer> -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/dashboard.js"></script>
</body>

</html>