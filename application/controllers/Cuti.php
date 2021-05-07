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
    $data['list_data'] = $this->M_admin->select('tb_pengajuan_cuti');

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

  public function pengajuancuti()
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('lama_cuti', 'Lama Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
      $this->session->set_flashdata('msg_gagal', 'Pengajuan Cuti Gagal dikirim');

      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_data_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $nip       = $this->input->post('nip', TRUE);
      $nama       = $this->input->post('nama', TRUE);
      $tanggal_awal       = $this->input->post('tanggal_awal', TRUE);
      $tanggal_akhir       = $this->input->post('tanggal_akhir', TRUE);
      $lama_cuti       = $this->input->post('lama_cuti', TRUE);
      $jenis_cuti    = $this->input->post('jenis_cuti', TRUE);
      $keterangan       = $this->input->post('keterangan', TRUE);

      $id = $this->session->userdata('nip');
      $cek_data = $this->M_admin->cek_data('tb_pengajuan_cuti', 'nip', $id);
      $jumlah = $cek_data->result_array();

      if (!$cek_data->row()) {
        $saldo_cuti = 12;
      } else {
        $saldo_cuti = 12 - $cek_data->num_rows();
      }
      $data = array(
        'nip'     => $nip,
        'nama'     => $nama,
        'tgl_awal'     => $tanggal_awal,
        'tgl_akhir'     => $tanggal_akhir,
        'lama_cuti'     => $lama_cuti,
        'saldo_cuti'     => $saldo_cuti,
        'jenis_cuti'     => $jenis_cuti,
        'keterangan'        => $keterangan,
        'status_cuti'        => 0,
        'creat_at'        => date('d-m-Y'),
      );
      $this->M_admin->insert('tb_pengajuan_cuti', $data);

      $this->session->set_flashdata('msg_berhasil', 'Pengajuan Cuti Berhasil dikirim');
      redirect(base_url('cuti/inputdatacuti'));
    }
  }

  public function cutiditolak()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);

    $data = array(
      'status_cuti'     => 2,
    );
    $this->M_admin->update('tb_pengajuan_cuti', $data, $where);
    $this->session->set_flashdata('msg_berhasil', 'Data Berhasil Diupdate');
    redirect(base_url('cuti/datacuti'));
  }
  public function cutidisetujui()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);

    $data = array(
      'status_cuti'     => 1,
    );
    $this->M_admin->update('tb_pengajuan_cuti', $data, $where);
    $this->session->set_flashdata('msg_berhasil', 'Data Berhasil Diupdate');
    redirect(base_url('cuti/datacuti'));
  }



  //// DATA TIDAK TERPAKAI

  // public function satker()
  // {
  //   if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
  //     $data['avatar'] = $this->session->userdata('foto_profil');
  //     $data['active'] = '';
  //     $data['title'] = 'DILMIL III-18 Ambon';
  //     $this->load->view('admin/template/adm_header', $data);
  //     $this->load->view('admin/template/adm_navbar', $data);
  //     $this->load->view('admin/template/adm_sidebar', $data);
  //     $this->load->view('admin/satker_cuti', $data);
  //     $this->load->view('admin/template/adm_footer', $data);
  //   } else {
  //     $this->load->view('login/login');
  //   }
  // }

  // public function inputsatker()
  // {
  //   if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
  //     $data['avatar'] = $this->session->userdata('foto_profil');
  //     $data['active'] = '';
  //     $data['title'] = 'DILMIL III-18 Ambon';
  //     $this->load->view('admin/template/adm_header', $data);
  //     $this->load->view('admin/template/adm_navbar', $data);
  //     $this->load->view('admin/template/adm_sidebar', $data);
  //     $this->load->view('admin/input_satker_cuti', $data);
  //     $this->load->view('admin/template/adm_footer', $data);
  //   } else {
  //     $this->load->view('login/login');
  //   }
  // }
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
