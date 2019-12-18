<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Opac extends CI_Controller
{
	public function index()
	{
        $data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
		$data['title'] = $data['infoperpustakaan']['value'];
		$this->load->view('themes/opac/header', $data);
		$this->load->view('index', $data);
    }

    public function cariadv()
	{
        $data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
        $data['title'] = $data['infoperpustakaan']['value'];

		$this->load->view('themes/opac/header', $data);
		$this->load->view('cariadv', $data);
    }

    public function carijudul()
    {
          $data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
          $data['title'] = $data['infoperpustakaan']['value'];
          $limit_search_item = $this->db->get_where('options', ['name' => 'limit_search_item'])->row_array();
          $limit = $limit_search_item['value'];

            $cariall = $this->input->post('cariall');
            $judul = $this->input->post('judul');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $isbn = $this->input->post('isbn');
            $this->load->model('Opac_model', 'Opac_model');
            if($cariall){
            $data['get_bukuall'] = $this->Opac_model->get_bukuall($cariall,$limit);
            $data['get_numbukuall'] = $this->Opac_model->get_numbukuall($cariall,$limit);
            $data['katakunci'] = $cariall;
            }else{
            $data['get_bukuall'] = $this->Opac_model->get_bukuall($cariall,$limit);
            $data['get_numbukuall'] = $this->Opac_model->get_numbukuall($cariall,$limit);
              $data['katakunci']='';
            }
            $this->load->view('themes/jango/header', $data);
            $this->load->view('result', $data);
            $this->load->view('themes/jango/sidebar', $data);
            $this->load->view('themes/jango/footer', $data);
          
      }

      public function carijuduladv()
      {
            $data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
            $data['title'] = $data['infoperpustakaan']['value'];
            $limit_search_item = $this->db->get_where('options', ['name' => 'limit_search_item'])->row_array();
            $limit = $limit_search_item['value'];

              $judul = $this->input->post('judul');
              $pengarang = $this->input->post('pengarang');
              $penerbit = $this->input->post('penerbit');
              $isbn = $this->input->post('isbn');
              $this->load->model('Opac_model', 'Opac_model');

              if($judul){
                $katakunci .="Judul:$judul ";
              }
              if($pengarang){
                $katakunci .="Pengarang:$pengarang ";
              }
              if($penerbit){
                $katakunci .="Penerbit:$penerbit ";
              }
              if($isbn){
                $katakunci .="Isbn:$isbn ";
              }

              $data['get_bukuall'] = $this->Opac_model->get_bukuaadv($judul,$pengarang,$penerbit,$isbn,$limit);
              $data['get_numbukuall'] = $this->Opac_model->get_numbukuadv($judul,$pengarang,$penerbit,$isbn,$limit);
              $data['katakunci'] = $katakunci;
              $this->load->view('themes/jango/header', $data);
              $this->load->view('result', $data);
              $this->load->view('themes/jango/sidebar', $data);
              $this->load->view('themes/jango/footer', $data);
            
        }

      public function detailjudul($id)
      {
            $data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
            $data['title'] = $data['infoperpustakaan']['value'];
            $this->load->model('Opac_model', 'Opac_model');
            $data['get_detailbuku'] = $this->Opac_model->get_detailbuku($id);
            $data['get_eksemplar'] = $this->Opac_model->get_eksemplar($id);
            $data['get_peminjamaneksemplar'] = $this->Opac_model->get_peminjamaneksemplar($id);
             
              $this->load->view('themes/jango/header', $data);
              $this->load->view('detailjudul', $data);
              $this->load->view('themes/jango/sidebardetail', $data);
              $this->load->view('themes/jango/footer', $data);
            
        }
    //end
}   