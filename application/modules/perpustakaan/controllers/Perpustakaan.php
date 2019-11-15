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
   $data['title'] = 'TipeKoleksi';
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
  //end
}