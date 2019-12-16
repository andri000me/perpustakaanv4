<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opac_model extends CI_Model
{
  public function get_gmd()
  {

    $this->db->select('`pp_gmd`.*');
    $this->db->from('pp_gmd');
    $this->db->order_by('pp_gmd.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_bukuall($cariall='',$limit)
  {

    $this->db->select('pp_buku.*,pp_pengarang.nama as pengarang');
    $this->db->from('pp_buku');
    $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
    $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
    $this->db->or_like('pp_buku.judul', $cariall);
    $this->db->or_like('pp_buku.isbn', $cariall);
    $this->db->or_like('pp_pengarang.nama', $cariall);
    $this->db->or_like('pp_penerbit.nama', $cariall);
    return $this->db->get()->result_array();
  }
  public function get_numbukuall($cariall='',$limit)
  {

    $this->db->select('pp_buku.*,pp_pengarang.nama as pengarang,pp_penerbit.nama as penerbit');
    $this->db->from('pp_buku');
    $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
    $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
    $this->db->or_like('pp_buku.judul', $cariall);
    $this->db->or_like('pp_buku.isbn', $cariall);
    $this->db->or_like('pp_pengarang.nama', $cariall);
    $this->db->or_like('pp_penerbit.nama', $cariall);
    return $this->db->get()->num_rows();
  }

  public function get_detailbuku($id)
  {

    $this->db->select('`pp_buku`.*');
    $this->db->from('pp_buku');
    $this->db->where('pp_buku.id',$id);
    return $this->db->get()->row_array();
  }
    //end
}