<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login') {
      redirect(base_url('user/profile'));
    } else {
      $this->load->view('login/login');
    }
  }
  ####################################
  // Profile
  ####################################

  public function profile()
  {
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->session->userdata('foto_profil');
    // $this->session->set_userdata($data);

    $data['title'] = 'PATTIMURA';
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
}
