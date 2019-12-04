<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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
   $this->load->model('Master_model', 'Master_model');
   $data['gmd'] = $this->Master_model->get_gmd();

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
          redirect('master/gmd');
   }
 }
 public function edit_gmd($id)
  {
    $data['title'] = 'GMD';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_gmd'] = $this->Master_model->get_gmd_ById($id);
    $data['gmd'] = $this->Master_model->get_gmd();

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
          redirect('master/gmd');
    }
  }
  public function hapus_gmd($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_gmd');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/gmd');
  }
    // tipeisi
 public function tipeisi()
 {
   $data['title'] = 'Tipe Isi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['tipeisi'] = $this->Master_model->get_tipeisi();

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
          redirect('master/tipeisi');
   }
 }
 public function edit_tipeisi($id)
 {
   $data['title'] = 'Tipe Isi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['get_tipeisi'] = $this->Master_model->get_tipeisi_ById($id);
   $data['tipeisi'] = $this->Master_model->get_tipeisi();

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
         redirect('master/tipeisi');
   }
 }
 public function hapus_tipeisi($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('pp_tipeisi');
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('master/tipeisi');
 }
     // tipemedia
     public function tipemedia()
     {
       $data['title'] = 'Tipe Media';
       $data['user'] = $this->db->get_where('user', ['email' =>
       $this->session->userdata('email')])->row_array();
       $this->load->model('Master_model', 'Master_model');
       $data['tipemedia'] = $this->Master_model->get_tipemedia();
    
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
              redirect('master/tipemedia');
       }
     }
     public function edit_tipemedia($id)
     {
       $data['title'] = 'Tipe Media';
       $data['user'] = $this->db->get_where('user', ['email' =>
       $this->session->userdata('email')])->row_array();
       $this->load->model('Master_model', 'Master_model');
       $data['get_tipemedia'] = $this->Master_model->get_tipemedia_ById($id);
       $data['tipemedia'] = $this->Master_model->get_tipemedia();
    
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
             redirect('master/tipemedia');
       }
     }
     public function hapus_tipemedia($id)
     {
       $this->db->where('id', $id);
       $this->db->delete('pp_tipemedia');
       $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
       redirect('master/tipemedia');
     }
  // penerbit
 public function penerbit()
 {
   $data['title'] = 'Penerbit';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['penerbit'] = $this->Master_model->get_penerbit();

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
          redirect('master/penerbit');
   }
 }
 public function edit_penerbit($id)
  {
    $data['title'] = 'Penerbit';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_penerbit'] = $this->Master_model->get_penerbit_ById($id);
    $data['penerbit'] = $this->Master_model->get_penerbit();

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
          redirect('master/penerbit');
    }
  }
  public function hapus_penerbit($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_penerbit');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/penerbit');
  }
    // tempatterbit
 public function tempatterbit()
 {
   $data['title'] = 'Tempat Terbit';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['tempatterbit'] = $this->Master_model->get_tempatterbit();

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
          redirect('master/tempatterbit');
   }
 }
 public function edit_tempatterbit($id)
  {
    $data['title'] = 'Tempat Terbit';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_tempatterbit'] = $this->Master_model->get_tempatterbit_ById($id);
    $data['tempatterbit'] = $this->Master_model->get_tempatterbit();

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
          redirect('master/tempatterbit');
    }
  }
  public function hapus_tempatterbit($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_tempatterbit');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/tempatterbit');
  }
  // topik
 public function topik()
 {
   $data['title'] = 'Topik';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['topik'] = $this->Master_model->get_topik();

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
          redirect('master/topik');
   }
 }
 public function edit_topik($id)
  {
    $data['title'] = 'Topik';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_topik'] = $this->Master_model->get_topik_ById($id);
    $data['topik'] = $this->Master_model->get_topik();

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
          redirect('master/topik');
    }
  }
  public function hapus_topik($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_topik');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/topik');
  }
  // lokasi
 public function lokasi()
 {
   $data['title'] = 'Lokasi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['lokasi'] = $this->Master_model->get_lokasi();

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
          redirect('master/lokasi');
   }
 }
 public function edit_lokasi($id)
  {
    $data['title'] = 'Lokasi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_lokasi'] = $this->Master_model->get_lokasi_ById($id);
    $data['lokasi'] = $this->Master_model->get_lokasi();

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
          redirect('master/lokasi');
    }
  }
  public function hapus_lokasi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_lokasi');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/lokasi');
  }
  // bahasa
  public function bahasa()
  {
    $data['title'] = 'Bahasa';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['bahasa'] = $this->Master_model->get_bahasa();
 
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
           redirect('master/bahasa');
    }
  }
  public function edit_bahasa($id)
   {
     $data['title'] = 'Bahasa';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Master_model', 'Master_model');
     $data['get_bahasa'] = $this->Master_model->get_bahasa_ById($id);
     $data['bahasa'] = $this->Master_model->get_bahasa();
 
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
           redirect('master/bahasa');
     }
   }
   public function hapus_bahasa($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('pp_bahasa');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('master/bahasa');
   }  
     // statusitem
  public function statusitem()
  {
    $data['title'] = 'Status Eksemplar';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['statusitem'] = $this->Master_model->get_statusitem();
 
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
           redirect('master/statusitem');
    }
  }
  public function edit_statusitem($id)
   {
     $data['title'] = 'Status Eksemplar';
     $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Master_model', 'Master_model');
     $data['get_statusitem'] = $this->Master_model->get_statusitem_ById($id);
     $data['statusitem'] = $this->Master_model->get_statusitem();
 
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
           redirect('master/statusitem');
     }
   }
   public function hapus_statusitem($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('pp_statusitem');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
     redirect('master/statusitem');
   }  
    // tipekoleksi
 public function tipekoleksi()
 {
   $data['title'] = 'Tipe Koleksi';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['tipekoleksi'] = $this->Master_model->get_tipekoleksi();

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
          redirect('master/tipekoleksi');
   }
 }
 public function edit_tipekoleksi($id)
  {
    $data['title'] = 'TipeKoleksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_tipekoleksi'] = $this->Master_model->get_tipekoleksi_ById($id);
    $data['tipekoleksi'] = $this->Master_model->get_tipekoleksi();

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
          redirect('master/tipekoleksi');
    }
  }
  public function hapus_tipekoleksi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_tipekoleksi');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/tipekoleksi');
  }
  // codepattern
 public function codepattern()
 {
   $data['title'] = 'CodePattern';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['codepattern'] = $this->Master_model->get_codepattern();

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
          redirect('master/codepattern');
   }
 }
 public function edit_codepattern($id)
  {
    $data['title'] = 'CodePattern';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_codepattern'] = $this->Master_model->get_codepattern_ById($id);
    $data['codepattern'] = $this->Master_model->get_codepattern();

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
          redirect('master/codepattern');
    }
  }
  public function hapus_codepattern($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_codepattern');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/codepattern');
  }
 // pengarang
 public function pengarang()
 {
   $data['title'] = 'Pengarang';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['pengarang'] = $this->Master_model->get_pengarang();

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
          redirect('master/pengarang');
   }
 }
 public function edit_pengarang($id)
  {
    $data['title'] = 'Pengarang';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_pengarang'] = $this->Master_model->get_pengarang_ById($id);
    $data['pengarang'] = $this->Master_model->get_pengarang();

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
          redirect('master/pengarang');
    }
  }
  public function hapus_pengarang($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_pengarang');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/pengarang');
  }
 //supplier
 public function supplier()
 {
   $data['title'] = 'Supplier';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Master_model', 'Master_model');
   $data['supplier'] = $this->Master_model->get_supplier();

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
          redirect('master/supplier');
   }
 }
 public function edit_supplier($id)
  {
    $data['title'] = 'Supplier';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Master_model', 'Master_model');
    $data['get_supplier'] = $this->Master_model->get_supplier_ById($id);
    $data['supplier'] = $this->Master_model->get_supplier();

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
          redirect('master/supplier');
    }
  }
  public function hapus_supplier($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pp_supplier');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('master/supplier');
  }
  //end
}