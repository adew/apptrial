<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('JATAH_CUTI', 12);
require_once './application/libraries/phpword/bootstrap.php';

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
      $nip = $this->session->userdata('nip');
      // $now = date('d-m-Y');
      // $jml = $this->M_cuti->get_data_array('tb_jatah_cuti', 'c_nip=' . $nip);
      // print_r($jml->c_nip);
      // die;

      // print_r("SELECT * FROM tb_pengajuan_cuti WHERE tgl_awal <= '" . $now . "' AND tgl_akhir >= '" . $now . "'");
      // $query = $this->db->query("SELECT * FROM tb_pengajuan_cuti WHERE creat_at LIKE '%" . $now . "%'");
      $query = $this->db->query("SELECT * FROM tb_pengajuan_cuti WHERE nip=$nip");
      $data['list_data'] = $query->result();

      $data['jatah_cuti'] = $this->M_cuti->get_data_array('tb_jatah_cuti', 'c_nip=' . $nip);


      // $where = "c_nip='" . $nip . "' AND c_tahun='2021'";
      // $cek_row = $this->M_cuti->numrows('tb_jatah_cuti', $where);

      $data['title'] = 'PATTIMURA';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/monitoring_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function exportword()
  {
    $id = $this->uri->segment(3);
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $template = $phpWord->loadTemplate('./template.docx');
    // print_r($template);
    // die;
    $data = $this->M_cuti->get_export_word($id);
    $key_jenis_cuti = $data['jenis_cuti'];

    $data['cuti_tahunan'] = '-';
    $data['cuti_besar'] = '-';
    $data['cuti_sakit'] = '-';
    $data['cuti_lahir'] = '-';
    $data['cuti_alpen'] = '-';
    $data['cuti_dtn'] = '-';
    $data[$key_jenis_cuti] = 'V';

    if ($data['status_al'] == 1) {
      $data['setuju_al'] = 'V';
      $data['tidak_setuju_al'] = '-';
    } else {
      $data['setuju_al'] = '-';
      $data['tidak_setuju_al'] = 'V';
    }

    if ($data['status_pb'] == 1) {
      $data['setuju_pb'] = 'V';
      $data['tidak_setuju_pb'] = '-';
    } else {
      $data['setuju_pb'] = '-';
      $data['tidak_setuju_pb'] = 'V';
    }
    // print_r($data);
    // die;


    $filename = 'Cuti-' . $data['nama'] . date('d-m-Y') . '.docx';
    $template->setValues($data);


    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    // header('Content-Type: ' . $mime[$format]);
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    $filename = 'php://output'; // Change filename to force download
    // $template->saveAs($filename, 'Word2007', true);
    $template->saveAs($filename);
    // unlink($filename);
    // exit;

  }


  public function datacuti()
  {
    $role = $this->session->userdata('role');
    $nip = $this->session->userdata('nip');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['list_data'] = $this->M_cuti->list_data_cuti($nip, $role);
    // $data['notif_data'] = $this->M_cuti->count_cuti_nip($this->session->userdata('nip'));
    // print_r($data);
    // die;
    $data['title'] = 'PATTIMURA';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/data_cuti', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function load_jatah_cuti()
  {
    $nip = $this->uri->segment(3);
    $tahun = $this->uri->segment(4);
    // echo ($tahun);
    // die;
    $data = $this->M_cuti->get_data_array('tb_jatah_cuti', "c_nip='" . $nip . "' AND c_tahun='" . $tahun . "'");

    if ($data) {
      echo json_encode(array('status' => true, 'data' => $data));
    } else {
      echo json_encode(array('status' => false, 'data' => $data));
    }
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

  public function notif_cuti()
  {
    $data = $this->M_cuti->count_cuti_nip($this->session->userdata('nip'));
    if ($data) {
      echo json_encode(array('status' => true, 'data' => $data));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  //SALDO CUTI
  public function inputjatahcuti()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
    $data['data_user'] = $this->M_admin->select('user');

    $data['title'] = 'PATTIMURA';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/input_jatah_cuti', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function savejatahcuti()
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('tahun', 'tahun', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_tahunan_pakai', 'cuti_tahunan_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_tahunan_kuota', 'cuti_tahunan_kuota', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_besar_pakai', 'cuti_besar_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_besar_kuota', 'cuti_besar_kuota', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_sakit_pakai', 'cuti_sakit_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_sakit_kuota', 'cuti_sakit_kuota', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_lahir_pakai', 'cuti_lahir_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_lahir_kuota', 'cuti_lahir_kuota', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_alpen_pakai', 'cuti_alpen_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_alpen_kuota', 'cuti_alpen_kuota', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_dtn_pakai', 'cuti_dtn_pakai', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('cuti_dtn_kuota', 'cuti_dtn_kuota', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
      $data['data_user'] = $this->M_admin->select('user');

      echo json_encode(array('status' => false, 'message' => 'Data gagal disimpan'));
      return;

      $data['title'] = 'PATTIMURA';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_jatah_cuti', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $nip       = $this->input->post('nip', TRUE);
      $tahun       = $this->input->post('tahun', TRUE);
      $cuti_tahunan_pakai       = $this->input->post('cuti_tahunan_pakai', TRUE);
      $cuti_tahunan_kuota       = $this->input->post('cuti_tahunan_kuota', TRUE);
      $cuti_besar_pakai       = $this->input->post('cuti_besar_pakai', TRUE);
      $cuti_besar_kuota       = $this->input->post('cuti_besar_kuota', TRUE);
      $cuti_sakit_pakai       = $this->input->post('cuti_sakit_pakai', TRUE);
      $cuti_sakit_kuota    = $this->input->post('cuti_sakit_kuota', TRUE);
      $cuti_lahir_pakai       = $this->input->post('cuti_lahir_pakai', TRUE);
      $cuti_lahir_kuota       = $this->input->post('cuti_lahir_kuota', TRUE);
      $cuti_alpen_pakai       = $this->input->post('cuti_alpen_pakai');
      $cuti_alpen_kuota       = $this->input->post('cuti_alpen_kuota', TRUE);
      $cuti_dtn_pakai       = $this->input->post('cuti_dtn_pakai', TRUE);
      $cuti_dtn_kuota       = $this->input->post('cuti_dtn_kuota', TRUE);

      $data_record = array(
        'c_nip'     => $nip,
        'c_tahun'     => $tahun,
        'c_tahunan_pakai'     => $cuti_tahunan_pakai,
        'c_tahunan_kuota'     => $cuti_tahunan_kuota,
        'c_besar_pakai'     => $cuti_besar_pakai,
        'c_besar_kuota'     => $cuti_besar_kuota,
        'c_sakit_pakai'     => $cuti_sakit_pakai,
        'c_sakit_kuota'     => $cuti_sakit_kuota,
        'c_lahir_pakai'     => $cuti_lahir_pakai,
        'c_lahir_kuota'        => $cuti_lahir_kuota,
        'c_alpen_pakai'        => $cuti_alpen_pakai,
        'c_alpen_kuota'        => $cuti_alpen_kuota,
        'c_dtn_pakai'        => $cuti_dtn_pakai,
        'c_dtn_kuota'        => $cuti_dtn_kuota,
        'creat_at'        => date('d-m-Y H:i:s'),
      );

      $where = "c_nip='" . $nip . "' AND c_tahun='" . $tahun . "'";
      $cek_row = $this->M_cuti->numrows('tb_jatah_cuti', $where);

      // print_r($cek_row);
      // die;

      if ($cek_row == 0) {
        $this->M_admin->insert('tb_jatah_cuti', $data_record);
      } else {
        // $where = array('c_nip' => $nip);
        $this->M_admin->update('tb_jatah_cuti', $data_record, $where);
      }
      echo json_encode(array('status' => true, 'message' => 'Data berhasil disimpan'));
      return;
    }
  }
  //SALDO CUTI

  public function inputdatacuti()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');
    $data['data_user'] = $this->M_admin->select('user');

    $data['title'] = 'PATTIMURA';
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
    // $this->form_validation->set_rules('atasan_langsung', 'Atasan Langsung', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('pejabat_berwenang', 'Pejabat Berwenang', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['jenis_cuti'] = $this->M_admin->select('tb_cuti');

      echo json_encode(array('status' => false, 'message' => 'Data gagal disimpan'));
      return;

      $data['title'] = 'PATTIMURA';
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
      $atasan_langsung       = $this->input->post('atasan_langsung');
      $pejabat_berwenang       = $this->input->post('pejabat_berwenang', TRUE);


      $data = array(
        'nip'     => $nip,
        'nama'     => $nama,
        'masa_kerja'     => $masa_kerja,
        'nomor_hp'     => $nomor_hp,
        'tgl_awal'     => $tanggal_awal,
        'tgl_akhir'     => $tanggal_akhir,
        'lama_cuti'     => $lama_cuti,
        // 'saldo_cuti'     => $saldo_cuti,
        'jenis_cuti'     => $jenis_cuti,
        'keterangan'        => $keterangan,
        'alamat_cuti'        => $alamat_cuti,
        'atasan_langsung'        => $atasan_langsung,
        'pejabat_berwenang'        => $pejabat_berwenang,
        'status_cuti'        => 0,
        'creat_at'        => date('d-m-Y H:i:s'),
      );

      $this->M_admin->insert('tb_pengajuan_cuti', $data);

      $tahun = date('Y', strtotime($tanggal_awal));
      $data_record = array(
        'c_nip'     => $nip,
        'c_tahun'     => $tahun,
        'c_tahunan_pakai'     => 0,
        'c_tahunan_kuota'     => 12,
        'c_besar_pakai'     => 0,
        'c_besar_kuota'     => 90,
        'c_sakit_pakai'     => 0,
        'c_sakit_kuota'     => 14,
        'c_lahir_pakai'     => 0,
        'c_lahir_kuota'        => 90,
        'c_alpen_pakai'        => 0,
        'c_alpen_kuota'        => 30,
        'c_dtn_pakai'        => 0,
        'c_dtn_kuota'        => 90,
        'creat_at'        => date('d-m-Y H:i:s'),
      );

      $where = "c_nip='" . $nip . "' AND c_tahun='" . $tahun . "'";
      $cek_row = $this->M_cuti->numrows('tb_jatah_cuti', $where);

      // print_r($cek_row);
      // die;

      if ($cek_row == 0) {
        $this->M_admin->insert('tb_jatah_cuti', $data_record);
      }

      echo json_encode(array('status' => true, 'message' => 'Data berhasil disimpan'));
      return;
      // $this->session->set_flashdata('msg_berhasil', 'Pengajuan Cuti Berhasil dikirim');
      // redirect(base_url('cuti/datacuti'));
    }
  }

  public function cutiditolak()
  {
    $id = $this->uri->segment(4);
    $pihak = $this->uri->segment(3);
    $where = array('id' => $id);
    if ($pihak == 'al') {
      $data = array(
        'status_al'     => 2,
      );
    } else {
      $data = array(
        'status_pb'     => 2,
      );
    }
    $this->M_admin->update('tb_pengajuan_cuti', $data, $where);
    echo json_encode(array('status' => true, 'pihak' => $pihak));
    // redirect(base_url('cuti/datacuti'));
  }

  public function cutidisetujui()
  {
    $id = $this->uri->segment(4);
    $pihak = $this->uri->segment(3);
    $where = array('id' => $id);

    if ($pihak == 'al') {
      $data = array(
        'status_al'     => 1,
      );
    } else {
      $data = array(
        'status_pb'     => 1,
      );
    }
    $this->M_admin->update('tb_pengajuan_cuti', $data, $where);

    $query = $this->db->query("SELECT * FROM tb_pengajuan_cuti WHERE status_al=1 AND status_pb=1 AND id =$id");
    $row = $query->row();
    if (!empty($row)) {

      //UPDATE DATA JATAH CUTI
      $where = "c_nip='" . $row->nip . "' AND c_tahun='" . date('Y', strtotime($row->tgl_awal)) . "'";
      $jml = $this->M_cuti->get_data_array('tb_jatah_cuti', $where);
      switch ($row->jenis_cuti) {
        case 'cuti_tahunan':
          $data = array(
            'c_tahunan_pakai'     => $jml->c_tahunan_pakai + $row->lama_cuti,
          );
          break;
        case 'cuti_besar':
          $data = array(
            'c_besar_pakai'     => $jml->c_besar_pakai + $row->lama_cuti,
          );
          break;
        case 'cuti_sakit':
          $data = array(
            'c_sakit_pakai'     => $jml->c_sakit_pakai + $row->lama_cuti,
          );
          break;
        case 'cuti_lahir':
          $data = array(
            'c_lahir_pakai'     => $jml->c_lahir_pakai + $row->lama_cuti,
          );
          break;
        case 'cuti_alpen':
          $data = array(
            'c_alpen_pakai'     => $jml->c_alpen_pakai + $row->lama_cuti,
          );
          break;
        case 'cuti_dtn':
          $data = array(
            'c_dtn_pakai'     => $jml->c_dtn_pakai + $row->lama_cuti,
          );
          break;
      }
      $this->M_admin->update('tb_jatah_cuti', $data, $where);
      //UPDATE DATA JATAH CUTI//

    }

    echo json_encode(array('status' => true, 'pihak' => $pihak));
  }

  public function jabatan()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['list_data'] = $this->M_admin->select('tb_jabatan');
      $data['title'] = 'PATTIMURA';
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
      $data['title'] = 'PATTIMURA';
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

      $data['title'] = 'PATTIMURA';
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
      $data['title'] = 'PATTIMURA';
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
      $data['title'] = 'PATTIMURA';
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

      $data['title'] = 'PATTIMURA';
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
