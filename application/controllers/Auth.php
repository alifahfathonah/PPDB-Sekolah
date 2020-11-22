<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$userdata = $this->session->userdata("user");
		if ($userdata) {
			if ($userdata->role !== 0) {
				redirect(base_url() . "dashboard/index", "refresh");
			} else {
				redirect(base_url() . "user/index", "refresh");
			}
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function loginAction()
	{
		if ($_SERVER['REQUEST_METHOD'] !== "POST") {
			$this->session->set_flashdata("error", "Bad Request!");
			return redirect(base_url() . "auth/masuk", "refresh");
		}

		$input = (object) $this->input->post();
		$checkUser = $this->users->check(["username" => $input->username]);
		if (!$checkUser) {
			$this->session->set_flashdata("error", "Nama Pengguna atau Kata Sandi salah");
			return redirect(base_url() . "auth/masuk", "refresh");
		}

		if ($checkUser->password !== md5($input->password)) {
			$this->session->set_flashdata("error", "Nama Pengguna atau Kata Sandi salah");
			return redirect(base_url() . "auth/masuk", "refresh");
		}

		unset($checkUser->password);
		$this->session->set_userdata(["user" => $checkUser]);

		if ($checkUser->role == 0) redirect(base_url() . "siswa", "refresh");
		else redirect(base_url() . "dashboard", "refresh");
	}

	public function loginView()
	{
		$data['web'] = (object) $this->web->getAll();

		$this->load->view('auth/login', $data);
	}

	public function registerAction()
	{
		if ($_SERVER['REQUEST_METHOD'] !== "POST") {
			$this->session->set_flashdata("error", "Bad Request!");
			return redirect(base_url() . "auth/daftar", "refresh");
		}

		$input = (object) $this->input->post();
		$checkUser = $this->users->check(["username" => $input->username]);
		$checkEmail = $this->users->check(["email" => $input->email]);

		if ($checkUser !== null) {
			$this->session->set_flashdata("error", "Nama Pengguna telah digunakan");
			return redirect(base_url() . "auth/daftar", "refresh");
		} else if ($checkEmail !== null) {
			$this->session->set_flashdata("error", "Alamat Email telah digunakan");
			return redirect(base_url() . "auth/daftar", "refresh");
		}

		$nilaiData = [
			"matematika" => $input->mtk,
			"inggris" => $input->ing,
			"indonesia" => $input->ind,
			"ipa" => $input->ipa,
			"total" => intval($input->mtk) + intval($input->ing) + intval($input->ind) + intval($input->ipa),
		];

		$id_nilai = $this->nilai
			->setData($nilaiData)
			->insert();

		$userData = [
			"nama" => $input->nama,
			"username" => $input->username,
			"email" => $input->email,
			"password" => md5($input->password),
			"id_nilai" => $id_nilai,
			"id_jurusan" => $input->jurusan,
			"nama" => $input->nama,
			"tanggal_daftar" => date("Y-m-d h:i:s", time())
		];

		$this->users
			->setData($userData)
			->insert();

		$this->session->set_flashdata("success", "Pendaftaran Berhasil");
		return redirect(base_url() . "auth/masuk", "refresh");
	}

	public function registerView()
	{
		$data['jurusan'] = $this->jurusan->getAll();
		$data['web'] = (object) $this->web->getAll();

		$this->load->view('auth/register', $data);
	}
}
