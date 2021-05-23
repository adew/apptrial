<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
    if ($this->session->userdata('status') == 'login') {
      return true;
    } else {
      $this->load->view('login/login');
    }
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      redirect(base_url('admin/users'));
    } else if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 0) {
      redirect(base_url('pkp'));
    } else {
      $this->load->view('login/login');
    }
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
        redirect(base_url('pkp/datapkp'));
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
      // $this->load->view('admin/profile', $data);
      redirect(base_url('admin/profile'));
    } else {
      $upload_data = $this->upload->data();
      $nama_file = $upload_data['file_name'];
      // $ukuran_file = $upload_data['file_size'];

      //resize img + thumb Img -- Optional
      $config['image_library']     = 'gd2';
      $config['source_image']      = $upload_data['full_path'];
      $config['create_thumb']      = false;
      $config['maintain_ratio']    = TRUE;
      $config['width']             = 150;
      $config['height']            = 150;

      $this->load->library('image_lib', $config);
      $this->image_lib->initialize($config);
      if (!$this->image_lib->resize()) {
        // $data['pesan_error'] = $this->image_lib->display_errors();
        $this->session->set_flashdata('msg_gagal', $this->image_lib->display_errors());
        // $this->load->view('admin/profile', $data)
        redirect(base_url('admin/profile'));
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
      // $this->load->view('admin/profile');
      redirect(base_url('admin/profile'));
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
    $data['list_users'] = $this->M_admin->kecuali('user', $this->session->userdata('nip'));

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
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Wajib diisi'));

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
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Wajib diisi'));
    $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required', array('required' => 'Wajib diisi'));

    if ($this->form_validation->run() == FALSE) {

      $data['avatar'] = $this->session->userdata('foto_profil');
      $data['token_generate'] = $this->token_generate();
      $data['list_data'] = $this->M_admin->get_data('user', $this->session->userdata('nip'));

      $data['title'] = 'DILMIL III-18 Ambon';
      $this->load->view('admin/template/adm_header', $data);
      $this->load->view('admin/template/adm_navbar', $data);
      $this->load->view('admin/template/adm_sidebar', $data);
      $this->load->view('admin/form_users/form_update', $data);
      $this->load->view('admin/template/adm_footer', $data);
      $this->session->set_flashdata('msg_gagal', 'Data user gagal diupdate');
    } else {
      $nama     = $this->input->post('nama', TRUE);
      $nip    = trim($this->input->post('nip', TRUE));
      $jabatan    = $this->input->post('jabatan', TRUE);
      $unit_kerja    = $this->input->post('unit_kerja', TRUE);
      $role         = $this->input->post('role', TRUE);

      $where = array('nip' => $nip);
      $data = array(
        'nama'     => $nama,
        // 'nip'     => $nip,
        'jabatan'     => $jabatan,
        'unit_kerja'     => $unit_kerja,
        'role'         => $role,
      );

      $this->M_admin->update('user', $data, $where);

      $this->session->set_flashdata('msg_berhasil', 'User Berhasil Diupdate');
      redirect(base_url('admin/users'));
    }
  }
}
