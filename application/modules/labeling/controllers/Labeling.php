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
   $data['totalitemcart'] = $this->cart->total_items();
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
    $data = array(
      'id'      => $id,
      'qty'     => 1,
      'price'   => 0,
      'name'    => $site_title
);
$this->cart->insert($data);
  }
  redirect('labeling/pencetakanlabel/');
 } 
  //end
}