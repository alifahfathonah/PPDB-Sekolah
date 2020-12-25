<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Siswa</title>

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

    </div>
    <hr />
    <ul>
      <li class="py-2 pl-3 active"><a href="#" class="text-primary">Halaman Utama</a></li>
      <?php if ($userdata->status === 'lolos') : ?>
        <li class="py-2 pl-3"><a href="/siswa/list" class="text-dark">Daftar Siswa</a></li>
        <li class="py-2 pl-3"><a href="/siswa/jadwal" class="text-dark">jadwal Pelajaran</a></li>
      <?php endif; ?>
    </ul>
  </aside>

  <div class="overlay-bg" id="sidebar-overlay"></div>

  <!-- Navbar -->
  <nav class="sticky-top px-5 py-4 shadow-sm bg-white">
    <div class="side d-flex justify-content-between justify-content-lg-end align-items-center">
      <button class="btn d-lg-none" id="more">
        <img src="/static/images/icons/menu.svg" height="24px" />
      </button>

      <a href="<?= base_url() ?>/siswa/logout" class="d-flex">
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

      <h4>Detail Siswa</h4>

      <div class="mt-4">
        <div class="my-3">
          <div class="small">
            Nama
          </div>
          <div class="text-primary">
            <?= $userdata->nama ?>
          </div>
        </div>

        <div class="my-3">
          <div class="small">
            Email
          </div>
          <div class="text-primary">
            <?= $userdata->email ?>
          </div>
        </div>

        <?php if ($userdata->status === 'lolos') : ?>
          <div class="my-3">
            <div class="small">
              Kelas
            </div>
            <div class="text-primary">
              <?= $userdata->kelas ?> <?= $userdata->grade ?>
            </div>
          </div>

          <div class="my-3">
            <div class="small">
              Jurusan
            </div>
            <div class="text-primary">
              <?= $userdata->jurusan ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="my-3">
          <div class="small">
            Status
          </div>
          <span class="py-2 px-3 text-capitalize badge badge-<?= $userdata->status === 'diproses' ? 'warning' : ($userdata->status === 'lolos' ? 'primary' : 'danger') ?>">
            <?= $userdata->status ?>
          </span>
        </div>


        <div class="my-3">
          <div class="small">
            Tanggal Daftar
          </div>
          <div class="text-primary">
            <?= $userdata->tanggal_daftar ?>
          </div>
        </div>

      </div>
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
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      const settings = {
        paging: false,
        info: false,
        bFilter: false,
        responsive: true
      }

      $('#dataSiswa').DataTable(settings);
      $('#dataGuru').DataTable(settings);
    });
  </script>

</body>

</html>