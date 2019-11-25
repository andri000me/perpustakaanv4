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
  public function get_tipekoleksi()
  {

    $this->db->select('`pp_tipekoleksi`.*');
    $this->db->from('pp_tipekoleksi');
    $this->db->order_by('pp_tipekoleksi.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_tipekoleksi($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_tipekoleksi');

  }
  public function get_tipekoleksi_ById($id){
          return $this->db->get_where('pp_tipekoleksi', ['id' => $id])->row_array();

  }
  public function get_codepattern()
  {

    $this->db->select('`pp_codepattern`.*');
    $this->db->from('pp_codepattern');
    $this->db->order_by('pp_codepattern.prefix', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_codepattern($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_codepattern');

  }
  public function get_codepattern_ById($id){
          return $this->db->get_where('pp_codepattern', ['id' => $id])->row_array();

  }
  public function get_pengarang()
  {

    $this->db->select('`pp_pengarang`.*');
    $this->db->from('pp_pengarang');
    $this->db->order_by('pp_pengarang.nama', 'asc');
    return $this->db->get()->result_array();
  }
  public function hapus_pengarang($id)
  {
          $this->db->where('id', $id);
          $this->db->delete('pp_pengarang');

  }
  public function get_pengarang_ById($id){
          return $this->db->get_where('pp_pengarang', ['id' => $id])->row_array();

  }
  public function get_kalaterbit()
  {

    $this->db->select('`pp_kalaterbit`.*');
    $this->db->from('pp_kalaterbit');
    $this->db->order_by('pp_kalaterbit.id', 'asc');
    return $this->db->get()->result_array();
  }
  public function get_buku()
  {

    $this->db->select('`pp_buku`.*');
    $this->db->from('pp_buku');
    $this->db->order_by('pp_buku.last_update', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_buku_ById($id){
        return $this->db->get_where('pp_buku', ['id' => $id])->row_array();

}
public function get_supplier()
{

  $this->db->select('`pp_supplier`.*');
  $this->db->from('pp_supplier');
  $this->db->order_by('pp_supplier.nama', 'asc');
  return $this->db->get()->result_array();
}
public function hapus_supplier($id)
{
        $this->db->where('id', $id);
        $this->db->delete('pp_supplier');

}
public function get_supplier_ById($id){
        return $this->db->get_where('pp_supplier', ['id' => $id])->row_array();

}

public function generateitemkode($prefix) {
        $q = $this->db->query("SELECT MAX(RIGHT(item_kode,5)) AS kd_max FROM pp_item WHERE item_kode like '$prefix%'");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return $prefix.$kd;
        }

public function get_eksemplar()
{

  $this->db->select('`pp_item`.*,pp_buku.judul,pp_tipekoleksi.nama as tipe_koleksi,,pp_lokasi.nama as lokasi');
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