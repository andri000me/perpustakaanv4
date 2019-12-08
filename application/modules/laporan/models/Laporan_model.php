<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
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
public function get_tipeanggota()
{

  $this->db->select('`pp_member_type`.*');
  $this->db->from('pp_member_type');
  $this->db->order_by('pp_member_type.id', 'asc');
  return $this->db->get()->result_array();
}
public function get_tipeanggota_ById($id){
        return $this->db->get_where('pp_member_type', ['id' => $id])->row_array();

}
public function get_anggota()
{

  $this->db->select('pp_member.*,pp_member_type.nama as tipeanggota');
  $this->db->from('pp_member');
  $this->db->order_by('pp_member.member_id', 'asc');
  $this->db->join('pp_member_type', 'pp_member_type.id = pp_member.member_type_id');
  return $this->db->get()->result_array();
}

public function get_anggota_ById($id){
        return $this->db->get_where('pp_member', ['id' => $id])->row_array();

}

public function get_anggotapeminjaman_Bykode($member_id)
{

  $this->db->select('pp_member.*,pp_member_type.nama as tipeanggota');
  $this->db->from('pp_member');
  $this->db->order_by('pp_member.member_id', 'asc');
  $this->db->join('pp_member_type', 'pp_member_type.id = pp_member.member_type_id');
  $this->db->where('pp_member.member_id', $member_id);
  return $this->db->get()->row_array();
}
public function get_eksemplar_ByKode($item_kode){
        $this->db->select('`pp_item`.*,pp_buku.judul');
        $this->db->from('pp_item');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->where('pp_item.item_kode',$item_kode);
        return $this->db->get()->row_array();
        
}

public function cekpeminjamanbuku($item_kode){
        $this->db->select('`pp_loan`.*');
        $this->db->from('pp_loan');
        $this->db->where('pp_loan.item_kode',$item_kode);
        $this->db->where('pp_loan.is_return','0');
        return $this->db->get()->row_array();
        
}

public function get_loan_Bymember_id($member_id){
        $this->db->select('`pp_loan`.*,pp_buku.judul');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->where('pp_loan.member_id',$member_id);
        $this->db->where('pp_loan.is_return','0');
      return $this->db->get()->result_array();
}

public function get_loan_ById($id){
        return $this->db->get_where('pp_loan', ['id' => $id])->row_array();

}

public function get_loanhistory_Bymember_id($member_id){
        $this->db->select('`pp_loan`.*,pp_buku.judul');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->where('pp_loan.member_id',$member_id);
        $this->db->order_by('pp_loan.loan_date','desc');
      return $this->db->get()->result_array();
}
public function get_denda_Bymember_id($member_id){
        $this->db->select('pp_fines.*,(pp_fines.debet-pp_fines.credit) as sisa');
        $this->db->from('pp_fines');
        $this->db->where('pp_fines.member_id',$member_id);
        $this->db->order_by('pp_fines.fines_date','desc');
      return $this->db->get()->result_array();
}
public function get_denda_Byid($id){
        $this->db->select('pp_fines.*');
        $this->db->from('pp_fines');
        $this->db->where('pp_fines.id',$id);
        $this->db->order_by('pp_fines.fines_date','desc');
      return $this->db->get()->row_array();
}
public function get_loan_Byitem_kode($item_kode){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->where('pp_loan.item_kode',$item_kode);
        $this->db->where('pp_loan.is_return','0');
        return $this->db->get()->row_array();
} 
public function get_loan_all(){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
      return $this->db->get()->result_array();
}
public function get_loan_input($member_id,$item_kode,$judul,$tanggalawal,$tanggalakhir,$status_peminjaman){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
        $this->db->where('pp_loan.loan_date>=',$tanggalawal);
        $this->db->where('pp_loan.loan_date<=',$tanggalakhir);
        $this->db->like('pp_loan.member_id',$member_id);
        $this->db->like('pp_loan.item_kode',$item_kode);
        $this->db->like('pp_buku.judul',$judul);
        if($status_peminjaman<>'all'){
        $this->db->like('pp_loan.is_return',$status_peminjaman);
        }
      return $this->db->get()->result_array();
}
public function get_fines_all(){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
      return $this->db->get()->result_array();
}
public function get_fines_input($tanggalawal,$tanggalakhir,$member_id=''){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
        $this->db->where('pp_loan.loan_date>=',$tanggalawal);
        $this->db->where('pp_loan.loan_date<=',$tanggalakhir);
        if($member_id<>''){
        $this->db->like('pp_loan.member_id',$member_id);
        $this->db->or_like('pp_member.nama',$member_id);        
        }
      return $this->db->get()->result_array();
}
public function get_anggotacsv()
{

  $this->db->select('pp_member.*');
  $this->db->from('pp_member');
  $this->db->order_by('pp_member.member_id', 'asc');
  return $this->db->get()->result_array();
}

public function get_denda_all(){
        $this->db->select('`pp_fines`.*,pp_member.nama');
        $this->db->from('pp_fines');
        $this->db->join('pp_member', 'pp_member.member_id = pp_fines.member_id');
        $this->db->order_by('pp_fines.fines_date', 'desc');
      return $this->db->get()->result_array();
}
public function get_denda_input($tanggalawal,$tanggalakhir,$member_id){
        $this->db->select('`pp_fines`.*,pp_member.nama');
        $this->db->from('pp_fines');
        $this->db->join('pp_member', 'pp_member.member_id = pp_fines.member_id');
        $this->db->where('pp_fines.fines_date>=',$tanggalawal);
        $this->db->where('pp_fines.fines_date<=',$tanggalakhir);
        $this->db->like('pp_fines.member_id',$member_id);
        $this->db->order_by('pp_fines.fines_date', 'desc');
        return $this->db->get()->result_array();
}

public function get_klasifikasi(){
        $this->db->select('pp_buku.klasifikasi as nama,count(pp_buku.id)as jumlahjudul,pp_buku.klasifikasi as kla_id');
        $this->db->from('pp_buku');
        $this->db->group_by('nama', 'asc');
        return $this->db->get()->result_array();
}
public function get_klagmd(){
        $this->db->select('pp_gmd.nama as nama,count(pp_buku.id)as jumlahjudul,pp_gmd.id as kla_id');
        $this->db->from('pp_buku');
        $this->db->join('pp_gmd', 'pp_gmd.id = pp_buku.gmd_id');
        $this->db->group_by('nama', 'asc');
        return $this->db->get()->result_array();
}
public function get_klatipekoleksi(){
        $this->db->select('pp_tipekoleksi.nama as nama,count(pp_buku.id)as jumlahjudul,pp_tipekoleksi.id as kla_id');
        $this->db->from('pp_buku');
        $this->db->join('pp_tipekoleksi', 'pp_tipekoleksi.id = pp_buku.gmd_id');
        $this->db->group_by('nama', 'asc');
        return $this->db->get()->result_array();
}
public function get_klabahasa(){
        $this->db->select('pp_bahasa.nama as nama,count(pp_buku.id)as jumlahjudul,pp_bahasa.id as kla_id');
        $this->db->from('pp_buku');
        $this->db->join('pp_bahasa', 'pp_bahasa.id = pp_buku.bahasa_id');
        $this->db->group_by('nama', 'asc');
        return $this->db->get()->result_array();
} 
public function get_daftarjudul($judul='',$pengarang='',$klasifikasi='',$gmd_id='')
{
  $this->db->select('`pp_buku`.*,pp_tempatterbit.nama as tempatterbit,pp_penerbit.nama as penerbit,pp_pengarang.nama as pengarang');
  $this->db->from('pp_buku');
  $this->db->join('pp_tempatterbit', 'pp_tempatterbit.id = pp_buku.tempatterbit_id','left');
  $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
  $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
  $this->db->join('pp_gmd', 'pp_gmd.id = pp_buku.gmd_id','left');
if($judul<>''){
$this->db->like('pp_buku.judul',$judul);
$this->db->or_like('pp_buku.isbn',$judul);
}
if($pengarang<>''){
$this->db->like('pp_pengarang.nama',$pengarang);
}
if($klasifikasi<>''){
$this->db->where('pp_buku.klasifikasi',$klasifikasi);
}
if($gmd_id<>''){
$this->db->where('pp_buku.gmd_id',$gmd_id);
}
  $this->db->order_by('pp_buku.last_update', 'desc');
  return $this->db->get()->result_array();
}

public function get_penggunaankoleksi($judul='',$item_kode='')
{

  $this->db->select('`pp_item`.*,pp_buku.judul,pp_tipekoleksi.nama as tipe_koleksi,,pp_lokasi.nama as lokasi');
  $this->db->from('pp_item');
  $this->db->order_by('pp_item.item_kode', 'asc');
  $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
  $this->db->join('pp_lokasi', 'pp_lokasi.id = pp_item.lokasi_id');
  $this->db->join('pp_tipekoleksi', 'pp_tipekoleksi.id = pp_item.tipekoleksi_id');
  if($judul<>''){
        $this->db->like('pp_buku.judul',$judul);
        $this->db->or_like('pp_buku.isbn',$judul);
  }
  if($item_kode<>''){
        $this->db->where('pp_item.item_kode',$item_kode);
  }
  
  return $this->db->get()->result_array();
}
public function get_peminjamananggota_all(){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
      return $this->db->get()->result_array();
}
public function get_peminjamananggota_input($tanggalawal,$tanggalakhir,$member_id=''){
        $this->db->select('`pp_loan`.*,pp_buku.judul,pp_member.nama');
        $this->db->from('pp_loan');
        $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
        $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
        $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
        $this->db->order_by('pp_loan.loan_date', 'desc');
        $this->db->where('pp_loan.loan_date>=',$tanggalawal);
        $this->db->where('pp_loan.loan_date<=',$tanggalakhir);
        if($member_id<>''){
        $this->db->like('pp_loan.member_id',$member_id);
        $this->db->or_like('pp_member.nama',$member_id);        
        }
      return $this->db->get()->result_array();
}
  //end
}