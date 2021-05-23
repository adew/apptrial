<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		$data['token_generate'] = $this->token_generate();
		$this->session->set_userdata($data);
		$this->load->view('login/login', $data);
	}

	public function token_generate()
	{
		return $tokens = md5(uniqid(rand(), true));
	}

	public function register()
	{
		$this->load->view('login/register');
	}

	public function proses_login()
	{
		// $this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			// $username = $this->input->post('username', TRUE);
			$nip = trim($this->input->post('nip', TRUE));
			$password = $this->input->post('password', TRUE);
			$remember = $this->input->post('remember', TRUE);

			if ($this->session->userdata('token_generate') === $this->input->post('token')) {
				$cek =  $this->M_login->cek_user('user', $nip);
				if ($cek->num_rows() != 1) {
					$this->session->set_flashdata('msg', 'Username Belum Terdaftar Silahkan Register Dahulu');
					redirect(base_url());
				} else {

					$isi = $cek->row();
					if (password_verify($password, $isi->password) === TRUE) {
						$data_session = array(
							'id' => $isi->id,
							// 'username' => $username,
							'nama' => $isi->nama,
							'nip' => $isi->nip,
							'jabatan' => $isi->jabatan,
							'unit_kerja' => $isi->unit_kerja,
							'foto_profil' => $isi->foto_profil,
							'status' => 'login',
							'role' => $isi->role,
							'last_login' => $isi->last_login
						);

						$this->session->set_userdata($data_session);

						$this->M_login->edit_user(['nip' => $nip], ['last_login' => date('d-m-Y G:i')]);

						if (!empty($remember)) {
							setcookie("member_nip", $nip, time() + (10 * 365 * 24 * 60 * 60));
							setcookie("member_password", $password, time() + (10 * 365 * 24 * 60 * 60));
						} else {
							if (isset($_COOKIE["member_nip"])) {
								setcookie("member_nip", "");
							}
							if (isset($_COOKIE["member_password"])) {
								setcookie("member_password", "");
							}
						}
						if ($isi->role == 1) {
							redirect(base_url('admin/users'));
						} else if ($isi->role == 0) {
							redirect(base_url('pkp'));
						} else {
							redirect(base_url());
						}
					} else {
						$this->session->set_flashdata('msg', 'Username Dan Password Salah');
						redirect(base_url());
					}
				}
			} else {
				redirect(base_url());
			}
		}
		redirect(base_url());
	}
}
