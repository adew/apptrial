<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('JATAH_CUTI', 12);

class Cuti extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->model('M_cuti');
    $this->load->library('upload');

    if ($this->session->userdata('status') == 'login') {
      return true;
    } else {
      $this->load->view('login/login');
    }
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login') {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $now = date('Y-m-d');
      $query = $this->db->query("SELECT * FROM tb_pengajuan_cuti WHERE tgl_awal <= '" . $now . "' AND tgl_akhir >= '" . $now . "'");

      $data['list_data'] = $query->result();

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

  public function get_data()
  {
    $id = $this->uri->segment(3);

    $data = $this->M_cuti->get_detail($id);

    if ($data) {
      echo json_encode(array('status' => true, 'data' => $data));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function inputdatacuti()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
    $data['data_user'] = $this->M_admin->select('user');

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
    $this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('lama_cuti', 'Lama Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('alamat_cuti', 'Alamat Cuti', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('atasan_langsung', 'Atasan Langsung', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('pejabat_berwenang', 'Pejabat Berwenang', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
      $this->session->set_flashdata('msg_gagal', 'Pengajuan Cuti Gagal dikirim');

      // redirect(base_url('cuti/inputdatacuti'));
      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_data_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $nip       = $this->input->post('nip', TRUE);
      $nama       = $this->input->post('nama', TRUE);
      $masa_kerja       = $this->input->post('masa_kerja', TRUE);
      $nomor_hp       = $this->input->post('nomor_hp', TRUE);
      $tanggal_awal       = $this->input->post('tanggal_awal', TRUE);
      $tanggal_akhir       = $this->input->post('tanggal_akhir', TRUE);
      $lama_cuti       = $this->input->post('lama_cuti', TRUE);
      $jenis_cuti    = $this->input->post('jenis_cuti', TRUE);
      $keterangan       = $this->input->post('keterangan', TRUE);
      $alamat_cuti       = $this->input->post('alamat_cuti', TRUE);
      $atasan_langsung       = $this->input->post('atasan_langsung', TRUE);
      $pejabat_berwenang       = $this->input->post('pejabat_berwenang', TRUE);

      $id = $this->session->userdata('nip');
      $cek_data = $this->M_cuti->sum_cuti_terpakai($id);
      $cuti_terpakai = $cek_data[0]->jumlah;


      if ((JATAH_CUTI - $cuti_terpakai) < $lama_cuti) {
        $this->session->set_flashdata('msg_gagal', 'Maaf jumlah cuti yang anda ajukan melebihi sisa cuti anda saat ini');
        redirect(base_url('cuti/inputdatacuti'));
      }
      $saldo_cuti = JATAH_CUTI -  $lama_cuti;
      if ($cuti_terpakai == 0) {
        $saldo_cuti = JATAH_CUTI -  $lama_cuti;
      } else {
        $saldo_cuti = JATAH_CUTI - ($cuti_terpakai + $lama_cuti);
      }

      $data = array(
        'nip'     => $nip,
        'nama'     => $nama,
        'masa_kerja'     => $masa_kerja,
        'nomor_hp'     => $nomor_hp,
        'tgl_awal'     => $tanggal_awal,
        'tgl_akhir'     => $tanggal_akhir,
        'lama_cuti'     => $lama_cuti,
        'saldo_cuti'     => $saldo_cuti,
        'jenis_cuti'     => $jenis_cuti,
        'keterangan'        => $keterangan,
        'alamat_cuti'        => $alamat_cuti,
        'atasan_langsung'        => $atasan_langsung,
        'pejabat_berwenang'        => $pejabat_berwenang,
        'status_cuti'        => 0,
        'creat_at'        => date('d-m-Y H:i:s'),
      );

      // print_r($data);
      // die;
      $this->M_admin->insert('tb_pengajuan_cuti', $data);

      $this->session->set_flashdata('msg_berhasil', 'Pengajuan Cuti Berhasil dikirim');
      redirect(base_url('cuti/datacuti'));
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
    echo json_encode(array('status' => true));
    // redirect(base_url('cuti/datacuti'));
  }
  public function cutidisetujui()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);

    $data = array(
      'status_cuti'     => 1,
    );
    $this->M_admin->update('tb_pengajuan_cuti', $data, $where);
    echo json_encode(array('status' => true));
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
