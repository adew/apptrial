<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->session->userdata('foto_profil');

      $data['list_data'] = $this->M_admin->select('user');
      $data['active'] = '';
      $data['title'] = 'DILMIL III-18 Ambon';
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
    $where = array('nip' => $id);
    $data['data_user'] = $this->M_admin->get_data('user', $where);
    $data['data_pkp'] = $this->M_admin->get_data('tb_pkp', $where);

    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->session->set_userdata($data);

    $data['title'] = 'DILMIL III-18 Ambon';
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
    echo json_encode($json_data);
  }

  public function datapkp()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['list_data'] = $this->M_admin->select('tb_pkp');

    $data['title'] = 'DILMIL III-18 Ambon';
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

    $data['title'] = 'DILMIL III-18 Ambon';
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

      $data['title'] = 'DILMIL III-18 Ambon';
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

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ($this->upload->do_upload('file_pkp')) {
        // print_r($this->upload->display_errors());
        // die;
        $fileData = $this->upload->data();
        $nip    = trim($this->input->post('nip', TRUE));
        $bulan    = $this->input->post('bulan', TRUE);
        $skor    = $this->input->post('skor', TRUE);

        $data = array(
          'nip'     => $nip,
          'bulan'     => $bulan,
          'file_pkp'     => $fileData['file_name'],
          'skor'     => $skor,
          'creat_at'     => date('d-m-Y'),
        );

        if ($this->M_admin->insert('tb_pkp', $data)) {
          $this->session->set_flashdata('success', '<pre>Selamat! Anda berhasil mengunggah file <strong>' . $fileData['file_name'] . '</strong></pre>');
        } else {
          $this->session->set_flashdata('error', '<p>Gagal! File ' . $fileData['file_name'] . ' tidak berhasil tersimpan di database anda</p>');
        }
        redirect(base_url('admin/datapkp'));
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('admin/inputdatapkp'));
      }
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

  ####################################
  // Profile
  ####################################

  public function profile()
  {
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->session->userdata('foto_profil');
    // $this->session->set_userdata($data);

    $data['title'] = 'DILMIL III-18 Ambon';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/profile', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('nip', 'nip', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      $nip = $this->input->post('nip');
      $nama = $this->input->post('nama');
      $new_password = $this->input->post('new_password');

      $data = array(
        'nip'    => $nip,
        'nama'    => $nama,
        'password' => $this->hash_password($new_password)
      );

      $where = array(
        'id' => $this->session->userdata('id')
      );

      $this->M_admin->update_password('user', $where, $data);

      $this->session->set_flashdata('msg_berhasil', 'Password Telah Diganti');
      // redirect(base_url('admin/users'));
      $this->load->view('admin/profile');
    } else {

      $this->session->set_flashdata('msg_gagal', 'Password Gagal Diganti');
      $this->load->view('admin/profile');
    }
  }

  public function proses_gambar_upload()
  {
    $data = "";
    $config =  array(

      'upload_path'     =>  './uploads/profile/',
      // 'upload_path'     => "./assets/upload/user/img/",
      'allowed_types'   => "gif|jpg|png|jpeg",
      'encrypt_name'    => False, //
      'max_size'        => "50000",  // ukuran file gambar
      'max_height'      => "9680",
      'max_width'       => "9024"
    );
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('userpicture')) {
      $this->session->set_flashdata('msg_gagal', $this->upload->display_errors());
      $this->load->view('admin/profile', $data);
    } else {
      $upload_data = $this->upload->data();
      $nama_file = $upload_data['file_name'];
      // $ukuran_file = $upload_data['file_size'];

      //resize img + thumb Img -- Optional
      $config['image_library']     = 'gd2';
      $config['source_image']      = $upload_data['full_path'];
      $config['create_thumb']      = FALSE;
      $config['maintain_ratio']    = TRUE;
      $config['width']             = 150;
      $config['height']            = 150;

      $this->load->library('image_lib', $config);
      $this->image_lib->initialize($config);
      if (!$this->image_lib->resize()) {
        // $data['pesan_error'] = $this->image_lib->display_errors();
        $this->session->set_flashdata('msg_gagal', $this->image_lib->display_errors());
        $this->load->view('admin/profile', $data);
      }

      //Hapus file foto
      unlink('./uploads/profile/' . $this->session->userdata('foto_profil'));

      $where = array(
        'nip' => $this->session->userdata('nip')
      );

      $data = array(
        'foto_profil' => $nama_file
      );
      $this->session->set_userdata($data);
      $this->M_admin->update('user', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Gambar Berhasil Di Upload');
      $this->load->view('admin/profile');
      // redirect(base_url('admin/profile'));
    }
  }

  ####################################
  // End Profile
  ####################################



  ####################################
  // Users
  ####################################
  public function users()
  {
    $data['title'] = 'DILMIL III-18 Ambon';
    $data['list_users'] = $this->M_admin->kecuali('user', $this->session->userdata('name'));

    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->session->set_userdata($data);
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/users', $data);
  }

  public function form_user()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $data['title'] = 'DILMIL III-18 Ambon';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/form_users/form_insert', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function update_user()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('user', $where);
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->session->set_userdata($data);
    $data['title'] = 'DILMIL III-18 Ambon';
    $this->load->view('admin/template/adm_header', $data);
    $this->load->view('admin/template/adm_navbar', $data);
    $this->load->view('admin/template/adm_sidebar', $data);
    $this->load->view('admin/form_users/form_update', $data);
    $this->load->view('admin/template/adm_footer', $data);
  }

  public function proses_delete_user()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('user', $where);
    $this->session->set_flashdata('msg_berhasil', 'User Behasil Di Delete');
    redirect(base_url('admin/users'));
  }

  public function proses_tambah_user()
  {
    // $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required', array('required' => 'Wajib diisi'));
    // $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Wajib diisi', 'valid_email' => 'Penulisan email salah'));
    $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Wajib diisi'));
    // $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {
      $data['token_generate'] = $this->token_generate();
      $data['avatar'] = $this->session->userdata('foto_profil');

      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/form_users/form_insert', $data);
      $this->load->view('admin/template/adm_footer', $data);
    } else {
      // $username     = $this->input->post('username', TRUE);
      $nama     = $this->input->post('nama', TRUE);
      $nip    = trim($this->input->post('nip', TRUE));
      $jabatan    = $this->input->post('jabatan', TRUE);
      $unit_kerja    = $this->input->post('unit_kerja', TRUE);
      // $email        = $this->input->post('email', TRUE);
      $password     = $this->input->post('password', TRUE);
      $role         = $this->input->post('role', TRUE);

      $data = array(
        // 'username'     => $username,
        'nama'     => $nama,
        'nip'     => $nip,
        'jabatan'     => $jabatan,
        'unit_kerja'     => $unit_kerja,
        'foto_profil'     => 'nopic.png',
        // 'email'        => $email,
        'password'     => $this->hash_password($password),
        'role'         => $role,
      );
      // die($nip);
      $this->M_admin->insert('user', $data);

      $this->session->set_flashdata('msg_berhasil', 'User Berhasil Ditambahkan');
      redirect(base_url('admin/users'));
    }
  }

  public function proses_update_user()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $id           = $this->input->post('id', TRUE);
        $username     = $this->input->post('username', TRUE);
        $email        = $this->input->post('email', TRUE);
        $role         = $this->input->post('role', TRUE);

        $where = array('id' => $id);
        $data = array(
          'username'     => $username,
          'email'        => $email,
          'role'         => $role,
        );
        $this->M_admin->update('user', $data, $where);
        $this->session->set_flashdata('msg_berhasil', 'Data User Berhasil Diupdate');
        redirect(base_url('admin/users'));
      }
    } else {
      $this->load->view('admin/form_users/form_update');
    }
  }


  ####################################
  // End Users
  ####################################


































  ####################################
  // DATA BARANG MASUK
  ####################################

  public function form_barangmasuk()
  {
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/form_barangmasuk/form_insert', $data);
  }

  public function tabel_barangmasuk()
  {
    $data = array(
      'list_data' => $this->M_admin->select('tb_barang_masuk'),
      'avatar'    => $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'))
    );
    $this->load->view('admin/tabel/tabel_barangmasuk', $data);
  }

  public function update_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $data['data_barang_update'] = $this->M_admin->get_data('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/form_barangmasuk/form_update', $data);
  }

  public function delete_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $this->M_admin->delete('tb_barang_masuk', $where);
    redirect(base_url('admin/tabel_barangmasuk'));
  }



  public function proses_databarang_masuk_insert()
  {
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id_transaksi = $this->input->post('id_transaksi', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $lokasi       = $this->input->post('lokasi', TRUE);
      $kode_barang  = $this->input->post('kode_barang', TRUE);
      $nama_barang  = $this->input->post('nama_barang', TRUE);
      $satuan       = $this->input->post('satuan', TRUE);
      $jumlah       = $this->input->post('jumlah', TRUE);

      $data = array(
        'id_transaksi' => $id_transaksi,
        'tanggal'      => $tanggal,
        'lokasi'       => $lokasi,
        'kode_barang'  => $kode_barang,
        'nama_barang'  => $nama_barang,
        'satuan'       => $satuan,
        'jumlah'       => $jumlah
      );
      $this->M_admin->insert('tb_barang_masuk', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Ditambahkan');
      redirect(base_url('admin/form_barangmasuk'));
    } else {
      $data['list_satuan'] = $this->M_admin->select('tb_satuan');
      $this->load->view('admin/form_barangmasuk/form_insert', $data);
    }
  }

  public function proses_databarang_masuk_update()
  {
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id_transaksi = $this->input->post('id_transaksi', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $lokasi       = $this->input->post('lokasi', TRUE);
      $kode_barang  = $this->input->post('kode_barang', TRUE);
      $nama_barang  = $this->input->post('nama_barang', TRUE);
      $satuan       = $this->input->post('satuan', TRUE);
      $jumlah       = $this->input->post('jumlah', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data = array(
        'id_transaksi' => $id_transaksi,
        'tanggal'      => $tanggal,
        'lokasi'       => $lokasi,
        'kode_barang'  => $kode_barang,
        'nama_barang'  => $nama_barang,
        'satuan'       => $satuan,
        'jumlah'       => $jumlah
      );
      $this->M_admin->update('tb_barang_masuk', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Diupdate');
      redirect(base_url('admin/tabel_barangmasuk'));
    } else {
      $this->load->view('admin/form_barangmasuk/form_update');
    }
  }
  ####################################
  // END DATA BARANG MASUK
  ####################################


  ####################################
  // SATUAN
  ####################################

  public function form_satuan()
  {
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/form_satuan/form_insert', $data);
  }

  public function tabel_satuan()
  {
    $data['list_data'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/tabel/tabel_satuan', $data);
  }

  public function update_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_satuan' => $uri);
    $data['data_satuan'] = $this->M_admin->get_data('tb_satuan', $where);
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/form_satuan/form_update', $data);
  }

  public function delete_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_satuan' => $uri);
    $this->M_admin->delete('tb_satuan', $where);
    redirect(base_url('admin/tabel_satuan'));
  }

  public function proses_satuan_insert()
  {
    $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $kode_satuan = $this->input->post('kode_satuan', TRUE);
      $nama_satuan = $this->input->post('nama_satuan', TRUE);

      $data = array(
        'kode_satuan' => $kode_satuan,
        'nama_satuan' => $nama_satuan
      );
      $this->M_admin->insert('tb_satuan', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data satuan Berhasil Ditambahkan');
      redirect(base_url('admin/form_satuan'));
    } else {
      $this->load->view('admin/form_satuan/form_insert');
    }
  }

  public function proses_satuan_update()
  {
    $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $id_satuan   = $this->input->post('id_satuan', TRUE);
      $kode_satuan = $this->input->post('kode_satuan', TRUE);
      $nama_satuan = $this->input->post('nama_satuan', TRUE);

      $where = array(
        'id_satuan' => $id_satuan
      );

      $data = array(
        'kode_satuan' => $kode_satuan,
        'nama_satuan' => $nama_satuan
      );
      $this->M_admin->update('tb_satuan', $data, $where);

      $this->session->set_flashdata('msg_berhasil', 'Data satuan Berhasil Di Update');
      redirect(base_url('admin/tabel_satuan'));
    } else {
      $this->load->view('admin/form_satuan/form_update');
    }
  }

  ####################################
  // END SATUAN
  ####################################


  ####################################
  // DATA MASUK KE DATA KELUAR
  ####################################

  public function barang_keluar()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_transaksi' => $uri);
    $data['list_data'] = $this->M_admin->get_data('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/perpindahan_barang/form_update', $data);
  }

  public function proses_data_keluar()
  {
    $id_transaksi = '';
    $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'trim|required');
    if ($this->form_validation->run() === TRUE) {
      $id_transaksi   = $this->input->post('id_transaksi', TRUE);
      $tanggal_masuk  = $this->input->post('tanggal', TRUE);
      $tanggal_keluar = $this->input->post('tanggal_keluar', TRUE);
      $lokasi         = $this->input->post('lokasi', TRUE);
      $kode_barang    = $this->input->post('kode_barang', TRUE);
      $nama_barang    = $this->input->post('nama_barang', TRUE);
      $satuan         = $this->input->post('satuan', TRUE);
      $jumlah         = $this->input->post('jumlah', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data = array(
        'id_transaksi' => $id_transaksi,
        'tanggal_masuk' => $tanggal_masuk,
        'tanggal_keluar' => $tanggal_keluar,
        'lokasi' => $lokasi,
        'kode_barang' => $kode_barang,
        'nama_barang' => $nama_barang,
        'satuan' => $satuan,
        'jumlah' => $jumlah
      );
      $this->M_admin->insert('tb_barang_keluar', $data);
      $this->session->set_flashdata('msg_berhasil_keluar', 'Data Berhasil Keluar');
      redirect(base_url('admin/tabel_barangmasuk'));
    } else {
      $this->load->view('perpindahan_barang/form_update/' . $id_transaksi);
    }
  }
  ####################################
  // END DATA MASUK KE DATA KELUAR
  ####################################


  ####################################
  // DATA BARANG KELUAR
  ####################################

  public function tabel_barangkeluar()
  {
    $data = "";
    $data['list_data'] = $this->M_admin->select('tb_barang_keluar');
    $data['avatar'] = $this->session->userdata('foto_profil');
    $this->load->view('admin/tabel/tabel_barangkeluar', $data);
  }
}
