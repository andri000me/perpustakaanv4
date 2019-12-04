<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Labeling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // pencetakanlabel
 public function pencetakanlabel()
 {
   $data['title'] = 'Pencetakan Label';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Labeling_model', 'Labeling_model');
   $data['listeksemplar'] = $this->Labeling_model->get_eksemplar();  
   $data['totalitemcart']='0';
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('themes/backend/javascript', $data);
   $this->load->view('pencetakanlabel', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
 }
 public function tambah_eksemplar()
 {
  $pcheck = $this->input->post('check');
  $this->load->model('Labeling_model', 'Labeling_model');
  $datasite = $this->db->get_where('options', ['name' =>
  'site_title'])->row_array();
  $site_title = $datasite['value'];
  foreach($pcheck as $id) {    
    $dataitem = $this->db->get_where('pp_item', ['id' =>
    $id])->row_array(); 
  $nopanggil = $dataitem['nopanggil'];
    $data = array(
      'id'      => $id,
      'qty'     => 1,
      'price'   => 0,
      'name'    => $site_title,
      'options' => array('nopanggil' => $nopanggil)

);
$this->cart->insert($data);
}
  redirect('labeling/pencetakanlabel');
}

public function batalkan_antrian()
{
  $this->cart->destroy();
  redirect('labeling/pencetakanlabel');
 }
 
public function cetak_label()
{
  
  $data['title'] = 'Pencetakan Label';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Labeling_model', 'Labeling_model');
  $datasite = $this->db->get_where('options', ['name' =>
  'site_title'])->row_array();
  $width_label = $this->db->get_where('options', ['name' =>
  'width_label'])->row_array();
  $height_label = $this->db->get_where('options', ['name' =>
  'height_label'])->row_array();
  $item_margin = $this->db->get_where('options', ['name' =>
  'item_margin'])->row_array();
  $data['width_label']=$width_label['value'];
  $data['height_label']=$height_label['value'];
  $data['item_margin']=$item_margin['value'];
  $data['site_title']= $datasite['value'];

  $this->load->view('cetak_label', $data);
 }
 // pencetakanlabel
 public function pencetakanbarcode()
 {
   $data['title'] = 'Pencetakan Barcode';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Labeling_model', 'Labeling_model');
   $data['listeksemplar'] = $this->Labeling_model->get_eksemplar();  
   $data['totalitemcart']='0';
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('themes/backend/javascript', $data);
   $this->load->view('pencetakanbarcode', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
 }
 public function tambah_eksemplarbarcode()
 {
  $pcheck = $this->input->post('check');
  $this->load->model('Labeling_model', 'Labeling_model');
  $datasite = $this->db->get_where('options', ['name' =>
  'site_title'])->row_array();
  $site_title = $datasite['value'];
  foreach($pcheck as $id) {    
    $dataitem = $this->db->get_where('pp_item', ['id' =>
    $id])->row_array(); 
  $item_kode = $dataitem['item_kode'];
    $data = array(
      'id'      => $id,
      'qty'     => 1,
      'price'   => 0,
      'name'    => $site_title,
      'options' => array('item_kode' => $item_kode)

);
$this->cart->insert($data);
}
  redirect('labeling/pencetakanbarcode');
}

public function batalkan_antrianbarcode()
{
  $this->cart->destroy();
  redirect('labeling/pencetakanbarcode');
 }

 public function cetak_barcode()
{
  
  $data['title'] = 'Pencetakan Barcode';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Labeling_model', 'Labeling_model');
  $datasite = $this->db->get_where('options', ['name' =>
  'site_title'])->row_array();
  $width_label = $this->db->get_where('options', ['name' =>
  'width_label'])->row_array();
  $height_label = $this->db->get_where('options', ['name' =>
  'height_label'])->row_array();
  $item_margin = $this->db->get_where('options', ['name' =>
  'item_margin'])->row_array();
  $data['width_label']=$width_label['value'];
  $data['height_label']=$height_label['value'];
  $data['item_margin']=$item_margin['value'];
  $data['site_title']= $datasite['value'];

  $this->load->view('cetak_barcode', $data);
 }

  //end
}