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
 // pencetakanbarcode
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
  //load yang ada di folder Zend
  $this->zend->load('Zend/Barcode');
  $imagedir     = './assets/images/barcode/'; //direktori penyimpanan barcode
  foreach ($this->cart->contents() as $items):
    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
      $data2 = explode(" " , $option_value);
      $item_code=stripslashes($data2[0]);

  // we can save it with image
  $file = Zend_Barcode::draw('code128', 'image', array('text' => $item_code), array());
imagepng($file, "$imagedir/$item_code.png");
endforeach;
endforeach;
$this->load->view('cetak_barcode', $data);
 }

 // pencetakanqrcode
 public function pencetakanqrcode()
 {
   $data['title'] = 'Pencetakan Qrcode';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Labeling_model', 'Labeling_model');
   $data['listeksemplar'] = $this->Labeling_model->get_eksemplar();  
   $data['totalitemcart']='0';
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('themes/backend/javascript', $data);
   $this->load->view('pencetakanqrcode', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
 }
 public function tambah_eksemplarqrcode()
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
  redirect('labeling/pencetakanqrcode');
}

public function batalkan_antrianqrcode()
{
  $this->cart->destroy();
  redirect('labeling/pencetakanqrcode');
 }

 public function cetak_qrcode()
{
  
  $data['title'] = 'Pencetakan Qrcode';
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

  foreach ($this->cart->contents() as $items):
    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
      $data2 = explode(" " , $option_value);
      $item_code=stripslashes($data2[0]);
      $config['cacheable']    = true; //boolean, the default is true
      $config['cachedir']     = './assets/'; //string, the default is application/cache/
      $config['errorlog']     = './assets/'; //string, the default is application/logs/
      $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
      $config['quality']      = true; //boolean, the default is true
      $config['size']         = '1024'; //interger, the default is 1024
      $config['black']        = array(224,255,255); // array, default is array(255,255,255)
      $config['white']        = array(70,130,180); // array, default is array(0,0,0)
      $this->ciqrcode->initialize($config);

      $image_name=$item_code.'.png'; //buat name dari qr code sesuai dengan nim

      $params['data'] = "$item_code"; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 10;
      $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    endforeach;
  endforeach;



  $this->load->view('cetak_qrcode', $data);
 }


   //end
}