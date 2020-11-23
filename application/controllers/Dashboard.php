<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  protected $sesi;
  protected $info;

  function __construct()
  {
    parent::__construct();
    $this->sesi = $this->session->userdata('user');
    if (!$this->sesi) return redirect(base_url() . "auth/masuk", 'refresh');
    $this->info = (object) $this->users->setWhere(["a.id" => $this->sesi->id])->getOne();
    if ($this->sesi->role == 0) return redirect(base_url() . "siswa/index", 'refresh');
  }

  public function index()
  {
    $data['userdata'] = $this->info;
    $data['count'] = [
      "siswa" => $this->users->setWhere(["a.status" => "lolos"])->getOne("COUNT(a.status) AS total")->total,
      "guru" => $this->guru->getCustom("COUNT(id) AS total")->total,
      "pelajaran" => $this->jadwal->getCustom("COUNT(id) AS total")->total,
    ];
    $data['user'] = (object) [
      "process" => $this->users->setWhere(["a.status" => "diproses", "a.role" => 0])->get(null, null, "nilai_total DESC"),
      "approved" => $this->users->setWhere(["a.status" => "lolos", "a.role" => 0])->get(null, null, "jurusan DESC, nilai_total DESC, tanggal_daftar ASC"),
    ];

    $this->load->view('dashboard/admin/main', $data);
  }

  // kelas
  public function kelas()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->kelas->getAll();

    $this->load->view('dashboard/admin/kelas', $data);
  }

  public function kelas_add()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/kelas_add', $data);
  }

  public function kelas_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->kelas->setWhere(['id' => $id])->get();

    $this->load->view('dashboard/admin/kelas_edit', $data);
  }

  public function kelas_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/kelas", "refresh");
    }
    $input = (object) $this->input->post();
    $this->kelas->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data kelas");
    return redirect(base_url() . "/dashboard/kelas", "refresh");
  }

  public function kelas_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/kelas", "refresh");
    }
    $input = (object) $this->input->post();
    $this->kelas->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data kelas");
    return redirect(base_url() . "/dashboard/kelas", "refresh");
  }

  public function kelas_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/kelas", "refresh");
    }

    $this->kelas->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data kelas");
    return redirect(base_url() . "/dashboard/kelas", "refresh");
  }

  // Jurusan
  public function jurusan()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->jurusan->getAll();

    $this->load->view('dashboard/admin/jurusan', $data);
  }

  public function jurusan_add()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/jurusan_add', $data);
  }

  public function jurusan_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->jurusan->setWhere(['id' => $id])->get();

    $this->load->view('dashboard/admin/jurusan_edit', $data);
  }

  public function jurusan_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/jurusan", "refresh");
    }
    $input = (object) $this->input->post();
    $this->jurusan->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data jurusan");
    return redirect(base_url() . "/dashboard/jurusan", "refresh");
  }

  public function jurusan_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/jurusan", "refresh");
    }
    $input = (object) $this->input->post();
    $this->jurusan->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data jurusan");
    return redirect(base_url() . "/dashboard/jurusan", "refresh");
  }

  public function jurusan_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/jurusan", "refresh");
    }

    $this->jurusan->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data jurusan");
    return redirect(base_url() . "/dashboard/jurusan", "refresh");
  }

  // Jurusan
  public function grade()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->grade->getAll();

    $this->load->view('dashboard/admin/grade', $data);
  }

  public function grade_add()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/grade_add', $data);
  }

  public function grade_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->grade->setWhere(['id' => $id])->get();

    $this->load->view('dashboard/admin/grade_edit', $data);
  }

  public function grade_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/grade", "refresh");
    }
    $input = (object) $this->input->post();
    $this->grade->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data grade");
    return redirect(base_url() . "/dashboard/grade", "refresh");
  }

  public function grade_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/grade", "refresh");
    }
    $input = (object) $this->input->post();
    $this->grade->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data grade");
    return redirect(base_url() . "/dashboard/grade", "refresh");
  }

  public function grade_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/grade", "refresh");
    }

    $this->grade->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data grade");
    return redirect(base_url() . "/dashboard/grade", "refresh");
  }

  // TU
  public function tu()
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    $data['userdata'] = $this->info;
    $data['user'] = $this->users->setWhere(["a.role" => 1])->get();

    $this->load->view('dashboard/admin/tu', $data);
  }

  public function tu_add()
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/tu_add', $data);
  }

  public function tu_edit($id)
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->users->setWhere(['a.id' => $id])->getOne();

    $this->load->view('dashboard/admin/tu_edit', $data);
  }

  public function tu_edit_act($id)
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/tu", "refresh");
    }
    $input = (object) $this->input->post();
    $this->users->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data tu");
    return redirect(base_url() . "/dashboard/tu", "refresh");
  }

  public function tu_add_act()
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/tu", "refresh");
    }
    $input = $this->input->post();
    $input['role'] = 1;
    $input['password'] = md5($input['password']);
    $this->users->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data tu");
    return redirect(base_url() . "/dashboard/tu", "refresh");
  }

  public function tu_delete($id)
  {
    if ($this->info->role != 2) {
      $this->session->set_flashdata("error", "Kamu tidak memiliki akses untuk melakukan tindakan ini");
      return redirect(base_url() . "/dashboard", "refresh");
    }
    if (!$id) {
      return redirect(base_url() . "/dashboard/tu", "refresh");
    }

    $this->users->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data tu");
    return redirect(base_url() . "/dashboard/tu", "refresh");
  }

  // guru
  public function guru()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->guru->getAll();

    $this->load->view('dashboard/admin/guru', $data);
  }

  public function guru_add()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/guru_add', $data);
  }

  public function guru_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->guru->setWhere(['id' => $id])->get();

    $this->load->view('dashboard/admin/guru_edit', $data);
  }

  public function guru_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/guru", "refresh");
    }
    $input = (object) $this->input->post();
    $this->guru->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data guru");
    return redirect(base_url() . "/dashboard/guru", "refresh");
  }

  public function guru_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/guru", "refresh");
    }
    $input = (object) $this->input->post();
    $this->guru->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data guru");
    return redirect(base_url() . "/dashboard/guru", "refresh");
  }

  public function guru_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/guru", "refresh");
    }

    $this->guru->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data guru");
    return redirect(base_url() . "/dashboard/guru", "refresh");
  }

  // Pelajaran
  public function pelajaran()
  {
    $data['userdata'] = $this->info;
    $data['list'] = $this->pelajaran->getAll();

    $this->load->view('dashboard/admin/pelajaran', $data);
  }

  public function pelajaran_add()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/admin/pelajaran_add', $data);
  }

  public function pelajaran_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->pelajaran->setWhere(['id' => $id])->get();

    $this->load->view('dashboard/admin/pelajaran_edit', $data);
  }

  public function pelajaran_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/pelajaran", "refresh");
    }

    $this->pelajaran->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data pelajaran");
    return redirect(base_url() . "/dashboard/pelajaran", "refresh");
  }

  public function pelajaran_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/pelajaran", "refresh");
    }
    $input = (object) $this->input->post();
    $this->pelajaran->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data pelajaran");
    return redirect(base_url() . "/dashboard/pelajaran", "refresh");
  }

  public function pelajaran_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/pelajaran", "refresh");
    }
    $input = (object) $this->input->post();
    $this->pelajaran->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data pelajaran");
    return redirect(base_url() . "/dashboard/pelajaran", "refresh");
  }

  // Siswa
  public function siswa()
  {
    if ($this->info->role === 0) return redirect(base_url("/dashboard"));
    $data['userdata'] = $this->info;
    $data['jurusan'] = $this->jurusan->getAll();
    $data['grade'] = $this->grade->getAll();
    $data['kelas'] = $this->kelas->getAll();
    $data['count'] = $this->users->setWhere(["a.status" => "diproses", "a.role" => 0])->getOne("COUNT(a.status) AS total")->total;
    $this->load->view('dashboard/admin/siswa', $data);
  }

  public function siswa_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['siswa'] = (object) $this->users->setWhere(['a.id' => $id])->getOne();

    $this->load->view('dashboard/admin/siswa_edit', $data);
  }

  public function siswa_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/siswa", "refresh");
    }
    $input = (object) $this->input->post();
    $this->users->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data siswa");
    return redirect(base_url() . "/dashboard/siswa", "refresh");
  }

  public function siswa_all()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->users->setWhere(["a.status" => "lolos"])->get(null, null, "jurusan DESC, nilai_total DESC, tanggal_daftar ASC");

    $this->load->view('dashboard/admin/siswa_all', $data);
  }

  public function siswa_pending()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->users->setWhere(["a.status" => "diproses", "a.role" => 0])->get(null, null, "nilai_total DESC");
    $this->load->view('dashboard/admin/siswa_pending', $data);
  }

  public function detail()
  {
    $queryJurusan = $this->input->get("jurusanid");
    $queryKelas = $this->input->get("kelasid");
    $queryGrade = $this->input->get("gradeid");
    $data['userdata'] = $this->info;

    $data['grade'] = $this->grade
      ->setWhere(['id' => $queryGrade])
      ->get('nama', null, null);

    $data['jurusan'] = $this->jurusan
      ->setWhere(['id' => $queryJurusan])
      ->get('nama', null, null);

    $data['kelas'] = $this->kelas
      ->setWhere(['id' => $queryKelas])
      ->get('nama', null, null);

    $data['user'] = $this->users
      ->setWhere(["a.status" => "lolos", "b.id" => $queryKelas, "d.id" => $queryGrade, "e.id" => $queryJurusan])
      ->get(null, null, "jurusan DESC, nilai_total DESC, tanggal_daftar ASC");

    $this->load->view('dashboard/admin/siswa_detail', $data);
  }

  public function lolos($id)
  {
    if (!$id) {
      $this->session->set_flashdata("error", "Unknown Error");
      return redirect(base_url() . "dashboard", "refresh");
    }

    $detailUser = $this->users->setWhere(["a.id" => $id])->getOne();
    if (!$detailUser) {
      $this->session->set_flashdata("error", "Unknown Error");
      return redirect(base_url() . "dashboard", "refresh");
    }

    $kelas = $this->kelas->getAll()[0];

    $getGrade = $this->grade->getAll();
    foreach ($getGrade as $value) {
      $getTotal = $this->users
        ->setWhere(["b.nama" => 10, "d.nama" => $value->nama, "e.nama" => $detailUser->jurusan])
        ->getOne("COUNT(a.id) as total");
      if ($getTotal->total >= 36) continue;

      $dataUpdate = ["status" => "lolos", "id_grade" => $value->id, "id_kelas" => $kelas->id];
      $this->users
        ->setData($dataUpdate)
        ->setWhere(["id" => $id])
        ->update();
      break;
    }

    $this->session->set_flashdata("success", "Sukses meloloskan kandidat");
    return redirect(base_url() . "dashboard", "refresh");
  }

  public function gagal($id)
  {
    if (!$id) {
      $this->session->set_flashdata("error", "Unknown Error");
      return redirect(base_url() . "dashboard", "refresh");
    }

    $detailUser = $this->users->setWhere(["a.id" => $id])->getOne();
    if (!$detailUser) {
      $this->session->set_flashdata("error", "Unknown Error");
      return redirect(base_url() . "dashboard", "refresh");
    }

    $dataUpdate = ["status" => "gagal"];
    $this->users
      ->setData($dataUpdate)
      ->setWhere(["id" => $id])
      ->update();

    $this->session->set_flashdata("success", "Sukses menggagalkan kandidat");
    return redirect(base_url() . "dashboard", "refresh");
  }

  // Jadwal
  public function jadwal()
  {
    if ($this->info->role === 0) return redirect(base_url("/dashboard"));
    $data['userdata'] = $this->info;
    $data['jurusan'] = $this->jurusan->getAll();
    $data['grade'] = $this->grade->getAll();
    $data['kelas'] = $this->kelas->getAll();
    $this->load->view('dashboard/admin/jadwal', $data);
  }

  public function jadwal_detail()
  {
    if ($this->info->role === 0) return redirect(base_url("/dashboard"));
    $queryJurusan = $this->input->get("jurusanid");
    $queryKelas = $this->input->get("kelasid");
    $queryGrade = $this->input->get("gradeid");
    $data['userdata'] = $this->info;

    $data['grade'] = $this->grade
      ->setWhere(['id' => $queryGrade])
      ->get('nama', null, null);

    $data['jurusan'] = $this->jurusan
      ->setWhere(['id' => $queryJurusan])
      ->get('nama', null, null);

    $data['kelas'] = $this->kelas
      ->setWhere(['id' => $queryKelas])
      ->get('nama', null, null);

    $data['jadwal'] = $this->jadwal
      ->setWhere(["d.id" => $queryKelas, "e.id" => $queryGrade, "f.id" => $queryJurusan])
      ->get();

    $this->load->view('dashboard/admin/jadwal_detail', $data);
  }


  public function jadwal_add()
  {
    $data['userdata'] = $this->info;
    $data['jurusan'] = $this->jurusan->getAll();
    $data['grade'] = $this->grade->getAll();
    $data['kelas'] = $this->kelas->getAll();
    $data['guru'] = $this->guru->getAll();
    $data['pelajaran'] = $this->pelajaran->getAll();

    $this->load->view('dashboard/admin/jadwal_add', $data);
  }

  public function jadwal_edit($id)
  {
    $data['userdata'] = $this->info;
    $data['list'] = (object) $this->jadwal->setWhere(['a.id' => $id])->getOne();
    $data['guru'] = $this->guru->getAll();
    $data['pelajaran'] = $this->pelajaran->getAll();

    $this->load->view('dashboard/admin/jadwal_edit', $data);
  }

  public function jadwal_edit_act($id)
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/jadwal", "refresh");
    }
    $input = (object) $this->input->post();
    $this->jadwal->setData($input)->setWhere(['id' => $id])->update();

    $this->session->set_flashdata("success", "Sukses edit data jadwal");
    return redirect(base_url() . "/dashboard/jadwal", "refresh");
  }

  public function jadwal_add_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/jadwal", "refresh");
    }
    $input = (object) $this->input->post();
    $this->jadwal->setData($input)->insert();

    $this->session->set_flashdata("success", "Sukses tambah data jadwal");
    return redirect(base_url() . "/dashboard/jadwal", "refresh");
  }

  public function jadwal_delete($id)
  {
    if (!$id) {
      return redirect(base_url() . "/dashboard/jadwal", "refresh");
    }

    $this->jadwal->setWhere(['id' => $id])->delete();
    $this->session->set_flashdata("success", "Sukses hapus data jadwal");
    return redirect(base_url() . "/dashboard/jadwal", "refresh");
  }

  // Web
  public function web()
  {
    $data['userdata'] = $this->info;
    $data['web'] = (object) $this->web->getAll();

    $this->load->view('dashboard/admin/web', $data);
  }

  public function web_edit_act()
  {
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
      $this->session->set_flashdata("error", "Bad Request!");
      return redirect(base_url() . "/dashboard/web", "refresh");
    }
    $input = (object) $this->input->post();
    $this->web->setData($input)->setWhere(['id' => 1])->update();

    $this->session->set_flashdata("success", "Sukses edit data web");
    return redirect(base_url() . "/dashboard/web", "refresh");
  }

  public function web_upload_banner()
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpg|png';

    $this->upload->initialize($config);
    if (!$this->upload->do_upload('banner')) {
      $this->session->set_flashdata("error", $this->upload->display_errors());
      return redirect(base_url() . "/dashboard/web", "refresh");
    }

    $this->web->setData(["banner" => $this->upload->data()['orig_name']])->setWhere(['id' => 1])->update();
    $this->session->set_flashdata("success", "Sukses upload banner");
    return redirect(base_url() . "/dashboard/web", "refresh");
  }

  public function logout()
  {
    $this->session->unset_userdata(["user"]);
    $this->session->set_flashdata("success", "Sukses logout");
    return redirect(base_url() . "/auth", "refresh");
  }
}
