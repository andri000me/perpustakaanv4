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
  //end
}