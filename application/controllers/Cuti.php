<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->model('M_cuti');
    $this->load->library('upload');
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');

      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/monitoring_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function datacuti()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['list_data'] = $this->M_admin->select('tb_pkp');

    $data['title'] = 'DILMIL III-18 Ambon';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/data_cuti', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function inputdatacuti()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');

    $data['title'] = 'DILMIL III-18 Ambon';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/input_data_cuti', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function satker()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/satker_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function inputsatker()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_satker_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }
  public function jabatan()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['list_data'] = $this->M_admin->select('tb_jabatan');
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/jabatan_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function inputjabatan()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['token_generate'] = $this->token_generate();
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_jabatan_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function saveinputjabatan()
  {
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['token_generate'] = $this->token_generate();
      $data['avatar'] = $this->session->userdata('foto_profil');

      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_jabatan_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $jabatan    = $this->input->post('jabatan', TRUE);
      $deskripsi       = $this->input->post('deskripsi', TRUE);


      $data = array(
        'jabatan'     => $jabatan,
        'deskripsi'        => $deskripsi,
      );
      $this->M_admin->insert('tb_jabatan', $data);

      $this->session->set_flashdata('msg_berhasil', 'Jabatan Berhasil Ditambahkan');
      redirect(base_url('cuti/jabatan'));
    }
  }

  public function proses_delete_jabatan()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('tb_jabatan', $where);
    $this->session->set_flashdata('msg_berhasil', 'User Behasil Di Delete');
    redirect(base_url('cuti/jabatan'));
  }


  public function variabelcuti()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['list_data'] = $this->M_admin->select('tb_cuti');
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/variabel_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }
  public function inputvariabelcuti()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['token_generate'] = $this->token_generate();
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_variabel_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function savejeniscuti()
  {
    $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['token_generate'] = $this->token_generate();
      $data['avatar'] = $this->session->userdata('foto_profil');

      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_variabel_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $jenis_cuti    = $this->input->post('jenis_cuti', TRUE);
      $deskripsi       = $this->input->post('deskripsi', TRUE);


      $data = array(
        'jenis_cuti'     => $jenis_cuti,
        'deskripsi'        => $deskripsi,
      );
      $this->M_admin->insert('tb_cuti', $data);

      $this->session->set_flashdata('msg_berhasil', 'Jabatan Berhasil Ditambahkan');
      redirect(base_url('cuti/variabelcuti'));
    }
  }

  public function proses_delete_jeniscuti()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('tb_cuti', $where);
    $this->session->set_flashdata('msg_berhasil', 'User Behasil Di Delete');
    redirect(base_url('cuti/variabelcuti'));
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }
}
