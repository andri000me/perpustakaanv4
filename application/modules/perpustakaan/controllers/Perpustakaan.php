<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  // gmd
 public function gmd()
 {
   $data['title'] = 'GMD';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['gmd'] = $this->Perpustakaan_model->get_gmd();

   $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[pp_gmd.kode]');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('gmd', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_gmd', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/gmd');
   }
 }
 public function edit_gmd($id)
  {
    $data['title'] = 'GMD';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_gmd'] = $this->Perpustakaan_model->get_gmd_ById($id);
    $data['gmd'] = $this->Perpustakaan_model->get_gmd();

    $this->form_validation->set_rules('kode', 'kode', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_gmd', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_gmd', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/gmd');
    }
  }
  public function hapus_gmd($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_gmd');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/gmd');
  }
    // tipeisi
 public function tipeisi()
 {
   $data['title'] = 'Tipe Isi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['tipeisi'] = $this->Perpustakaan_model->get_tipeisi();

   $this->form_validation->set_rules('nama', 'nama', 'required');
   $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[pp_tipeisi.kode]');
   $this->form_validation->set_rules('kode2', 'kode2', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('tipeisi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'kode2' => $this->input->post('kode2'),
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_tipeisi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/tipeisi');
   }
 }
 public function edit_tipeisi($id)
 {
   $data['title'] = 'Tipe Isi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['get_tipeisi'] = $this->Perpustakaan_model->get_tipeisi_ById($id);
   $data['tipeisi'] = $this->Perpustakaan_model->get_tipeisi();

   $this->form_validation->set_rules('kode', 'kode', 'required');
   $this->form_validation->set_rules('kode2', 'kode2', 'required');
   $this->form_validation->set_rules('nama', 'nama', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_tipeisi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
     $data = [
       'kode' => $this->input->post('kode'),
       'kode2' => $this->input->post('kode2'),
       'nama' => $this->input->post('nama')
        ];
         $this->db->where('id', $id);
         $this->db->update('pp_tipeisi', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('perpustakaan/tipeisi');
   }
 }
 public function hapus_tipeisi($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('pp_tipeisi');
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('perpustakaan/tipeisi');
 }
     // tipemedia
     public function tipemedia()
     {
       $data['title'] = 'Tipe Media';
       $data['user'] = $this->db->get_where('user', ['email' =>
       $this->session->userdata('email')])->row_array();
       $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
       $data['tipemedia'] = $this->Perpustakaan_model->get_tipemedia();
    
       $this->form_validation->set_rules('nama', 'nama', 'required');
       $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[pp_tipemedia.kode]');
       $this->form_validation->set_rules('kode2', 'kode2', 'required');
       if ($this->form_validation->run() == false) {
       $this->load->view('themes/backend/header', $data);
       $this->load->view('themes/backend/sidebar', $data);
       $this->load->view('themes/backend/topbar', $data);
       $this->load->view('tipemedia', $data);
       $this->load->view('themes/backend/footer');
       $this->load->view('themes/backend/footerajax');
       }else{
           $data = [
             'kode' => $this->input->post('kode'),
             'kode2' => $this->input->post('kode2'),
             'nama' => $this->input->post('nama')
              ];
              $this->db->insert('pp_tipemedia', $data);
              $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
              redirect('perpustakaan/tipemedia');
       }
     }
     public function edit_tipemedia($id)
     {
       $data['title'] = 'Tipe Media';
       $data['user'] = $this->db->get_where('user', ['email' =>
       $this->session->userdata('email')])->row_array();
       $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
       $data['get_tipemedia'] = $this->Perpustakaan_model->get_tipemedia_ById($id);
       $data['tipemedia'] = $this->Perpustakaan_model->get_tipemedia();
    
       $this->form_validation->set_rules('kode', 'kode', 'required');
       $this->form_validation->set_rules('kode2', 'kode2', 'required');
       $this->form_validation->set_rules('nama', 'nama', 'required');
       if ($this->form_validation->run() == false) {
       $this->load->view('themes/backend/header', $data);
       $this->load->view('themes/backend/sidebar', $data);
       $this->load->view('themes/backend/topbar', $data);
       $this->load->view('edit_tipemedia', $data);
       $this->load->view('themes/backend/footer');
       $this->load->view('themes/backend/footerajax');
       }else{
         $data = [
           'kode' => $this->input->post('kode'),
           'kode2' => $this->input->post('kode2'),
           'nama' => $this->input->post('nama')
            ];
             $this->db->where('id', $id);
             $this->db->update('pp_tipemedia', $data);
             $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
             redirect('perpustakaan/tipemedia');
       }
     }
     public function hapus_tipemedia($id)
     {
       $this->db->where('id', $id);
       $this->db->delete('pp_tipemedia');
       $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
       redirect('perpustakaan/tipemedia');
     }
  // penerbit
 public function penerbit()
 {
   $data['title'] = 'Penerbit';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['penerbit'] = $this->Perpustakaan_model->get_penerbit();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_penerbit.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('penerbit', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_penerbit', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/penerbit');
   }
 }
 public function edit_penerbit($id)
  {
    $data['title'] = 'Penerbit';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_penerbit'] = $this->Perpustakaan_model->get_penerbit_ById($id);
    $data['penerbit'] = $this->Perpustakaan_model->get_penerbit();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_penerbit', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_penerbit', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/penerbit');
    }
  }
  public function hapus_penerbit($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_penerbit');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/penerbit');
  }
    // tempatterbit
 public function tempatterbit()
 {
   $data['title'] = 'Tempat Terbit';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['tempatterbit'] = $this->Perpustakaan_model->get_tempatterbit();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_tempatterbit.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('tempatterbit', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_tempatterbit', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/tempatterbit');
   }
 }
 public function edit_tempatterbit($id)
  {
    $data['title'] = 'Tempat Terbit';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_tempatterbit'] = $this->Perpustakaan_model->get_tempatterbit_ById($id);
    $data['tempatterbit'] = $this->Perpustakaan_model->get_tempatterbit();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_tempatterbit', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_tempatterbit', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/tempatterbit');
    }
  }
  public function hapus_tempatterbit($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_tempatterbit');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/tempatterbit');
  }
  // topik
 public function topik()
 {
   $data['title'] = 'Topik';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['topik'] = $this->Perpustakaan_model->get_topik();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_topik.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('topik', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_topik', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/topik');
   }
 }
 public function edit_topik($id)
  {
    $data['title'] = 'Topik';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_topik'] = $this->Perpustakaan_model->get_topik_ById($id);
    $data['topik'] = $this->Perpustakaan_model->get_topik();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_topik', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_topik', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/topik');
    }
  }
  public function hapus_topik($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_topik');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/topik');
  }
  // lokasi
 public function lokasi()
 {
   $data['title'] = 'Lokasi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['lokasi'] = $this->Perpustakaan_model->get_lokasi();

   $this->form_validation->set_rules('kode', 'kode', 'required');
   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_lokasi.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('lokasi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_lokasi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/lokasi');
   }
 }
 public function edit_lokasi($id)
  {
    $data['title'] = 'Lokasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_lokasi'] = $this->Perpustakaan_model->get_lokasi_ById($id);
    $data['lokasi'] = $this->Perpustakaan_model->get_lokasi();

    $this->form_validation->set_rules('kode', 'kode', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_lokasi', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_lokasi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/lokasi');
    }
  }
  public function hapus_lokasi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_lokasi');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/lokasi');
  }
  // bahasa
  public function bahasa()
  {
    $data['title'] = 'Bahasa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['bahasa'] = $this->Perpustakaan_model->get_bahasa();
 
    $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[pp_lokasi.kode]');
    $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_lokasi.nama]');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('bahasa', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'kode' => $this->input->post('kode'),
          'nama' => $this->input->post('nama')
           ];
           $this->db->insert('pp_bahasa', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/bahasa');
    }
  }
  public function edit_bahasa($id)
   {
     $data['title'] = 'Bahasa';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
     $data['get_bahasa'] = $this->Perpustakaan_model->get_bahasa_ById($id);
     $data['bahasa'] = $this->Perpustakaan_model->get_bahasa();
 
     $this->form_validation->set_rules('kode', 'kode', 'required');
     $this->form_validation->set_rules('nama', 'nama', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('edit_bahasa', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'nama' => $this->input->post('nama')
          ];
           $this->db->where('id', $id);
           $this->db->update('pp_bahasa', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/bahasa');
     }
   }
   public function hapus_bahasa($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('pp_bahasa');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('perpustakaan/bahasa');
   }  
     // statusitem
  public function statusitem()
  {
    $data['title'] = 'Status Eksemplar';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['statusitem'] = $this->Perpustakaan_model->get_statusitem();
 
    $this->form_validation->set_rules('kode', 'kode', 'required|is_unique[pp_lokasi.kode]');
    $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_lokasi.nama]');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('statusitem', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'kode' => $this->input->post('kode'),
          'nama' => $this->input->post('nama')
           ];
           $this->db->insert('pp_statusitem', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/statusitem');
    }
  }
  public function edit_statusitem($id)
   {
     $data['title'] = 'Status Eksemplar';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
     $data['get_statusitem'] = $this->Perpustakaan_model->get_statusitem_ById($id);
     $data['statusitem'] = $this->Perpustakaan_model->get_statusitem();
 
     $this->form_validation->set_rules('kode', 'kode', 'required');
     $this->form_validation->set_rules('nama', 'nama', 'required');
     if ($this->form_validation->run() == false) {
     $this->load->view('themes/backend/header', $data);
     $this->load->view('themes/backend/sidebar', $data);
     $this->load->view('themes/backend/topbar', $data);
     $this->load->view('edit_statusitem', $data);
     $this->load->view('themes/backend/footer');
     $this->load->view('themes/backend/footerajax');
     }else{
       $data = [
         'kode' => $this->input->post('kode'),
         'nama' => $this->input->post('nama')
          ];
           $this->db->where('id', $id);
           $this->db->update('pp_statusitem', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/statusitem');
     }
   }
   public function hapus_statusitem($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('pp_statusitem');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('perpustakaan/statusitem');
   }  
    // tipekoleksi
 public function tipekoleksi()
 {
   $data['title'] = 'Tipe Koleksi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['tipekoleksi'] = $this->Perpustakaan_model->get_tipekoleksi();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_tipekoleksi.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('tipekoleksi', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_tipekoleksi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/tipekoleksi');
   }
 }
 public function edit_tipekoleksi($id)
  {
    $data['title'] = 'TipeKoleksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_tipekoleksi'] = $this->Perpustakaan_model->get_tipekoleksi_ById($id);
    $data['tipekoleksi'] = $this->Perpustakaan_model->get_tipekoleksi();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_tipekoleksi', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_tipekoleksi', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/tipekoleksi');
    }
  }
  public function hapus_tipekoleksi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_tipekoleksi');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/tipekoleksi');
  }
  // codepattern
 public function codepattern()
 {
   $data['title'] = 'CodePattern';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['codepattern'] = $this->Perpustakaan_model->get_codepattern();

   $this->form_validation->set_rules('prefix', 'prefix', 'required');
   $this->form_validation->set_rules('length', 'length', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('codepattern', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
     $prefix = $this->input->post('prefix');
     $length = $this->input->post('length');
     for ($i = 0; $i < $length; $i++) :
      $lengthnol .='0';
    endfor;
     $itemcodepattern = $prefix.$lengthnol;
       $data = [
         'prefix' => $this->input->post('prefix'),
         'length' => $this->input->post('length'),
         'itemcodepattern' => $itemcodepattern
          ];
          $this->db->insert('pp_codepattern', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/codepattern');
   }
 }
 public function edit_codepattern($id)
  {
    $data['title'] = 'CodePattern';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_codepattern'] = $this->Perpustakaan_model->get_codepattern_ById($id);
    $data['codepattern'] = $this->Perpustakaan_model->get_codepattern();

    $this->form_validation->set_rules('prefix', 'prefix', 'required');
    $this->form_validation->set_rules('length', 'length', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_codepattern', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $prefix = $this->input->post('prefix');
      $length = $this->input->post('length');
      for ($i = 0; $i < $length; $i++) :
        $lengthnol .='0';
      endfor;
      $itemcodepattern = $prefix.$lengthnol;
        $data = [
          'prefix' => $this->input->post('prefix'),
          'length' => $this->input->post('length'),
          'itemcodepattern' => $itemcodepattern
           ];
          $this->db->where('id', $id);
          $this->db->update('pp_codepattern', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/codepattern');
    }
  }
  public function hapus_codepattern($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_codepattern');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/codepattern');
  }
 // pengarang
 public function pengarang()
 {
   $data['title'] = 'Pengarang';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['pengarang'] = $this->Perpustakaan_model->get_pengarang();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_pengarang.nama]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('pengarang', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama')
          ];
          $this->db->insert('pp_pengarang', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/pengarang');
   }
 }
 public function edit_pengarang($id)
  {
    $data['title'] = 'Pengarang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_pengarang'] = $this->Perpustakaan_model->get_pengarang_ById($id);
    $data['pengarang'] = $this->Perpustakaan_model->get_pengarang();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_pengarang', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama')
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_pengarang', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/pengarang');
    }
  }
  public function hapus_pengarang($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_pengarang');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/pengarang');
  }
    // buku
 public function buku()
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['buku'] = $this->Perpustakaan_model->get_buku();
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('themes/backend/javascript', $data);
   $this->load->view('buku', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');

 }
 public function tambahbuku()
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['listpengarang'] = $this->Perpustakaan_model->get_pengarang();
   $data['listgmd'] = $this->Perpustakaan_model->get_gmd();
   $data['listtipeisi'] = $this->Perpustakaan_model->get_tipeisi();
   $data['listtipemedia'] = $this->Perpustakaan_model->get_tipemedia();
   $data['listpenerbit'] = $this->Perpustakaan_model->get_penerbit();
   $data['listtempatterbit'] = $this->Perpustakaan_model->get_tempatterbit();
   $data['listtopik'] = $this->Perpustakaan_model->get_topik();
   $data['listkalaterbit'] = $this->Perpustakaan_model->get_kalaterbit();

   $this->form_validation->set_rules('judul', 'judul', 'required');
   $this->form_validation->set_rules('pengarang_id', 'pengarang_id');
   $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab');
   $this->form_validation->set_rules('edisi', 'edisi');
   $this->form_validation->set_rules('gmd_id', 'gmd_id');
   $this->form_validation->set_rules('tipeisi_id', 'tipeisi_id');
   $this->form_validation->set_rules('tipemedia_id', 'tipemedia_id');
   $this->form_validation->set_rules('kalaterbit_id', 'kalaterbit_id');
   $this->form_validation->set_rules('isbn', 'isbn');
   $this->form_validation->set_rules('penerbit_id', 'penerbit_id');
   $this->form_validation->set_rules('tahunterbit', 'tahunterbit');
   $this->form_validation->set_rules('tempatterbit_id', 'tempatterbit_id');
   $this->form_validation->set_rules('deskripsifisik', 'deskripsifisik');
   $this->form_validation->set_rules('judulseri', 'judulseri');
   $this->form_validation->set_rules('klasifikasi', 'klasifikasi');
   $this->form_validation->set_rules('nopanggil', 'nopanggil');
   $this->form_validation->set_rules('topik_id', 'topik_id');
   $this->form_validation->set_rules('abstrak', 'abstrak');
   $this->form_validation->set_rules('lampiran', 'lampiran');
   $this->form_validation->set_rules('disableopac', 'disableopac');
   $this->form_validation->set_rules('promoberanda', 'promoberanda');
   $this->form_validation->set_rules('url', 'url');
   $this->form_validation->set_rules('urlmultimedia', 'urlmultimedia');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('tambahbuku', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
           // Jika Ada Gambar
           $upload_image = $_FILES['image']['name'];

           if ($upload_image) {
               $config['allowed_types'] = 'gif|jpg|png';
               $config['max_size']     = '200';
               $config['upload_path'] = './assets/images/buku/';
               $config['file_name'] = round(microtime(true) * 1000);
               $this->load->library('upload', $config);
               if ($this->upload->do_upload('image')) {
                   $new_image = $this->upload->data('file_name');
               } else {
                   echo  $this->upload->display_errors();
               }
           }

       $data = [
         'judul' => $this->input->post('judul'),
         'pengarang_id' => $this->input->post('pengarang_id'),
         'penanggungjawab' => $this->input->post('penanggungjawab'),
         'edisi' => $this->input->post('edisi'),
         'gmd_id' => $this->input->post('gmd_id'),
         'tipeisi_id' => $this->input->post('tipeisi_id'),
         'tipemedia_id' => $this->input->post('tipemedia_id'),
         'kalaterbit_id' => $this->input->post('kalaterbit_id'),
         'isbn' => $this->input->post('isbn'),
         'penerbit_id' => $this->input->post('penerbit_id'),
         'tahunterbit' => $this->input->post('tahunterbit'),
         'tempatterbit_id' => $this->input->post('tempatterbit_id'),
         'deskripsifisik' => $this->input->post('deskripsifisik'),
         'judulseri' => $this->input->post('judulseri'),
         'klasifikasi' => $this->input->post('klasifikasi'),
         'nopanggil' => $this->input->post('nopanggil'),
         'topik_id' => $this->input->post('topik_id'),
         'abstrak' => $this->input->post('abstrak'),
         'gambarsampul' => $new_image,
         'lampiran' => $this->input->post('lampiran'),
         'disableopac' => $this->input->post('disableopac'),
         'promoberanda' => $this->input->post('promoberanda'),
         'url' => $this->input->post('url'),
         'urlmultimedia' => $this->input->post('urlmultimedia'),
      ];

          $this->db->insert('pp_buku', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/buku');
   }
 }

 public function edit_buku($id)
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['listpengarang'] = $this->Perpustakaan_model->get_pengarang();
   $data['listgmd'] = $this->Perpustakaan_model->get_gmd();
   $data['listtipeisi'] = $this->Perpustakaan_model->get_tipeisi();
   $data['listtipemedia'] = $this->Perpustakaan_model->get_tipemedia();
   $data['listpenerbit'] = $this->Perpustakaan_model->get_penerbit();
   $data['listtempatterbit'] = $this->Perpustakaan_model->get_tempatterbit();
   $data['listtopik'] = $this->Perpustakaan_model->get_topik();
   $data['listkalaterbit'] = $this->Perpustakaan_model->get_kalaterbit();
   $data['get_buku'] = $this->Perpustakaan_model->get_buku_ById($id);

   $this->form_validation->set_rules('judul', 'judul', 'required');
   $this->form_validation->set_rules('pengarang_id', 'pengarang_id');
   $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab');
   $this->form_validation->set_rules('edisi', 'edisi');
   $this->form_validation->set_rules('gmd_id', 'gmd_id');
   $this->form_validation->set_rules('tipeisi_id', 'tipeisi_id');
   $this->form_validation->set_rules('tipemedia_id', 'tipemedia_id');
   $this->form_validation->set_rules('kalaterbit_id', 'kalaterbit_id');
   $this->form_validation->set_rules('isbn', 'isbn');
   $this->form_validation->set_rules('penerbit_id', 'penerbit_id');
   $this->form_validation->set_rules('tahunterbit', 'tahunterbit');
   $this->form_validation->set_rules('tempatterbit_id', 'tempatterbit_id');
   $this->form_validation->set_rules('deskripsifisik', 'deskripsifisik');
   $this->form_validation->set_rules('judulseri', 'judulseri');
   $this->form_validation->set_rules('klasifikasi', 'klasifikasi');
   $this->form_validation->set_rules('nopanggil', 'nopanggil');
   $this->form_validation->set_rules('topik_id', 'topik_id');
   $this->form_validation->set_rules('abstrak', 'abstrak');
   $this->form_validation->set_rules('lampiran', 'lampiran');
   $this->form_validation->set_rules('disableopac', 'disableopac');
   $this->form_validation->set_rules('promoberanda', 'promoberanda');
   $this->form_validation->set_rules('url', 'url');
   $this->form_validation->set_rules('urlmultimedia', 'urlmultimedia');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_buku', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{


       $data = [
         'judul' => $this->input->post('judul'),
         'pengarang_id' => $this->input->post('pengarang_id'),
         'penanggungjawab' => $this->input->post('penanggungjawab'),
         'edisi' => $this->input->post('edisi'),
         'gmd_id' => $this->input->post('gmd_id'),
         'tipeisi_id' => $this->input->post('tipeisi_id'),
         'tipemedia_id' => $this->input->post('tipemedia_id'),
         'kalaterbit_id' => $this->input->post('kalaterbit_id'),
         'isbn' => $this->input->post('isbn'),
         'penerbit_id' => $this->input->post('penerbit_id'),
         'tahunterbit' => $this->input->post('tahunterbit'),
         'tempatterbit_id' => $this->input->post('tempatterbit_id'),
         'deskripsifisik' => $this->input->post('deskripsifisik'),
         'judulseri' => $this->input->post('judulseri'),
         'klasifikasi' => $this->input->post('klasifikasi'),
         'nopanggil' => $this->input->post('nopanggil'),
         'topik_id' => $this->input->post('topik_id'),
         'abstrak' => $this->input->post('abstrak'),
         'lampiran' => $this->input->post('lampiran'),
         'disableopac' => $this->input->post('disableopac'),
         'promoberanda' => $this->input->post('promoberanda'),
         'url' => $this->input->post('url'),
         'urlmultimedia' => $this->input->post('urlmultimedia'),
      ];
      $this->db->where('id', $id);
      $this->db->update('pp_buku', $data);
      // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
       $databuku = $this->db->get_where('pp_buku', ['id' =>
       $id ])->row_array();
       $gambarsampul = $databuku['gambarsampul'];
       unlink(FCPATH . 'assets/images/buku/' . $gambarsampul);

          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']     = '200';
          $config['upload_path'] = './assets/images/buku/';
          $config['file_name'] = round(microtime(true) * 1000);
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('gambarsampul', $new_image);
              $this->db->where('id', $id);
              $this->db->update('pp_buku');
          } else {
              echo  $this->upload->display_errors();
          }
      }

          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/edit_buku/'.$id);
   }
 }

 public function hapus_buku()
 {
  $pcheck = $this->input->post('check');
  
foreach($pcheck as $id) {
  $databuku = $this->db->get_where('pp_buku', ['id' =>
		$id ])->row_array();
    $gambarsampul = $databuku['gambarsampul'];
    unlink(FCPATH . 'assets/images/buku/' . $gambarsampul);
  
    $this->db->where('id', $id);
  $this->db->delete('pp_buku');
}
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('perpustakaan/buku');
 }
 //supplier
 public function supplier()
 {
   $data['title'] = 'Supplier';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['supplier'] = $this->Perpustakaan_model->get_supplier();

   $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_supplier.nama]');
   $this->form_validation->set_rules('alamat', 'alamat');
   $this->form_validation->set_rules('kontak', 'kontak');
   $this->form_validation->set_rules('hp', 'hp', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('supplier', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
       $data = [
         'nama' => $this->input->post('nama'),
         'alamat' => $this->input->post('alamat'),
         'kontak' => $this->input->post('kontak'),
         'hp' => $this->input->post('hp'),
          ];
          $this->db->insert('pp_supplier', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/supplier');
   }
 }
 public function edit_supplier($id)
  {
    $data['title'] = 'Supplier';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_supplier'] = $this->Perpustakaan_model->get_supplier_ById($id);
    $data['supplier'] = $this->Perpustakaan_model->get_supplier();

    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('alamat', 'alamat');
    $this->form_validation->set_rules('kontak', 'kontak');
    $this->form_validation->set_rules('hp', 'hp', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_supplier', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'kontak' => $this->input->post('kontak'),
        'hp' => $this->input->post('hp'),
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_supplier', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('perpustakaan/supplier');
    }
  }
  public function hapus_supplier($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_supplier');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/supplier');
  }
 //tambaheksemplar
 public function tambaheksemplar($id)
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['get_buku'] = $this->Perpustakaan_model->get_buku_ById($id);
   $data['get_pattern'] = $this->Perpustakaan_model->get_codepattern();
   $data['get_tipekoleksi'] = $this->Perpustakaan_model->get_tipekoleksi();
   $data['get_lokasi'] = $this->Perpustakaan_model->get_lokasi();
   $data['get_statusitem'] = $this->Perpustakaan_model->get_statusitem();
   $data['get_supplier'] = $this->Perpustakaan_model->get_supplier();
   $this->form_validation->set_rules('total', 'total', 'required|greater_than[0]');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('tambaheksemplar', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
     $buku_id=$id;
     $nopanggil = $this->input->post('nopanggil');
     $pattern_id = $this->input->post('pattern_id');
     $total = $this->input->post('total');
     $tipekoleksi_id = $this->input->post('tipekoleksi_id');
    $lokasi_id = $this->input->post('lokasi_id');
    $lokasi_rak = $this->input->post('lokasi_rak');
    $item_status_id = $this->input->post('item_status_id');
    $supplier_id = $this->input->post('supplier_id');
    $source_id = $this->input->post('source_id');
    $invoice = $this->input->post('invoice');
    $invoice_tanggal = $this->input->post('invoice_tanggal');
    $harga = $this->input->post('harga');
    $user = $this->session->userdata('email');

    $harga = preg_replace('/\D/', '', $harga);
    $prefix = $pattern_id;
    for ($i = 0; $i < $total; $i++) :
      $item_kode = $this->Perpustakaan_model->generateitemkode($prefix);
      $dataitem = [
      'buku_id' => $buku_id,
      'nopanggil' => $nopanggil,
      'tipekoleksi_id' => $tipekoleksi_id,
      'item_kode' => $item_kode,
      'lokasi_id' => $lokasi_id,
      'lokasi_rak' => $lokasi_rak,
      'item_status_id' => $item_status_id,
      'supplier_id' => $supplier_id,
      'source_id' => $source_id,
      'invoice' => $invoice,
      'invoice_tanggal' => $invoice_tanggal,
      'harga' => $harga,
      'user' => $user,
        ];
        $this->db->insert('pp_item', $dataitem);    
      endfor;
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('perpustakaan/tambaheksemplar/'.$id);
   }
 }

 public function eksemplar()
 {
   $data['title'] = 'Eksemplar';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['listeksemplar'] = $this->Perpustakaan_model->get_eksemplar();
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('themes/backend/javascript', $data);
   $this->load->view('eksemplar', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
 }
 public function hapus_eksemplar()
 {
  $pcheck = $this->input->post('check');
  
foreach($pcheck as $id) {
  $dataitem = $this->db->get_where('pp_item', ['id' =>
		$id ])->row_array();
    $this->db->where('id', $id);
  $this->db->delete('pp_item');
}
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('perpustakaan/eksemplar');
 }

 //edit_eksemplar
 public function edit_eksemplar($id)
 {
   $data['title'] = 'Eksemplar';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['get_eksemplar'] = $this->Perpustakaan_model->get_eksemplar_ById($id);
   $data['get_pattern'] = $this->Perpustakaan_model->get_codepattern();
   $data['get_tipekoleksi'] = $this->Perpustakaan_model->get_tipekoleksi();
   $data['get_lokasi'] = $this->Perpustakaan_model->get_lokasi();
   $data['get_statusitem'] = $this->Perpustakaan_model->get_statusitem();
   $data['get_supplier'] = $this->Perpustakaan_model->get_supplier();
   $this->form_validation->set_rules('judul', 'judul', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_eksemplar', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
    $buku_id = $this->input->post('buku_id');
     $nopanggil = $this->input->post('nopanggil');
     $pattern_id = $this->input->post('pattern_id');
     $total = $this->input->post('total');
     $tipekoleksi_id = $this->input->post('tipekoleksi_id');
     $item_kode = $this->input->post('item_kode');
    $lokasi_id = $this->input->post('lokasi_id');
    $lokasi_rak = $this->input->post('lokasi_rak');
    $item_status_id = $this->input->post('item_status_id');
    $supplier_id = $this->input->post('supplier_id');
    $source_id = $this->input->post('source_id');
    $invoice = $this->input->post('invoice');
    $invoice_tanggal = $this->input->post('invoice_tanggal');
    $harga = $this->input->post('harga');
    $user = $this->session->userdata('email');
    $harga = preg_replace('/\D/', '', $harga);
      $dataitem = [
      'buku_id' => $buku_id,
      'nopanggil' => $nopanggil,
      'tipekoleksi_id' => $tipekoleksi_id,
      'item_kode' => $item_kode,
      'lokasi_id' => $lokasi_id,
      'lokasi_rak' => $lokasi_rak,
      'item_status_id' => $item_status_id,
      'supplier_id' => $supplier_id,
      'source_id' => $source_id,
      'invoice' => $invoice,
      'invoice_tanggal' => $invoice_tanggal,
      'harga' => $harga,
        ];  
        $this->db->where('id', $id);
          $this->db->update('pp_item', $dataitem);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('perpustakaan/eksemplar');
   }
 }
  // tipeanggota
  public function tipeanggota()
  {
    $data['title'] = 'Tipe Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['tipeanggota'] = $this->Perpustakaan_model->get_tipeanggota();
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('tipeanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
 
  }
  public function tambahtipeanggota()
  {
    $data['title'] = 'Tipe Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
 
    $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_member_type.nama]');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahtipeanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'nama' => $this->input->post('nama'),
          'loan_limit' => $this->input->post('loan_limit'),
          'loan_periode' => $this->input->post('loan_periode'),
          'reborrow_limit' => $this->input->post('reborrow_limit'),
          'fine_each_day' => $this->input->post('fine_each_day'),
           ];
           $this->db->insert('pp_member_type', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/tipeanggota');
    }
  }

  //edit_tipeanggota
 public function edit_tipeanggota($id)
 {
   $data['title'] = 'Tipe Anggota';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
   $data['get_tipeanggota'] = $this->Perpustakaan_model->get_tipeanggota_ById($id);
   $this->form_validation->set_rules('nama', 'nama', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_tipeanggota', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
  
      $dataitem = [
        'nama' => $this->input->post('nama'),
        'loan_limit' => $this->input->post('loan_limit'),
        'loan_periode' => $this->input->post('loan_periode'),
        'reborrow_limit' => $this->input->post('reborrow_limit'),
        'fine_each_day' => $this->input->post('fine_each_day'),
        ];  
        $this->db->where('id', $id);
          $this->db->update('pp_member_type', $dataitem);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('perpustakaan/tipeanggota');
   }
 }
  public function hapus_tipeanggota()
  {
   $pcheck = $this->input->post('check');
   
 foreach($pcheck as $id) {
   $dataitem = $this->db->get_where('pp_member_type', ['id' =>
     $id ])->row_array();
     $this->db->where('id', $id);
   $this->db->delete('pp_member_type');
 }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/tipeanggota');
  }

//anggota
  public function anggota()
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['anggota'] = $this->Perpustakaan_model->get_anggota();
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('anggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
 
  }
  public function tambahanggota()
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['list_member_type'] = $this->Perpustakaan_model->get_tipeanggota();

    $this->form_validation->set_rules('member_id', 'member_id', 'required|is_unique[pp_member.member_id]');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('gender', 'gender','required');
    $this->form_validation->set_rules('member_type_id', 'member_type_id');
    $this->form_validation->set_rules('member_address', 'member_address');
    $this->form_validation->set_rules('member_hp', 'member_hp');
    $this->form_validation->set_rules('inst_name', 'inst_name');
    $this->form_validation->set_rules('mpassword', 'mpassword');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'member_id' => $this->input->post('member_id'),
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'member_type_id' => $this->input->post('member_type_id'),
          'member_address' => $this->input->post('member_address'),
          'member_hp' => $this->input->post('member_hp'),
          'inst_name' => $this->input->post('inst_name'),
          'mpassword' => md5($this->input->post('mpassword')),
           ];
           $this->db->insert('pp_member', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/anggota');
    }
  }
  public function edit_anggota($id)
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['list_member_type'] = $this->Perpustakaan_model->get_tipeanggota();
    $data['get_anggota'] = $this->Perpustakaan_model->get_anggota_ById($id);

    $this->form_validation->set_rules('member_id', 'member_id', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('gender', 'gender','required');
    $this->form_validation->set_rules('member_type_id', 'member_type_id');
    $this->form_validation->set_rules('member_address', 'member_address');
    $this->form_validation->set_rules('member_hp', 'member_hp');
    $this->form_validation->set_rules('inst_name', 'inst_name');
    $this->form_validation->set_rules('mpassword', 'mpassword');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_anggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $dataitem = [
          'member_id' => $this->input->post('member_id'),
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'member_type_id' => $this->input->post('member_type_id'),
          'member_address' => $this->input->post('member_address'),
          'member_hp' => $this->input->post('member_hp'),
          'inst_name' => $this->input->post('inst_name'),
           ];
           $this->db->where('id', $id);
           $this->db->update('pp_member', $dataitem);
           $mpassword = $this->input->post('mpassword');
           if ($mpassword) {
            $this->db->set('mpassword', md5($mpassword));
            $this->db->where('id', $id);
            $this->db->update('pp_member');
          }
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('perpustakaan/anggota');
    }
  }
  public function hapus_anggota()
  {
   $pcheck = $this->input->post('check');
   
 foreach($pcheck as $id) {
   $dataitem = $this->db->get_where('pp_member', ['id' =>
     $id ])->row_array();
     $this->db->where('id', $id);
   $this->db->delete('pp_member');
 }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('perpustakaan/anggota');
  }

  //transaksi
  public function transaksi()
  {
    $data['title'] = 'Transaksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['selectanggota'] = $this->Perpustakaan_model->get_anggota();
    if ($this->session->userdata('member_id')) {
			redirect('perpustakaan/transaksi2');
    }
    
    $this->form_validation->set_rules('member_id', 'member_id','required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('transaksi', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }else{
    $member_id=$this->input->post('member_id');
    $dataanggota = $this->db->get_where('pp_member', ['member_id' =>
    $member_id ])->row_array();
    if(!$dataanggota){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">ID Anggota '.$member_id.' tidak terdaftar (tidak terdaftar dalam pangkalan data) !</div>');
      redirect('perpustakaan/transaksi');
    }else{
    $datamembertype = $this->db->get_where('pp_member_type', ['id' =>
    $dataanggota['member_type_id'] ])->row_array();
      $data = [
        'member_id' => $member_id,
        'loan_limit'=>$datamembertype['loan_limit'],
        'loan_periode'=>$datamembertype['loan_periode'],
        'fine_each_day'=>$datamembertype['fine_each_day'],
        'reborrow_limit'=>$datamembertype['reborrow_limit'],
      ];
      $this->session->set_userdata($data);
      redirect('perpustakaan/transaksi2');
    }


  } 
 
  }
    //transaksi
    public function transaksi2()
    {
      $data['title'] = 'Transaksi';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $member_id= $this->session->userdata('member_id');
      $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
      $data['getanggota'] = $this->Perpustakaan_model->get_anggotapeminjaman_Bykode($member_id);
      $data['loan_limit']=$this->session->userdata('loan_limit');
      $data['loan_periode']=$this->session->userdata('loan_periode');
      $data['fine_each_day']=$this->session->userdata('fine_each_day');
      $data['reborrow_limit']=$this->session->userdata('reborrow_limit');
      $data['getloan'] = $this->Perpustakaan_model->get_loan_Bymember_id($member_id);
      $data['getloanhistory'] = $this->Perpustakaan_model->get_loanhistory_Bymember_id($member_id);
      $data['getdenda'] = $this->Perpustakaan_model->get_denda_Bymember_id($member_id);
      $data['jumlahitemcart']=  $this->cart->total_items();
      $data['tanggalskrg']=date('Y-m-d');

      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('transaksi2', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');

    } 
      //selesaitransaksi
  public function selesaitransaksi()
  {
    $user = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
    $member_id=$this->session->userdata('member_id');
    $loan_date = date('Y-m-d');
    $pinjamperiode=$this->session->userdata('loan_periode');
    $due_date = date('Y-m-d', strtotime('+'.$pinjamperiode.' days', strtotime($loan_date)));
if ($cart = $this->cart->contents())
{
foreach ($cart as $item)
{
$data = array(
'item_kode' => $item['id'],
'member_id' => $member_id,
'loan_date' => $loan_date,
'due_date' => $due_date,
'user_id' => $user['id']
);
$this->db->insert('pp_loan', $data);
            }
    }
    // end insert
    $this->session->set_flashdata('message', '<div class="alert alert-info" role"alert">ID Member '.$this->session->userdata('member_id').' telah melakukan transaksi !</div>');
    $this->session->unset_userdata('member_id');
    $this->session->unset_userdata('loan_limit');
    $this->session->unset_userdata('loan_periode');
    $this->session->unset_userdata('fine_each_day');
    $this->session->unset_userdata('reborrow_limit');
    $this->cart->destroy();
    redirect('perpustakaan/transaksi');
  }

    //tambahitem
    public function tambahitem()
    {
      $member_id=$this->session->userdata('member_id');
      $item_kode=$this->input->post('item_kode');
      $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
      $itemdipinjam = $this->Perpustakaan_model->cekpeminjamanbuku($item_kode);
      if($itemdipinjam['item_kode']){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
        Kode Eksemplar #'.$item_kode.' tidak tersedia    
        </div>');
      }else{
        $query = $this->db->query("SELECT * FROM pp_loan where member_id='$member_id' and is_return='0'");
        $is_lent=$query->num_rows();
      $itemcart=  $this->cart->total_items();
      $jumlahpinjamsekarang=$itemcart+$is_lent;
      if($this->session->userdata('loan_limit')==$jumlahpinjamsekarang){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
        Peminjaman melebihi Batas!  
        </div>');
      }else{
    $item = $this->Perpustakaan_model->get_eksemplar_ByKode($item_kode);
    $loan_date = date('Y-m-d');
    $pinjamperiode=$this->session->userdata('loan_periode');
    $due_date = date('Y-m-d', strtotime('+'.$pinjamperiode.' days', strtotime($loan_date)));
    $data = array(
        'id' => $item['item_kode'], 
        'name' => $item['judul'], 
        'price' => '0', 
        'qty' => '1', 
        'options' => array('loan_date' => $loan_date, 'due_date' => $due_date)
    );
    $this->cart->insert($data);
  }
  }
      redirect('perpustakaan/transaksi2');
    }

        //hapusitem
        public function hapusitem($row_id)
        {
          $data = array(
            'rowid' => $row_id,
            'qty'   => 0
        );
        $this->cart->update($data);
        redirect('perpustakaan/transaksi2');
        }
          //kembaliitem
          public function kembaliitem($id,$fine)
          {
            $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
            $getloan = $this->Perpustakaan_model->get_loan_ById($id);
            $item_kode=$getloan['item_kode'];
            $member_id=$getloan['member_id'];
            $return_date=date('Y-m-d');
            $this->db->set('return_date',$return_date);
            $this->db->set('is_return','1');
            $this->db->where('id', $id);
            $this->db->update('pp_loan');
            if($fine){
              $description="Denda keterlambatan item  $item_kode";
              $data = [
                'fines_date' => $return_date,
                'member_id' => $member_id,
                'debet' => $fine,
                'description' => $description,
                 ];
                 $this->db->insert('pp_fines', $data);

            }
          redirect('perpustakaan/transaksi2');
          }
          //perpanjangitem
          public function perpanjangitem($id,$fine)
          {
            $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
            $getloan = $this->Perpustakaan_model->get_loan_ById($id);
            $item_kode=$getloan['item_kode'];
            $member_id=$getloan['member_id'];
            $return_date=date('Y-m-d');
            $this->db->set('due_date',$return_date);
            $this->db->set('renewed','1');
            $this->db->where('id', $id);
            $this->db->update('pp_loan');
            if($fine){
              $description="Denda keterlambatan item  $item_kode";
              $data = [
                'fines_date' => $return_date,
                'member_id' => $member_id,
                'debet' => $fine,
                'description' => $description,
                 ];
                 $this->db->insert('pp_fines', $data);

            }
          redirect('perpustakaan/transaksi2');
          }

           //hapusdenda         
          public function hapusdenda()
          {
           $pcheck = $this->input->post('check');
           
         foreach($pcheck as $id) {
           $dataitem = $this->db->get_where('pp_fines', ['id' =>
             $id ])->row_array();
             $this->db->where('id', $id);
           $this->db->delete('pp_fines');
         }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
            redirect('perpustakaan/transaksi2');
          }

          //tambahdenda
          public function tambahdenda()
          {
            $data = [
              'member_id' => $this->session->userdata('member_id'),
              'fines_date' => $this->input->post('fines_date'),
              'description' => $this->input->post('description'),
              'debet' => $this->input->post('debet'),
              'credit' => $this->input->post('credit'),
           ];
     
               $this->db->insert('pp_fines', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
               redirect('perpustakaan/transaksi2');
          }
//edit_denda
public function edit_denda($id)
  {
    $data['title'] = 'Transaksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $data['get_denda'] = $this->Perpustakaan_model->get_denda_Byid($id);

    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('debet', 'debet', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_denda', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'member_id' => $this->session->userdata('member_id'),
        'fines_date' => $this->input->post('fines_date'),
        'description' => $this->input->post('description'),
        'debet' => $this->input->post('debet'),
        'credit' => $this->input->post('credit'),
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_fines', $data);
          if($this->input->post('credit')==$this->input->post('debet')){
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Denda telah dilunasi !</div>');
          }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          }
          redirect('perpustakaan/transaksi2');
    }
  }
//pengembalian
public function pengembalian()
{
  $data['title'] = 'Pengembalian';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  
  
  $this->form_validation->set_rules('item_kode', 'item_kode','required');
  if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('pengembalian', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }else{
    $item_kode = $this->input->post('item_kode'); 
    $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
    $datapengembalian = $this->Perpustakaan_model->get_loan_Byitem_kode($item_kode);
    if(!$datapengembalian){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Kode Eksemplar '.$item_kode.' tidak terdaftar (tidak terdaftar dalam pangkalan data) !</div>');
      redirect('perpustakaan/pengembalian');
    }else{
      $id = $datapengembalian['id'];
    $judul = $datapengembalian['judul'];
    $member_id = $datapengembalian['member_id'];
    $nama = $datapengembalian['nama'];
    $item_kode = $datapengembalian['item_kode'];
    $loan_date = $datapengembalian['loan_date'];
    $due_date = $datapengembalian['due_date'];
    $return_date=date('Y-m-d');
    
    $data = [
      'is_return' => '1',
      'return_date' => $return_date,
       ];
        $this->db->where('id', $id);
        $this->db->update('pp_loan', $data);


$this->session->set_flashdata('message2', '<div class="alert alert-warning" role"alert">Kode Eksemplar '.$item_kode.' dikembalikan pada '.$return_date.' !</div>');
$this->session->set_flashdata('message3','
<table class="table">
<tr><td>Judul</td><td>'.$judul.'</td><td>ID Peminjaman</td><td>'.$id.'</td></tr>
<tr><td>Nama Anggota</td><td>'.$nama.'</td><td>ID Anggota</td><td>'.$member_id.'</td></tr>
<tr><td>Tanggal Pinjam</td><td>'.$loan_date.'</td><td>Tanggal harus kembali</td><td>'.$due_date.'</td></tr>
</table>
');
redirect('perpustakaan/pengembalian');
}
} 
}
 
//sejarahpeminjaman
public function sejarahpeminjaman()
{
  $data['title'] = 'Sejarah Peminjaman';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  $data['tanggalawal']=date('2019-01-01');
  $data['tanggalakhir']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_all();
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
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
  
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
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  if(!$start_date){
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_all();
  }else{    
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
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
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  if(!$start_date){
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_all();
  }else{    
  $data['get_peminjaman_all'] = $this->Perpustakaan_model->get_loan_input($member_id,$item_kode,$judul,$start_date,$end_date,$status_peminjaman);
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
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  $data['tanggalawal']=date('2019-01-01');
  $data['tanggalakhir']=date('Y-m-d');
  $data['tanggalsekarang']=date('Y-m-d');
  $this->form_validation->set_rules('start_date', 'start_date', 'required');
  $this->form_validation->set_rules('end_date', 'end_date', 'required');
  if ($this->form_validation->run() == false) {
  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_all();
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

  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_input($start_date,$end_date,$member_id);
  
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
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;  
  $data['tanggalsekarang']=date('Y-m-d');
  if(!$start_date){
  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_all();
  }else{    
  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_input($start_date,$end_date,$member_id);
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
  $this->load->model('Perpustakaan_model', 'Perpustakaan_model');
  if(!$start_date){
  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_all();
  }else{    
  $data['get_keterlambatan_all'] = $this->Perpustakaan_model->get_fines_input($start_date,$end_date,$member_id);
  }
  $data['member_id']=$member_id;
  $data['start_date']=$start_date;
  $data['end_date']=$end_date;
  $data['tanggalsekarang']=date('Y-m-d');
  $this->load->view('themes/backend/headerprint', $data);
  $this->load->view('daftarketerlambatan_excel', $data);
}
// Export anggota in CSV format 
public function exportanggota_csv(){ 
  // file name 
  $tanggalskrg=date('Ymd');
  $this->load->dbutil();
  $this->load->helper('download');
  $this->db->select('*');
  $this->db->from('pp_member');
  $member_data = $this->db->get();
  $delimiter = ";";
  $newline = "\r\n";
  $enclosure = '"';
  $data = $this->dbutil->csv_from_result($member_data, $delimiter, $newline, $enclosure);
  $namefile = 'Data_Member' . $tanggalskrg . '.csv';

  force_download($namefile, $data);
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported !</div>');
  redirect('perpustakaan/anggota');
 }
 public function importanggotacsv()
 {
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();


   $file = $_FILES['anggotacsv']['tmp_name'];
   $demileter = $this->input->post('demileter');
   // Medapatkan ekstensi file csv yang akan diimport.
   $ekstensi  = explode('.', $_FILES['anggotacsv']['name']);

   // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

   if (empty($file)) {
     $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
     redirect('perpustakaan/anggota');
   } else {
     // Validasi apakah file yang diupload benar-benar file csv.
     if (strtolower(end($ekstensi)) == 'csv' && $_FILES["anggotacsv"]["size"] > 0) {

       $i = 0;
       $handle = fopen($file, "r");
       $sukses = '0';
       while (($row = fgetcsv($handle, 2048))) {
         $i++;
         if ($i == 1) continue;
         // Data yang akan disimpan ke dalam databse
         //$this->db->where('siswa_id', $siswa_id);
         //$this->db->delete('siswa_spp');
         $dataraw =  $row[0];
         $arr = explode(";", $dataraw);
         $id =  $arr[0];
         $member_id =  $arr[1];
         $nama =  $arr[2];
         $gender =  $arr[3];
         $member_type_id   =  $arr[4];
         $member_address   =  $arr[5];
         $member_hp   =  $arr[6];
         $inst_name   =  $arr[7];
         $mpassword   =  $arr[8];
         $member_image =  $arr[9];
         $last_update =  $arr[10];
         if ($id <> '') {

           $data = [
             'id' => $id,
             'member_id' => $member_id,
             'nama' => $nama,
             'gender' => $gender,
             'member_type_id' => $member_type_id,
             'member_address' => $member_address,
             'member_hp' => $member_hp,
             'inst_name' => $inst_name,
             'mpassword' => $mpassword,
             'member_image' => $member_image,
             'last_update' => $last_update,
           ];

           // Simpan data ke database.
           $this->db->replace('pp_member', $data);

           $sukses++;
         }
       }
       fclose($handle);

       $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Import Data ' . $sukses . ' Successed !</div>');
       redirect('perpustakaan/anggota');
     } else {
       $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
       redirect('perpustakaan/anggota');
     }
   }
 }
  //end
}