<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

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
      <li class="active py-2 pl-3"><a href="/dashboard" class="text-primary">Halaman Utama</a></li>
      <?= $userdata->role === '2' ? '<li class="py-2 pl-3"><a href="/dashboard/tu" class="text-dark">Manajemen TU</a></li>' : "" ?>
      <li class="py-2 pl-3"><a href="/dashboard/guru" class="text-dark">Manajemen Guru</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/siswa" class="text-dark">Manajemen Siswa</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/grade" class="text-dark">Manajemen Grade</a></li>
      <li class="py-2 pl-3"><a href="/dashboard/jurusan" class="text-dark">Manajemen Jurusan</a></li>
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

      <div class="row no-gutters">
        <div class="col-lg-4 col-md-6 px-2">
          <div class="card border-0 shadow-sm text-dark bg-white my-3">
            <div class="card-body">
              <h5 class="card-title">Jumlah Siswa</h5>
              <div class="d-flex justify-content-between my-3">
                <img src="/static/images/icons/users-dark.svg" width="36px"></img>
                <h1 class="card-text text-right"><?= $count['siswa'] ?></h1>
              </div>

              <a href="/dashboard/siswa" class="text-dark small">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 px-2">
          <div class="card border-0 shadow-sm text-dark bg-white my-3">
            <div class="card-body">
              <h5 class="card-title">Jumlah Guru</h5>
              <div class="d-flex justify-content-between my-3">
                <img src="/static/images/icons/briefcase-dark.svg" width="36px"></img>
                <h1 class="card-text text-right"><?= $count['guru'] ?></h1>
              </div>

              <a href="/dashboard/guru" class="text-dark small">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 px-2">
          <div class="card border-0 shadow-sm text-dark bg-white my-3">
            <div class="card-body">
              <h5 class="card-title">Jadwal Pelajaran</h5>
              <div class="d-flex justify-content-between my-3">
                <img src="/static/images/icons/calendar-dark.svg" width="36px"></img>
                <h1 class="card-text text-right"><?= $count['pelajaran'] ?></h1>
              </div>

              <a href="/dashboard/jadwal" class="text-dark small">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>

      <div class="my-3 table-responsive">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Data Siswa Menunggu Persetujuan</h5>
          <a href="/dashboard/" class="small text-dark">Lihat Semua</a>
        </div>

        <table id="dataSiswaProcess" class="table nowrap table-light table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Nilai</th>
              <th>Daftar Pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user->process as $key => $value) : ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->nama ?></td>
                <td><?= $value->jurusan ?></td>
                <td><?= $value->nilai_total ?></td>
                <td><?= $value->tanggal_daftar ?></td>
                <td>
                  <a href="<?= base_url() . "dashboard/gagal/{$value->id}" ?>" class="btn btn-danger py-0 btn-sm">Tidak Lulus</a>
                  <a href="<?= base_url() . "dashboard/lolos/{$value->id}" ?>" class="btn btn-primary py-0 btn-sm">Lulus</a>
                </td>
              </tr>
              <?php if ($key + 1 >= 5) break ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="my-3 table-responsive">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Data Siswa Telah Disetujui</h5>
          <a href="#" class="small text-dark">Lihat Semua</a>
        </div>

        <table id="dataSiswaAccepted" class="table nowrap table-light table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Nilai Total</th>
              <th>Kelas</th>
              <th>Grade</th>
              <th>Daftar Pada</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user->approved as $key => $value) : ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->nama ?></td>
                <td><?= $value->jurusan ?></td>
                <td><?= $value->nilai_total ?></td>
                <td><?= $value->kelas ?></td>
                <td><?= $value->grade ?></td>
                <td><?= $value->tanggal_daftar ?></td>
              </tr>
              <?php if ($key + 1 >= 5) break ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>


    <!-- <div class="my-3 table-responsive">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Data Guru</h5>
          <a href="#" class="small text-dark">Lihat Semua</a>
        </div>

        <table id="dataGuru" class="table nowrap table-light table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Nilai Total</th>
              <th>Kelas</th>
              <th>Grade</th>
              <th>Daftar Pada</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Api Al Rahman</td>
              <td>Teknik Komputer Jaringan</td>
              <td>100</td>
              <td>10 SMK</td>
              <td>A</td>
              <td>2011/04/25</td>
            </tr>

            <tr>
              <td>1</td>
              <td>Api Al Rahman</td>
              <td>Teknik Komputer Jaringan</td>
              <td>100</td>
              <td>10 SMK</td>
              <td>A</td>
              <td>2011/04/25</td>
            </tr>

            <tr>
              <td>1</td>
              <td>Api Al Rahman</td>
              <td>Teknik Komputer Jaringan</td>
              <td>100</td>
              <td>10 SMK</td>
              <td>A</td>
              <td>2011/04/25</td>
            </tr>
          </tbody>
        </table> -->
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

      $('#dataSiswaProcess').DataTable(settings);
      $('#dataSiswaAccepted').DataTable(settings);
    });
  </script>

</body>

</html>