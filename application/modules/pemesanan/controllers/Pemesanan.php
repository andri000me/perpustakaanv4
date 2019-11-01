<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
   
    public function kendaraan()
    {
        $data['title'] = 'Kendaraan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemesanan_kendaraan'] = $this->db->get('addon_pemesanan_kendaraan')->result_array();

        $this->form_validation->set_rules('tglmulai', 'tglmulai', 'required');
        $this->form_validation->set_rules('tglselesai', 'tglselesai', 'required');
        $this->form_validation->set_rules('pemesan', 'pemesan', 'required');
        $this->form_validation->set_rules('asalsekolah', 'asalsekolah', 'required');
        $this->form_validation->set_rules('kendaraan', 'kendaraan', 'required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('pemesanan_kendaraan', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tglmulai' => $this->input->post('tglmulai'),
                'tglselesai' => $this->input->post('tglselesai'),
                'pemesan' => $this->input->post('pemesan'),
                'kendaraan' => $this->input->post('kendaraan'),
                'asalsekolah' => $this->input->post('asalsekolah'),
                'keperluan' => $this->input->post('keperluan')
            ];
            $this->db->insert('addon_pemesanan_kendaraan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Data added !</div>');
            redirect('pemesanan/kendaraan');
        }
    }
    
    public function kendaraanhapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('addon_pemesanan_kendaraan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">deleted !</div>');
        redirect('pemesanan/kendaraan');
    }

    public function kendaraancalendar()
    { $data['title'] = 'Pemesanan Kendaraan';
        $data['result'] = $this->db->get("addon_pemesanan_kendaraan")->result();
   
        foreach ($data['result'] as $key => $value) {
            $keperluan = $value->keperluan;
            $pemesan = $value->pemesan;
            $asalsekolah = $value->asalsekolah;
            $kendaraan = $value->kendaraan;
            $title = "$keperluan - $kendaraan - [$pemesan-$asalsekolah]";
            $data['data'][$key]['title'] = $title;
            $data['data'][$key]['start'] = $value->tglmulai;
            $data['data'][$key]['end'] = $value->tglselesai;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
           
        $this->load->view('kendaraan_calendar', $data);
    }
    public function lapangan()
    {
        $data['title'] = 'Lapangan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemesanan_lapangan'] = $this->db->get('addon_pemesanan_lapangan')->result_array();

        $this->form_validation->set_rules('tglmulai', 'tglmulai', 'required');
        $this->form_validation->set_rules('tglselesai', 'tglselesai', 'required');
        $this->form_validation->set_rules('pemesan', 'pemesan', 'required');
        $this->form_validation->set_rules('asalsekolah', 'asalsekolah', 'required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('themes/backend/header', $data);
            $this->load->view('themes/backend/sidebar', $data);
            $this->load->view('themes/backend/topbar', $data);
            $this->load->view('pemesanan_lapangan', $data);
            $this->load->view('themes/backend/footer');
            $this->load->view('themes/backend/footerajax');
        } else {
            $data = [
                'tglmulai' => $this->input->post('tglmulai'),
                'tglselesai' => $this->input->post('tglselesai'),
                'pemesan' => $this->input->post('pemesan'),
                'asalsekolah' => $this->input->post('asalsekolah'),
                'keperluan' => $this->input->post('keperluan')
            ];
            $this->db->insert('addon_pemesanan_lapangan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">New Data added !</div>');
            redirect('pemesanan/lapangan');
        }
    }
    
    public function lapanganhapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('addon_pemesanan_lapangan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">deleted !</div>');
        redirect('pemesanan/lapangan');
    }

    public function lapangancalendar()
    { $data['title'] = 'Pemesanan Lapangan';
        $data['result'] = $this->db->get("addon_pemesanan_lapangan")->result();
   
        foreach ($data['result'] as $key => $value) {
            $keperluan = $value->keperluan;
            $pemesan = $value->pemesan;
            $asalsekolah = $value->asalsekolah;
            $title = "$keperluan - [$pemesan-$asalsekolah]";
            $data['data'][$key]['title'] = $title;
            $data['data'][$key]['start'] = $value->tglmulai;
            $data['data'][$key]['end'] = $value->tglselesai;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
           
        $this->load->view('lapangan_calendar', $data);
    }
    //////////// END
}
