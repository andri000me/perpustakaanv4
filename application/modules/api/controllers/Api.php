<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
  }

  public function index()
  {
      redirect('api/apipublic');
  }
  public function apipublic()
  {
      $data['title'] = 'API';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

          $this->load->view('themes/backend/header', $data);
          $this->load->view('themes/backend/sidebar', $data);
          $this->load->view('themes/backend/topbar', $data);
          $this->load->view('apipublic', $data);
          $this->load->view('themes/backend/footer');
          $this->load->view('themes/backend/footerajax');
      
  }
  
  public function tahunajaran()
  {
    $data = $this->db->query("SELECT id,tahunajaran FROM akad_tahunajaran")->result();
    echo json_encode($data);
  }
  public function absensisiswa()
  {
    if($this->input->post('tahunajaran', true)){
      $tahunajaran = $this->input->post('tahunajaran', true);
      $semester = $this->input->post('semester', true);
      $nis = $this->input->post('nis', true);
      $data = $this->db->query("SELECT psb_siswa.nis,psb_siswa.namasiswa,count(IF(akad_siswaabsenharian.status='2',1,NULL))as s,count(IF(akad_siswaabsenharian.status='3',1,NULL))as i,count(IF(akad_siswaabsenharian.status='0',1,NULL))as a FROM akad_siswaabsenharian
      LEFT JOIN psb_siswa ON psb_siswa.id = akad_siswaabsenharian.siswa
      where 
      akad_siswaabsenharian.tahunajaran='$tahunajaran' 
      and 
      akad_siswaabsenharian.tahunajaran='$tahunajaran'
      and
      akad_siswaabsenharian.semester='$semester'
      and
      psb_siswa.nis='$nis'
      ")->result();
      echo json_encode($data);
    }
  }
}
?>