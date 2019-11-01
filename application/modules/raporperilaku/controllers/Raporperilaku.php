<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Raporperilaku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cetakperilaku($nis)
    {
        $data['nis']=$nis;
        $this->load->view('rapor/header',$data);
        $this->load->view('rapor/sidebar',$data);
        $this->load->view('rapor/topbar',$data);
        $this->load->view('Raporperilaku/cetakperilaku',$data);
        $this->load->view('rapor/footer');

    }
    //////////// END
}
