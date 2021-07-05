<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkp extends CI_Controller
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

      $data['list_data'] = $this->M_admin->select('user');
      $data['active'] = '';
      $data['title'] = 'PATTIMURA';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/dashboard', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function details()
  {
    $id = $this->uri->segment(3);

    //MOITORING PKP
    $where = array('nip' => $id);
    $data['data_user'] = $this->M_admin->get_data('user', $where);
    $data['data_pkp'] = $this->M_admin->get_data('tb_pkp', $where);

    //MOITORING CUTI
    $query = $this->db->query("SELECT * FROM tb_pengajuan_cuti WHERE nip=$id");
    $data['list_data'] = $query->result();
    $data['jatah_cuti'] = $this->M_cuti->get_data_array('tb_jatah_cuti', 'c_nip=' . $id);

    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->session->set_userdata($data);

    $data['title'] = 'PATTIMURA';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/dashboard_details', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function get_data()
  {
    $id = $this->uri->segment(3);
    $where = array('nip' => $id);
    $data_pkp = $this->M_admin->get_data_array('tb_pkp', $where);
    $json_data = array();
    if (!empty($data_pkp)) {
      foreach ($data_pkp as $key => $rec) {
        $json_array['label'] = date('Y') . '-' . $rec['bulan'];
        $json_array['skor'] = (int)$rec['skor'];
        $key++;
        array_push($json_data, $json_array);
      }
      for ($x = $key; $x <= 12; $x++) {
        $json_array['label'] = date('Y') . '-' . $x;
        $json_array['skor'] = 0;
        $key++;
        array_push($json_data, $json_array);
      }
      // echo json_encode($json_data);
      echo json_encode(array('status' => true, 'data' => $json_data));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function datapkp()
  {
    $where = array('nip' => $this->session->userdata('nip'));
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['list_data'] = $this->M_admin->get_data('tb_pkp', $where);
    $data['alert'] = 'success';

    $data['title'] = 'PATTIMURA';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/data_pkp', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function inputdatapkp()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['nip'] = $this->session->userdata('nip');

    $data['bulan'] = $this->load_bulan();

    $data['title'] = 'PATTIMURA';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/input_data_pkp', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function load_bulan()
  {
    $data = array(
      '01' => 'JANUARI',
      '02' => 'FEBRUARI',
      '03' => 'MARET',
      '04' => 'APRIL',
      '05' => 'MEI',
      '06' => 'JUNI',
      '07' => 'JULI',
      '08' => 'AGUSTUS',
      '09' => 'SEPTEMBER',
      '10' => 'OKTOBER',
      '11' => 'NOVEMBER',
      '12' => 'DESEMBER',
    );
    return $data;
  }

  public function savedatapkp()
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('bulan', 'Bulan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('skor', 'Skor', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {
      $data['token_generate'] = $this->token_generate();
      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['nip'] = $this->session->userdata('nip');
      $data['bulan'] = $this->load_bulan();

      $data['title'] = 'PATTIMURA';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/input_data_pkp', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {

      $temp = explode(".", $_FILES["file_pkp"]["name"]);
      $newfilename = substr($this->session->userdata('nama'), 0, 7) . date('d-m-Y_his') . '.' . end($temp);
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = '*';
      $config['max_size'] = 3000;
      $config['file_name'] = $newfilename;

      if (end($temp) != 'xlsx') {
        redirect(base_url('pkp/inputdatapkp'));
      }

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('file_pkp')) {

        $fileData = $this->upload->data();
        $nip    = trim($this->input->post('nip', TRUE));
        $bulan    = $this->input->post('bulan', TRUE);
        $skor    = $this->input->post('skor', TRUE);

        $data = array(
          'nip'     => $nip,
          'bulan'     => $bulan,
          'file_pkp'     => $fileData['file_name'],
          'skor'     => $skor,
          'creat_at'     => date('d-m-Y H:i:s'),
        );

        if ($this->M_admin->insert('tb_pkp', $data)) {
          $this->session->set_flashdata('success', '<pre>Selamat! Anda berhasil mengunggah file <strong>' . $fileData['file_name'] . '</strong></pre>');
        } else {
          $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan di database anda</p>');
        }
        redirect(base_url('pkp/datapkp'));
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('pkp/inputdatapkp'));
      }
    }
  }

  public function proses_delete_pkp()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);

    $data = $this->M_admin->get_data_row('tb_pkp', $id);

    $path = './uploads/' . $data->file_pkp;
    chown($path, 666);
    if (unlink($path)) {
      $this->M_admin->delete('tb_pkp', $where);
      echo json_encode(array('status' => true));
    } else {
      echo json_encode(array('status' => false));
    }
  }

  public function single_upload($field_name, $conf = array())
  {
    $upload_path = FCPATH . $conf['upload_path'];
    if (!is_dir($upload_path))
      mkdir($upload_path, 0777, true);

    $config = array(
      'upload_path' => $upload_path,
      'allowed_types' => $conf['allowed_types'],
      'max_size' => 0,
      'encrypt_name' => true,
      'file_name' => $conf['file_name'],

    );
    $this->upload->initialize($config);
    if ($this->upload->do_upload($field_name)) {
      $data = $this->upload->data();
      chmod($data['full_path'], 0777);

      return $data['file_name'];
    }
  }

  public function sigout()
  {
    session_destroy();
    redirect('login');
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
