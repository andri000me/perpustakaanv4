<?php
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

      $this->load->view('themes/jango/header', $data);
      $this->load->view('result', $data);
      $this->load->view('themes/jango/sidebar', $data);
      $this->load->view('themes/jango/footer', $data);
      }
    //end
}   