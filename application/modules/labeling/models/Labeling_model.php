<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Labeling_model extends CI_Model
{

public function get_eksemplar()
{

  $this->db->select('`pp_item`.*,pp_buku.judul,pp_tipekoleksi.nama as tipe_koleksi,pp_lokasi.nama as lokasi');
  $this->db->from('pp_item');
  $this->db->order_by('pp_item.last_update', 'desc');
  $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
  $this->db->join('pp_lokasi', 'pp_lokasi.id = pp_item.lokasi_id');
  $this->db->join('pp_tipekoleksi', 'pp_tipekoleksi.id = pp_item.tipekoleksi_id');
  return $this->db->get()->result_array();
}
public function get_eksemplar_ById($id){
        $this->db->select('`pp_item`.*,pp_buku.judul,pp_tipekoleksi.nama as tipe_koleksi,,pp_lokasi.nama as lokasi');
        $this->db->from('pp_item');
        $this->db->order_by('pp_item.last_update', 'desc');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_lokasi', 'pp_lokasi.id = pp_item.lokasi_id');
        $this->db->join('pp_tipekoleksi', 'pp_tipekoleksi.id = pp_item.tipekoleksi_id');
        $this->db->where('pp_item.id',$id);
        return $this->db->get()->row_array();

}
  //end
}