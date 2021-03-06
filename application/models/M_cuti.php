<?php

class M_cuti extends CI_Model
{

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function select($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }

  public function sum_cuti_terpakai($id)
  {
    $query = $this->db->query('select sum(lama_cuti) as jumlah from tb_pengajuan_cuti WHERE nip="' . $id . '"');
    return $query->result();
  }

  public function count_cuti_nip($id)
  {
    $query = $this->db->query('select count(*) as jumlah from tb_pengajuan_cuti WHERE (atasan_langsung="' . $id . '" AND status_al=0) OR (pejabat_berwenang="' . $id . '" AND status_pb=0 AND status_al !=0)');
    return $query->row();
  }


  public function get_data_row($tabel, $id)
  {
    $query = $this->db->query("SELECT*FROM $tabel WHERE id = $id");
    return $query->row();
  }

  public function list_data_cuti($nip, $role)
  {
    // $where = '';
    // if ($role == 0) {
    //   $where = 'WHERE i.nip =' . $nip . ' OR (atasan_langsung="' . $nip . '" OR pejabat_berwenang="' . $nip . '")';
    // }
    // } else if ($role == 1) {
    //   $where = 'WHERE i.nip =' . $nip . ' OR (atasan_langsung="' . $nip . '" OR pejabat_berwenang="' . $nip . '")';
    // }

    $where = 'WHERE i.nip =' . $nip . ' OR (atasan_langsung="' . $nip . '" AND status_al=0) OR (pejabat_berwenang="' . $nip . '" AND status_pb=0 AND status_al !=0)';

    $query = $this->db->query("select i.*,a.jabatan,a.unit_kerja, b.nama as nama1, c.nama as nama2
    from tb_pengajuan_cuti i
    left join user a on a.nip = i.nip
    left join user b on b.nip = i.atasan_langsung
    left join user c on c.nip = i.pejabat_berwenang $where");
    return $query->result();
  }

  public function get_detail($id)
  {
    // $query = $this->db->query("SELECT*FROM user u, tb_pengajuan_cuti tpc WHERE u.nip = tpc.nip AND tpc.id = $id");
    $query = $this->db->query("select i.*,a.jabatan,a.unit_kerja, b.nama as nama1, c.nama as nama2
    from tb_pengajuan_cuti i
    left join user a on a.nip = i.nip
    left join user b on b.nip = i.atasan_langsung
    left join user c on c.nip = i.pejabat_berwenang WHERE i.id = $id");
    return $query->row();
  }

  public function get_export_word($id)
  {
    // $query = $this->db->query("SELECT*FROM user u, tb_pengajuan_cuti tpc WHERE u.nip = tpc.nip AND tpc.id = $id");
    $query = $this->db->query("select i.*,a.jabatan,a.unit_kerja, b.nama as nama1, c.nama as nama2
    from tb_pengajuan_cuti i
    left join user a on a.nip = i.nip
    left join user b on b.nip = i.atasan_langsung
    left join user c on c.nip = i.pejabat_berwenang WHERE i.id = $id");
    return $query->row_array();
  }

  public function get_data_array($tabel, $id)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id)
      ->get();
    return $query->row();
  }

  public function get_array($tabel, $id)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id)
      ->get();
    return $query->row_array();
  }

  public function get_data($tabel, $id_transaksi)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id_transaksi)
      ->get();
    return $query->result();
  }

  public function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function delete($tabel, $where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }

  public function mengurangi($tabel, $id_transaksi, $jumlah)
  {
    $this->db->set("jumlah", "jumlah - $jumlah");
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update($tabel);
  }

  public function update_password($tabel, $where, $data)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function get_data_gambar($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where('username_user', $username)
      ->get();
    return $query->result();
  }

  public function sum($tabel, $field)
  {
    $query = $this->db->select_sum($field)
      ->from($tabel)
      ->get();
    return $query->result();
  }

  public function numrows($tabel, $id)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id)
      ->get();
    return $query->num_rows();
  }

  public function kecuali($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where_not_in('username', $username)
      ->get();

    return $query->result();
  }
}
