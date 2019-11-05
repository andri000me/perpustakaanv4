<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan_model extends CI_Model
{
  public function get_gmd()
  {

    $this->db->select('`pp_gmd`.*');
    $this->db->from('pp_gmd');
    $this->db->order_by('pp_gmd.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_gmd($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_gmd');

  }
  public function get_gmd_ById($id){
          return $this->db->get_where('pp_gmd', ['id' => $id])->row_array();

  }
  public function get_tipeisi()
  {

    $this->db->select('`pp_tipeisi`.*');
    $this->db->from('pp_tipeisi');
    $this->db->order_by('pp_tipeisi.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_tipeisi($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_tipeisi');

  }
  public function get_tipeisi_ById($id){
          return $this->db->get_where('pp_tipeisi', ['id' => $id])->row_array();

  }
  public function get_tipemedia()
  {

    $this->db->select('`pp_tipemedia`.*');
    $this->db->from('pp_tipemedia');
    $this->db->order_by('pp_tipemedia.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_tipemedia($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_tipemedia');

  }
  public function get_tipemedia_ById($id){
          return $this->db->get_where('pp_tipemedia', ['id' => $id])->row_array();

  }
  public function get_penerbit()
  {

    $this->db->select('`pp_penerbit`.*');
    $this->db->from('pp_penerbit');
    $this->db->order_by('pp_penerbit.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_penerbit($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_penerbit');

  }
  public function get_penerbit_ById($id){
          return $this->db->get_where('pp_penerbit', ['id' => $id])->row_array();

  }
  public function get_tempatterbit()
  {

    $this->db->select('`pp_tempatterbit`.*');
    $this->db->from('pp_tempatterbit');
    $this->db->order_by('pp_tempatterbit.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_tempatterbit($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_tempatterbit');

  }
  public function get_tempatterbit_ById($id){
          return $this->db->get_where('pp_tempatterbit', ['id' => $id])->row_array();

  }
    public function get_topik()
  {

    $this->db->select('`pp_topik`.*');
    $this->db->from('pp_topik');
    $this->db->order_by('pp_topik.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_topik($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_topik');

  }
  public function get_topik_ById($id){
          return $this->db->get_where('pp_topik', ['id' => $id])->row_array();

  }
  public function get_lokasi()
  {

    $this->db->select('`pp_lokasi`.*');
    $this->db->from('pp_lokasi');
    $this->db->order_by('pp_lokasi.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_lokasi($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_lokasi');

  }
  public function get_lokasi_ById($id){
          return $this->db->get_where('pp_lokasi', ['id' => $id])->row_array();

  }
  public function get_bahasa()
  {

    $this->db->select('`pp_bahasa`.*');
    $this->db->from('pp_bahasa');
    $this->db->order_by('pp_bahasa.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_bahasa($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_bahasa');

  }
  public function get_bahasa_ById($id){
          return $this->db->get_where('pp_bahasa', ['id' => $id])->row_array();

  }
  public function get_statusitem()
  {

    $this->db->select('`pp_statusitem`.*');
    $this->db->from('pp_statusitem');
    $this->db->order_by('pp_statusitem.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_statusitem($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_statusitem');

  }
  public function get_statusitem_ById($id){
          return $this->db->get_where('pp_statusitem', ['id' => $id])->row_array();

  }
  //end
}