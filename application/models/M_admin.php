<?php

class M_admin extends CI_Model
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

  public function cek_data($tabel, $column, $id)
  {
    return  $this->db->select_sum('lama_cuti')
      ->from($tabel)
      ->where($column, $id)
      ->get();
  }

  public function get_data_array($tabel, $nip)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($nip)
      ->get();
    return $query->result_array();
  }

  public function get_data($tabel, $nip)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($nip)
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

  public function update_password($tabel, $where, $data)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function get_data_row($tabel, $id)
  {
    $query = $this->db->query("SELECT*FROM $tabel WHERE id = $id");
    return $query->row();
  }

  public function sum($tabel, $field)
  {
    $query = $this->db->select_sum($field)
      ->from($tabel)
      ->get();
    return $query->result();
  }

  public function numrows($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->get();
    return $query->num_rows();
  }

  public function kecuali($tabel, $nip)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where_not_in('nip', $nip)
      ->get();

    return $query->result();
  }
}
