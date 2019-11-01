<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_CRUD extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('_kelas');
    $this->load->model('_t');
    $this->load->model('_kr');
    $this->load->model('_sk');
    $this->load->model('_st');
    $this->load->model('_jabatan');

    //jika belum login
    if(!$this->session->userdata('kr_jabatan_id')){
      redirect('Auth');
    }

    //jika bukan HRD dan sudah login redirect ke home
    if($this->session->userdata('kr_jabatan_id')!=4 && $this->session->userdata('kr_jabatan_id')){
      redirect('Profile');
    }
  }

  public function index(){

    $data['title'] = 'Daftar Kelas';

    //data karyawan yang sedang login untuk topbar
    $data['kr'] = $this->_kr->find_by_username($this->session->userdata('kr_username'));

    //data karyawan untuk konten
    $data['t_all'] = $this->_t->return_all();

    //$data['tes'] = var_dump($this->db->last_query());

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('Report_CRUD/index',$data);
    $this->load->view('templates/footer');

  }

  public function get_kelas(){
    if($this->input->post('id',TRUE)){

      $t_id = $this->input->post('id',TRUE);
      $sk_id = $this->session->userdata('kr_sk_id');

      //temukan jenjang id pada kelas itu
      $data = $this->db->query(
        "SELECT kelas_id, kelas_nama
        FROM kelas
        WHERE kelas_t_id = $t_id AND kelas_sk_id = $sk_id
        ORDER BY kelas_nama")->result();

      //$data = $this->product_model->get_sub_category($category_id)->result();
      echo json_encode($data);
    }else{
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Denied!</div>');
      redirect('Profile');
    }
  }

  public function get_siswa(){
    if($this->input->post('id',TRUE)){

      $kelas_id = $this->input->post('id',TRUE);

      //temukan jenjang id pada kelas itu
      $data = $this->db->query(
        "SELECT d_s_id, sis_nama_depan, sis_nama_bel
        FROM d_s
        LEFT JOIN sis ON d_s_sis_id = sis_id
        WHERE d_s_kelas_id = $kelas_id
        ORDER BY sis_nama_depan")->result();

      //$data = $this->product_model->get_sub_category($category_id)->result();
      echo json_encode($data);
    }else{
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Denied!</div>');
      redirect('Profile');
    }
  }

  public function show(){

    if($this->input->post('siswa_check[]',TRUE) || $this->input->post('semester',TRUE)){

      if(count($this->input->post('siswa_check[]',TRUE))==0){
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pilih setidaknya 1 siswa!</div>');
        redirect('Report_CRUD');
      }

      $data['title'] = 'Halaman Raport';

      //data karyawan yang sedang login untuk topbar
      $data['kr'] = $this->_kr->find_by_username($this->session->userdata('kr_username'));

      $data['sis_arr'] = $this->input->post('siswa_check[]',TRUE);
      $data['semester'] = $this->input->post('semester',TRUE);
      $data['jumPh'] = $this->input->post('phCount',TRUE);
      $data['jumK'] = $this->input->post('KCount',TRUE);

      $data['kepsek'] = $this->_sk->find_by_id($this->session->userdata('kr_sk_id'));
      $data['walkel'] = $this->_kelas->find_walkel_by_kelas_id($this->input->post('kelas_id',TRUE));

      $data['kelas_id'] = $this->input->post('kelas_id',TRUE);

      $pjenis = $this->input->post('pJenis',TRUE);

      if($pjenis == 1){
        //Sisipan
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('Report_CRUD/sisipan',$data);
        $this->load->view('templates/footer');

      }else{
        //Semester
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('Report_CRUD/semester',$data);
        $this->load->view('templates/footer');
      }



    }else{
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Do not access page directly!</div>');
      redirect('Profile');
    }
  }

}
