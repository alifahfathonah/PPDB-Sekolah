<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  protected $sesi;
  protected $info;

  function __construct()
  {
    parent::__construct();
    $this->sesi = $this->session->userdata('user');
    if (!$this->sesi) return redirect(base_url() . "auth/masuk", 'refresh');
    $this->info = (object) $this->users->setWhere(["a.id" => $this->sesi->id])->getOne();
    if ($this->sesi->role != 0) return redirect(base_url() . "dashboard/index", 'refresh');
  }

  public function index()
  {
    $data['userdata'] = $this->info;

    $this->load->view('dashboard/users/main', $data);
  }

  public function list()
  {
    $data['userdata'] = $this->info;
    $data['user'] = $this->users
      ->setWhere(["a.status" => "lolos", "b.nama" => $this->info->kelas, "d.nama" => $this->info->grade, "e.nama" => $this->info->jurusan])
      ->get(null, null, "a.nama ASC");

    $this->load->view('dashboard/users/list_siswa', $data);
  }

  public function jadwal()
  {
    if ($this->info->role === 0) return redirect(base_url("/dashboard"));
    $data['userdata'] = $this->info;
    $data['jadwal'] = $this->jadwal
      ->setWhere(["d.nama" => $this->info->kelas, "e.nama" => $this->info->grade, "f.nama" => $this->info->jurusan])
      ->get();

    $this->load->view('dashboard/users/jadwal_siswa', $data);
  }

  public function logout()
  {
    $this->session->unset_userdata(["user"]);
    $this->session->set_flashdata("success", "Sukses logout");
    return redirect(base_url() . "/auth", "refresh");
  }
}
