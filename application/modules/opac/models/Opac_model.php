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
    $this->db->limit($limit);
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
    $this->db->limit($limit);
    return $this->db->get()->num_rows();
  }
  public function get_bukuadv($judul='',$pengarang='',$penerbit='',$isbn='',$limit)
  {

    $this->db->select('pp_buku.*,pp_pengarang.nama as pengarang');
    $this->db->from('pp_buku');
    $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
    $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
    if($judul){
    $this->db->like('pp_buku.judul', $judul);
    }
    if($isbn){
    $this->db->like('pp_buku.isbn', $isbn);
    }
    if($pengarang){
    $this->db->like('pp_pengarang.nama', $pengarang);
    }
    if($penerbit){
    $this->db->like('pp_penerbit.nama', $penerbit);
    }
    $this->db->limit($limit);
    return $this->db->get()->result_array();
  }
  
  public function get_numbukuadv($judul='',$pengarang='',$penerbit='',$isbn='',$limit)
  {

    $this->db->select('pp_buku.*,pp_pengarang.nama as pengarang,pp_penerbit.nama as penerbit');
    $this->db->from('pp_buku');
    $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
    $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
    if($judul){
      $this->db->like('pp_buku.judul', $judul);
      }
      if($isbn){
      $this->db->like('pp_buku.isbn', $isbn);
      }
      if($pengarang){
      $this->db->like('pp_pengarang.nama', $pengarang);
      }
      if($penerbit){
      $this->db->like('pp_penerbit.nama', $penerbit);
      }
      $this->db->limit($limit);
    return $this->db->get()->num_rows();
  }
  public function get_detailbuku($id)
  {
    $this->db->select('`pp_buku`.*,pp_pengarang.nama as pengarang,pp_penerbit.nama as penerbit,pp_bahasa.nama as bahasa,pp_tipeisi.nama as tipeisi,pp_tipemedia.nama as tipemedia,pp_topik.nama as topik');
    $this->db->from('pp_buku');
    $this->db->join('pp_pengarang', 'pp_pengarang.id = pp_buku.pengarang_id','left');
    $this->db->join('pp_penerbit', 'pp_penerbit.id = pp_buku.penerbit_id','left');
    $this->db->join('pp_bahasa', 'pp_bahasa.id = pp_buku.bahasa_id','left');
    $this->db->join('pp_tipeisi', 'pp_tipeisi.id = pp_buku.tipeisi_id','left');
    $this->db->join('pp_tipemedia', 'pp_tipemedia.id = pp_buku.tipemedia_id','left');
    $this->db->join('pp_topik', 'pp_topik.id = pp_buku.topik_id','left');
    $this->db->where('pp_buku.id',$id);
    return $this->db->get()->row_array();
  }
  public function get_eksemplar($id)
  {
    $this->db->select('pp_item.item_kode,pp_loan.is_return');
    $this->db->from('pp_item');
    $this->db->join('pp_loan', 'pp_loan.item_kode = pp_loan.item_kode');
    $this->db->group_by('pp_item.item_kode', 'asc');
    $this->db->where('pp_item.buku_id',$id);
    return $this->db->get()->result_array();
  }
  public function get_peminjamaneksemplar($id)
  {
    $this->db->select('pp_loan.item_kode,pp_loan.member_id,pp_member.nama as namapeminjam');
    $this->db->from('pp_loan');
    $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode'); 
    $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id'); 
    $this->db->where('pp_item.buku_id',$id);
    $this->db->limit('5');
    $this->db->order_by('pp_loan.id','desc');
    return $this->db->get()->result_array();
  }
    //end
}