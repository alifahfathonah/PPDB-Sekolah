<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index()
	{
		$sesi = $this->session->userdata('user');
		$data['web'] = (object) $this->web->getAll();
		$data['logged'] = false;

		if ($sesi) {
			$data['logged'] = true;
			$data['role'] = $sesi->role;
		}

		$this->load->view('main/main', $data);
	}
}
