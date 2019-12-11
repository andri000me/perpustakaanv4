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
        $this->load->model('Opac_model', 'Opac_model');
        $data['listgmd'] = $this->Opac_model->get_gmd();
		$this->load->view('themes/opac/header', $data);
		$this->load->view('cariadv', $data);
    }
    //end
}   