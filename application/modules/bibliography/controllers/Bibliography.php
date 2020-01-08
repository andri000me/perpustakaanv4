<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Bibliography extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
    // buku
 public function buku()
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['buku'] = $this->Bibliography_model->get_buku();
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
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['listpengarang'] = $this->Bibliography_model->get_pengarang();
   $data['listgmd'] = $this->Bibliography_model->get_gmd();
   $data['listtipeisi'] = $this->Bibliography_model->get_tipeisi();
   $data['listtipemedia'] = $this->Bibliography_model->get_tipemedia();
   $data['listpenerbit'] = $this->Bibliography_model->get_penerbit();
   $data['listtempatterbit'] = $this->Bibliography_model->get_tempatterbit();
   $data['listtopik'] = $this->Bibliography_model->get_topik();
   $data['listkalaterbit'] = $this->Bibliography_model->get_kalaterbit();
   $data['listbahasa'] = $this->Bibliography_model->get_bahasa();

   $this->form_validation->set_rules('judul', 'judul', 'required');
   $this->form_validation->set_rules('pengarang_id', 'pengarang_id');
   $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab');
   $this->form_validation->set_rules('edisi', 'edisi');
   $this->form_validation->set_rules('gmd_id', 'gmd_id');
   $this->form_validation->set_rules('tipeisi_id', 'tipeisi_id');
   $this->form_validation->set_rules('tipemedia_id', 'tipemedia_id');
   $this->form_validation->set_rules('kalaterbit_id', 'kalaterbit_id');
   $this->form_validation->set_rules('bahasa_id', 'bahasa_id');
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
               $config['file_name'] = date('dmyHis');
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('image')) {
                   $new_image = $this->upload->data('file_name');
                    //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/buku/'.$new_image;
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 300;
                $config['height']= 400;
                $config['new_image']= './assets/images/buku/'.$new_image;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();


                   
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
         'bahasa_id' => $this->input->post('bahasa_id'),
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
          redirect('bibliography/buku');
   }
 }

 public function edit_buku($id)
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['listpengarang'] = $this->Bibliography_model->get_pengarang();
   $data['listgmd'] = $this->Bibliography_model->get_gmd();
   $data['listtipeisi'] = $this->Bibliography_model->get_tipeisi();
   $data['listtipemedia'] = $this->Bibliography_model->get_tipemedia();
   $data['listpenerbit'] = $this->Bibliography_model->get_penerbit();
   $data['listtempatterbit'] = $this->Bibliography_model->get_tempatterbit();
   $data['listtopik'] = $this->Bibliography_model->get_topik();
   $data['listkalaterbit'] = $this->Bibliography_model->get_kalaterbit();
   $data['listbahasa'] = $this->Bibliography_model->get_bahasa();
   $data['get_buku'] = $this->Bibliography_model->get_buku_ById($id);

   $this->form_validation->set_rules('judul', 'judul', 'required');
   $this->form_validation->set_rules('pengarang_id', 'pengarang_id');
   $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab');
   $this->form_validation->set_rules('edisi', 'edisi');
   $this->form_validation->set_rules('gmd_id', 'gmd_id');
   $this->form_validation->set_rules('tipeisi_id', 'tipeisi_id');
   $this->form_validation->set_rules('tipemedia_id', 'tipemedia_id');
   $this->form_validation->set_rules('kalaterbit_id', 'kalaterbit_id');
   $this->form_validation->set_rules('bahasa_id', 'bahasa_id');
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
         'bahasa_id' => $this->input->post('bahasa_id'),
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
      //update nopanggil
      $this->db->set('nopanggil',$this->input->post('nopanggil'));
      $this->db->where('buku_id', $id);
      $this->db->update('pp_item');
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
          $config['file_name'] = date('dmyHis');
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('gambarsampul', $new_image);
              $this->db->where('id', $id);
              $this->db->update('pp_buku');
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/images/buku/'.$new_image;
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 300;
          $config['height']= 400;
          $config['new_image']= './assets/images/buku/'.$new_image;
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          } else {
              echo  $this->upload->display_errors();
          }
      }

          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bibliography/edit_buku/'.$id);
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
   redirect('bibliography/buku');
 }
 //tambaheksemplar
 public function tambaheksemplar($id)
 {
   $data['title'] = 'Buku';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['get_buku'] = $this->Bibliography_model->get_buku_ById($id);
   $data['get_pattern'] = $this->Bibliography_model->get_codepattern();
   $data['get_tipekoleksi'] = $this->Bibliography_model->get_tipekoleksi();
   $data['get_lokasi'] = $this->Bibliography_model->get_lokasi();
   $data['get_statusitem'] = $this->Bibliography_model->get_statusitem();
   $data['get_supplier'] = $this->Bibliography_model->get_supplier();
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
      $item_kode = $this->Bibliography_model->generateitemkode($prefix);
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
         redirect('bibliography/tambaheksemplar/'.$id);
   }
 }

 public function eksemplar()
 {
   $data['title'] = 'Eksemplar';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['listeksemplar'] = $this->Bibliography_model->get_eksemplar();
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
   redirect('bibliography/eksemplar');
 }

 //edit_eksemplar
 public function edit_eksemplar($id)
 {
   $data['title'] = 'Eksemplar';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Bibliography_model', 'Bibliography_model');
   $data['get_eksemplar'] = $this->Bibliography_model->get_eksemplar_ById($id);
   $data['get_pattern'] = $this->Bibliography_model->get_codepattern();
   $data['get_tipekoleksi'] = $this->Bibliography_model->get_tipekoleksi();
   $data['get_lokasi'] = $this->Bibliography_model->get_lokasi();
   $data['get_statusitem'] = $this->Bibliography_model->get_statusitem();
   $data['get_supplier'] = $this->Bibliography_model->get_supplier();
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
         redirect('bibliography/eksemplar');
   }
 }
 public function hapus_sampul($id)
 {
  $databuku = $this->db->get_where('pp_buku', ['id' =>
		$id ])->row_array();
    $gambarsampul = $databuku['gambarsampul'];
    unlink(FCPATH . 'assets/images/buku/' . $gambarsampul);
  
    $this->db->set('gambarsampul', '');
    $this->db->where('id', $id);
    $this->db->update('pp_buku');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('bibliography/edit_buku/'.$id);
 }
  //tambahpdf
  public function tambahpdf($id)
  {
    $data['title'] = 'Buku';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Bibliography_model', 'Bibliography_model');
    $data['get_buku'] = $this->Bibliography_model->get_buku_ById($id);
    $this->form_validation->set_rules('buku_id', 'buku_id', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahpdf', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $buku_id = $this->input->post('buku_id');
      // Jika Ada Gambar
$config['file_name'] = $buku_id;      
$new_pdf = "$buku_id.pdf";
$config['upload_path'] = './assets/images/pdf/';
// set allowed file types
$config['allowed_types'] = 'pdf';
// set upload limit, set 0 for no limit
$config['max_size']    = 0;
// load upload library with custom config settings
$this->load->library('upload', $config);

 // if upload failed , display errors
 unlink(FCPATH . 'assets/images/pdf/' . $new_pdf);
 $this->db->where('buku_id', $buku_id);
 $this->db->delete('pp_pdf');


if (!$this->upload->do_upload())
{
    $this->data['error'] = $this->upload->display_errors();
 }
else
{
      print_r($this->upload->data());
     // print uploaded file data
}

    $data = [
      'buku_id' => $buku_id,
      'file_pdf' => $new_pdf
  ];

         $this->db->insert('pp_pdf', $data);    

          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          redirect('bibliography/tambahpdf/'.$id);
    }
  }

  public function hapus_pdf($buku_id)
  {
     unlink(FCPATH . './assets/images/pdf/' . $buku_id.".pdf");
     $this->db->where('buku_id', $buku_id);
   $this->db->delete('pp_pdf');
   $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">PDF Deleted !</div>');

   redirect('bibliography/tambahpdf/'.$buku_id);
 }
  //end
}