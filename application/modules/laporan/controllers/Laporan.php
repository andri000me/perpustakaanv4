<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
//sejarahpeminjaman
public function sejarahpeminjaman()
{
  $data['title'] = 'Sejarah Peminjaman';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['tanggalawal']=options('tanggal_awal');
  $data['tanggalakhir']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_all();
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('sejarahpeminjaman', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
}else{
  $member_id = $this->input->post('member_id');
  $item_kode = $this->input->post('item_kode');
  $judul = $this->input->post('judul');
  $start_date = $this->input->post('start_date');
  $end_date = $this->input->post('end_date');
  $status_peminjaman = $this->input->post('status_peminjaman');
  $data['member_id']=$member_id;
  $data['item_kode']=$item_kode;
  $data['judul']=$judul;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['status_peminjaman']=$status_peminjaman;
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
  
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('sejarahpeminjaman', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
  }
}

//sejarahpeminjamanpdf
public function sejarahpeminjaman_pdf($start_date,$end_date,$status_peminjaman,$member_id,$item_kode,$judul)
{
  $data['title'] = 'Sejarah Peminjaman';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if(!$start_date){
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_all();
  }else{    
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
  }
  $data['member_id']=$member_id;
  $data['item_kode']=$item_kode;
  $data['judul']=$judul;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['status_peminjaman']=$status_peminjaman;
  $html = $this->load->view('sejarahpeminjaman_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'sejarahpeminjaman_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//sejarahpeminjamanexcel
public function sejarahpeminjaman_excel($start_date,$end_date,$status_peminjaman,$member_id,$item_kode,$judul)
{
  $data['title'] = 'Sejarah Peminjaman';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if(!$start_date){
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_all();
  }else{    
  $data['get_peminjaman_all'] = $this->Laporan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
  }
  $data['member_id']=$member_id;
  $data['item_kode']=$item_kode;
  $data['judul']=$judul;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['status_peminjaman']=$status_peminjaman;
  $this->load->view('themes/backend/headerprint', $data);
  $this->load->view('sejarahpeminjaman_excel', $data);
}

//daftarketerlambatan
public function daftarketerlambatan()
{
  $data['title'] = 'Daftar Keterlambatan';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['tanggalawal']=options('tanggal_awal');
  $data['tanggalakhir']=date('Y-m-d');
  $data['tanggalsekarang']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_all();
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('daftarketerlambatan', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
}else{
  $member_id = $this->input->post('member_id');
  $start_date = $this->input->post('start_date');
  $end_date = $this->input->post('end_date');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;

  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_input($start_date,$end_date,$member_id);
  
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('daftarketerlambatan', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
  }
}
//daftarketerlambatanpdf
public function daftarketerlambatan_pdf($start_date,$end_date,$member_id)
{
  $data['title'] = 'Daftar Keterlambatan';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;  
  $data['tanggalsekarang']=date('Y-m-d');
  if(!$start_date){
  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_all();
  }else{    
  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_input($start_date,$end_date,$member_id);
  }

  $html = $this->load->view('daftarketerlambatan_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'daftarketerlambatan_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//daftarketerlambatanexcel
public function daftarketerlambatan_excel($start_date,$end_date,$member_id)
{
  $data['title'] = 'Daftar Keterlambatan';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if(!$start_date){
  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_all();
  }else{    
  $data['get_keterlambatan_all'] = $this->Laporan_model->get_fines_input($start_date,$end_date,$member_id);
  }
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['tanggalsekarang']=date('Y-m-d');
  $this->load->view('themes/backend/headerprint', $data);
  $this->load->view('daftarketerlambatan_excel', $data);
}
//daftardenda
public function daftardenda()
{
  $data['title'] = 'Daftar Denda';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['tanggalawal']=options('tanggal_awal');
  $data['tanggalakhir']=date('Y-m-d');
  $data['tanggalsekarang']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_denda_all'] = $this->Laporan_model->get_denda_all();
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('daftardenda', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
}else{
  $member_id = $this->input->post('member_id');
  $start_date = $this->input->post('start_date');
  $end_date = $this->input->post('end_date');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;

  $data['get_denda_all'] = $this->Laporan_model->get_denda_input($start_date,$end_date,$member_id);
  
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('daftardenda', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
  }
}
//daftardendapdf
public function daftardenda_pdf($start_date,$end_date,$member_id)
{
  $data['title'] = 'Daftar Denda';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;  
  $data['tanggalsekarang']=date('Y-m-d');
  if(!$start_date){
  $data['get_denda_all'] = $this->Laporan_model->get_denda_all();
  }else{    
  $data['get_denda_all'] = $this->Laporan_model->get_denda_input($start_date,$end_date,$member_id);
  }

  $html = $this->load->view('daftardenda_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'daftardenda_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//daftardendaexcel
public function daftardenda_excel($start_date,$end_date,$member_id)
{
  $data['title'] = 'Daftar Denda';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if(!$start_date){
  $data['get_denda_all'] = $this->Laporan_model->get_denda_all();
  }else{    
  $data['get_denda_all'] = $this->Laporan_model->get_denda_input($start_date,$end_date,$member_id);
  }
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['tanggalsekarang']=date('Y-m-d');
  $this->load->view('themes/backend/headerprint', $data);
  $this->load->view('daftardenda_excel', $data);
}
//rekapitulasi
public function rekapitulasi()
{
  $data['title'] = 'Rekapitulasi';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  $groupby = $this->input->post('groupby');
  if($groupby==''or$groupby=='klasifikasi'){
  $data['groupby']='klasifikasi';  
  $data['get_rekapitulasi'] = $this->Laporan_model->get_klasifikasi();
  }elseif($groupby=='gmd'){
  $data['get_rekapitulasi'] = $this->Laporan_model->get_klagmd();
  }elseif($groupby=='tipekoleksi_id'){
  $data['get_rekapitulasi'] = $this->Laporan_model->get_klatipekoleksi();
  }elseif($groupby=='bahasa'){
    $data['get_rekapitulasi'] = $this->Laporan_model->get_klabahasa();
    }
  
  $data['groupby']=$groupby;  
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('rekapitulasi', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
   
}

//Rekapitulasi
public function rekapitulasi_pdf($groupby)
{
  $data['title'] = 'Laporan Rekapitulasi';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');

  if($groupby==''or$groupby=='klasifikasi'){
    $data['groupby']='klasifikasi';  
    $data['get_rekapitulasi'] = $this->Laporan_model->get_klasifikasi();
    }elseif($groupby=='gmd'){
    $data['get_rekapitulasi'] = $this->Laporan_model->get_klagmd();
    }elseif($groupby=='bahasa'){
      $data['get_rekapitulasi'] = $this->Laporan_model->get_klabahasa();
      }

  $html = $this->load->view('rekapitulasi_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'rekapitulasi_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//daftarjudul
public function daftarjudul()
{
  $data['title'] = 'Daftar Judul';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  
  $judul = $this->input->post('judul');
  $pengarang = $this->input->post('pengarang');
  $klasifikasi = $this->input->post('klasifikasi');
  $gmd_id = $this->input->post('gmd_id');
  $this->session->set_userdata('daftar_judul', "$judul,$pengarang,$klasifikasi,$gmd_id");
  $data['get_daftarjudul'] = $this->Laporan_model->get_daftarjudul($judul,$pengarang,$klasifikasi,$gmd_id);
  
 // $data['ses_daftarjudul']=$this->session->userdata('daftar_judul');

  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('daftarjudul', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax'); 
}
public function daftarjudul_pdf()
{
  $data['title'] = 'Daftar Judul';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if ($this->session->userdata('daftar_judul')) {
    $ses_daftarjudul=$this->session->userdata('daftar_judul');
    $data2=explode(',',$ses_daftarjudul);
    $judul=$data2[0];
    $pengarang=$data2[1];
    $klasifikasi=$data2[2];
    $gmd_id=$data2[3];
		}

  $data['get_daftarjudul'] = $this->Laporan_model->get_daftarjudul($judul,$pengarang,$klasifikasi,$gmd_id);

  $html = $this->load->view('daftarjudul_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'daftarjudul_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//penggunaan_koleksi
public function penggunaan_koleksi()
{
  $data['title'] = 'Penggunaan Koleksi';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();

  $this->load->model('Laporan_model', 'Laporan_model');
  if ($this->session->userdata('penggunaan_koleksi')) {
    $ses_penggunaan_koleksi=$this->session->userdata('penggunaan_koleksi');
    $data2=explode(',',$ses_penggunaan_koleksi);
    $judul=$data2[0];
    $item_kode=$data2[1];
    $tahun=$data2[2];
    $data['tahun']=$data2[2];
  }
  $this->form_validation->set_rules('tahun', 'tahun', 'required');
  $data['get_penggunaankoleksi'] = $this->Laporan_model->get_penggunaankoleksi($judul,$item_kode);
  if ($this->form_validation->run() == false) {  
    // $data['ses_daftarjudul']=$this->session->userdata('daftar_judul');
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('penggunaankoleksi', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax'); 
  }else{
    $judul = $this->input->post('judul');
    $item_kode = $this->input->post('item_kode');
    $tahun = $this->input->post('tahun');
    $this->session->set_userdata('penggunaan_koleksi', "$judul,$item_kode,$tahun");
    redirect('laporan/penggunaan_koleksi');
}
}
public function penggunaan_koleksi_pdf()
{
  $data['title'] = 'Penggunaan Koleksi';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if ($this->session->userdata('penggunaan_koleksi')) {
    $ses_penggunaan_koleksi=$this->session->userdata('penggunaan_koleksi');
    $data2=explode(',',$ses_penggunaan_koleksi);
    $judul=$data2[0];
    $item_kode=$data2[1];
    $tahun=$data2[2];
    $data['tahun']=$data2[2];
  }

    $data['get_penggunaankoleksi'] = $this->Laporan_model->get_penggunaankoleksi($judul,$item_kode);

  $html = $this->load->view('penggunaankoleksi_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'penggunaankoleksi_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//peminjamananggota
public function peminjamananggota()
{
  $data['title'] = 'Peminjaman Anggota';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['tanggalawal']=options('tanggal_awal');
  $data['tanggalakhir']=date('Y-m-d');
  $data['tanggalsekarang']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_all();
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('peminjamananggota', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
}else{
  $member_id = $this->input->post('member_id');
  $start_date = $this->input->post('start_date');
  $end_date = $this->input->post('end_date');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;

  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_input($start_date,$end_date,$member_id);
  
  $this->load->view('themes/backend/header', $data);
  $this->load->view('themes/backend/sidebar', $data);
  $this->load->view('themes/backend/topbar', $data);
  $this->load->view('themes/backend/javascript', $data);
  $this->load->view('peminjamananggota', $data);
  $this->load->view('themes/backend/footer');
  $this->load->view('themes/backend/footerajax');
  }
}
//peminjamananggotapdf
public function peminjamananggota_pdf($start_date,$end_date,$member_id)
{
  $data['title'] = 'Peminjaman Anggota';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;  
  $data['tanggalsekarang']=date('Y-m-d');
  if(!$start_date){
  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_all();
  }else{    
  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_input($start_date,$end_date,$member_id);
  }

  $html = $this->load->view('peminjamananggota_pdf', $data, true);
  // create pdf using dompdf
  $filename = 'peminjamananggota_pdf' . date('dmY') . '_' . date('His');
  $paper = 'A4';
  $orientation = 'potrait';
  pdf_create($html, $filename, $paper, $orientation);
}
//peminjamananggotaexcel
public function peminjamananggota_excel($start_date,$end_date,$member_id)
{
  $data['title'] = 'Peminjaman Anggota';
  //load content html
  $this->load->model('Laporan_model', 'Laporan_model');
  if(!$start_date){
  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_all();
  }else{    
  $data['get_peminjamananggota_all'] = $this->Laporan_model->get_peminjamananggota_input($start_date,$end_date,$member_id);
  }
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['tanggalsekarang']=date('Y-m-d');
  $this->load->view('themes/backend/headerprint', $data);
  $this->load->view('peminjamananggota_excel', $data);
}
  //end
}