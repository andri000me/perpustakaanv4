<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); $data['bulansekarang']=date('m');
        $data['bulansekarangshort']=date('n');
        $data['row']='0';
        $dataaccount = $this->db->get('account')->result_array();
      $data['dataaccount'] = json_encode($dataaccount);
      $query = $this->db->query("select year,profit from account group by year");
      $datadataaccount2 = $query->result_array();
      $data['dataaccount2'] = json_encode($datadataaccount2);
        $this->load->view('themes/backend/header', $data);
        $this->load->view('themes/backend/sidebar', $data);
        $this->load->view('themes/backend/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('themes/backend/footer');
    }
}
