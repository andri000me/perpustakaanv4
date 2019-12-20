<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function transaksi1()
  {
    $data['title'] = 'Transaksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Transaksi_model', 'Transaksi_model');
    $data['selectanggota'] = $this->Transaksi_model->get_anggota();
    if ($this->session->userdata('member_id')) {
			redirect('transaksi/transaksi2');
    }
    
    $this->form_validation->set_rules('member_id', 'member_id','required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('transaksi1', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }else{
    $member_id=$this->input->post('member_id');
    $dataanggota = $this->db->get_where('pp_member', ['member_id' =>
    $member_id ])->row_array();
    if(!$dataanggota){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">ID Anggota '.$member_id.' tidak terdaftar (tidak terdaftar dalam pangkalan data) !</div>');
      redirect('transaksi/transaksi1');
    }else{
    $datamembertype = $this->db->get_where('pp_member_type', ['id' =>
    $dataanggota['member_type_id'] ])->row_array();
    $member_email = $dataanggota['member_type_id']['member_email'];
      $data = [
        'member_id' => $member_id,
        'loan_limit'=>$datamembertype['loan_limit'],
        'loan_periode'=>$datamembertype['loan_periode'],
        'fine_each_day'=>$datamembertype['fine_each_day'],
        'reborrow_limit'=>$datamembertype['reborrow_limit'],
        'member_email'=>$member_email,
      ];
      $this->session->set_userdata($data);
      redirect('transaksi/transaksi2');
    }


  } 
 
  }
    //transaksi
    public function transaksi2()
    {
      $data['title'] = 'Transaksi';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $member_id= $this->session->userdata('member_id');
      $this->load->model('Transaksi_model', 'Transaksi_model');
      $data['getanggota'] = $this->Transaksi_model->get_anggotapeminjaman_Bykode($member_id);
      $data['loan_limit']=$this->session->userdata('loan_limit');
      $data['loan_periode']=$this->session->userdata('loan_periode');
      $data['fine_each_day']=$this->session->userdata('fine_each_day');
      $data['reborrow_limit']=$this->session->userdata('reborrow_limit');
      $data['getloan'] = $this->Transaksi_model->get_loan_Bymember_id($member_id);
      $data['getloanhistory'] = $this->Transaksi_model->get_loanhistory_Bymember_id($member_id);
      $data['getdenda'] = $this->Transaksi_model->get_denda_Bymember_id($member_id);
      $data['jumlahitemcart']=  $this->cart->total_items();
      $data['tanggalskrg']=date('Y-m-d');

      $this->load->view('themes/backend/header', $data);
      $this->load->view('themes/backend/sidebar', $data);
      $this->load->view('themes/backend/topbar', $data);
      $this->load->view('themes/backend/javascript', $data);
      $this->load->view('transaksi2', $data);
      $this->load->view('themes/backend/footer');
      $this->load->view('themes/backend/footerajax');

    } 
      //selesaitransaksi
  public function selesaitransaksi()
  {
    $user = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
    $member_id=$this->session->userdata('member_id');
    $loan_date = date('Y-m-d');
    $pinjamperiode=$this->session->userdata('loan_periode');
    $due_date = date('Y-m-d', strtotime('+'.$pinjamperiode.' days', strtotime($loan_date)));
if ($cart = $this->cart->contents())
{
foreach ($cart as $item)
{
$data = array(
'item_kode' => $item['id'],
'member_id' => $member_id,
'loan_date' => $loan_date,
'due_date' => $due_date,
'user_id' => $user['id']
);
$this->db->insert('pp_loan', $data);
            }
    }
    // end insert
    $this->session->set_flashdata('message', '<div class="alert alert-info" role"alert">ID Member '.$this->session->userdata('member_id').' telah melakukan transaksi !</div>');
    $this->session->unset_userdata('member_id');
    $this->session->unset_userdata('loan_limit');
    $this->session->unset_userdata('loan_periode');
    $this->session->unset_userdata('fine_each_day');
    $this->session->unset_userdata('reborrow_limit');
    $this->session->unset_userdata('member_email');
    $this->cart->destroy();
    redirect('transaksi/transaksi1');
  }

    //tambahitem
    public function tambahitem()
    {
      $member_id=$this->session->userdata('member_id');
      $item_kode=$this->input->post('item_kode');
      $this->load->model('Transaksi_model', 'Transaksi_model');
      $itemdipinjam = $this->Transaksi_model->cekpeminjamanbuku($item_kode);
      if($itemdipinjam['item_kode']){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
        Kode Eksemplar #'.$item_kode.' tidak tersedia    
        </div>');
      }else{
        $query = $this->db->query("SELECT * FROM pp_loan where member_id='$member_id' and is_return='0'");
        $is_lent=$query->num_rows();
      $itemcart=  $this->cart->total_items();
      $jumlahpinjamsekarang=$itemcart+$is_lent;
      if($this->session->userdata('loan_limit')==$jumlahpinjamsekarang){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
        Peminjaman melebihi Batas!  
        </div>');
      }else{
    $item = $this->Transaksi_model->get_eksemplar_ByKode($item_kode);
    $loan_date = date('Y-m-d');
    $pinjamperiode=$this->session->userdata('loan_periode');
    $due_date = date('Y-m-d', strtotime('+'.$pinjamperiode.' days', strtotime($loan_date)));
    $data = array(
        'id' => $item['item_kode'], 
        'name' => $item['judul'], 
        'price' => '0', 
        'qty' => '1', 
        'options' => array('loan_date' => $loan_date, 'due_date' => $due_date)
    );
    $this->cart->insert($data);
  }
  }
      redirect('transaksi/transaksi2');
    }

        //hapusitem
        public function hapusitem($row_id)
        {
          $data = array(
            'rowid' => $row_id,
            'qty'   => 0
        );
        $this->cart->update($data);
        redirect('transaksi/transaksi2');
        }
          //kembaliitem
          public function kembaliitem($id,$fine)
          {
            $this->load->model('Transaksi_model', 'Transaksi_model');
            $getloan = $this->Transaksi_model->get_loan_ById($id);
            $item_kode=$getloan['item_kode'];
            $member_id=$getloan['member_id'];
            $return_date=date('Y-m-d');
            $this->db->set('return_date',$return_date);
            $this->db->set('is_return','1');
            $this->db->where('id', $id);
            $this->db->update('pp_loan');
            if($fine){
              $description="Denda keterlambatan item  $item_kode";
              $data = [
                'fines_date' => $return_date,
                'member_id' => $member_id,
                'debet' => $fine,
                'description' => $description,
                 ];
                 $this->db->insert('pp_fines', $data);

            }
          redirect('transaksi/transaksi2');
          }
          //perpanjangitem
          public function perpanjangitem($id,$fine)
          {
            $this->load->model('Transaksi_model', 'Transaksi_model');
            $getloan = $this->Transaksi_model->get_loan_ById($id);
            $item_kode=$getloan['item_kode'];
            $member_id=$getloan['member_id'];
            $return_date=date('Y-m-d');
            $this->db->set('due_date',$return_date);
            $this->db->set('renewed','1');
            $this->db->where('id', $id);
            $this->db->update('pp_loan');
            if($fine){
              $description="Denda keterlambatan item  $item_kode";
              $data = [
                'fines_date' => $return_date,
                'member_id' => $member_id,
                'debet' => $fine,
                'description' => $description,
                 ];
                 $this->db->insert('pp_fines', $data);

            }
          redirect('transaksi/transaksi2');
          }

           //hapusdenda         
          public function hapusdenda()
          {
           $pcheck = $this->input->post('check');
           
         foreach($pcheck as $id) {
           $dataitem = $this->db->get_where('pp_fines', ['id' =>
             $id ])->row_array();
             $this->db->where('id', $id);
           $this->db->delete('pp_fines');
         }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
            redirect('transaksi/transaksi2');
          }

          //tambahdenda
          public function tambahdenda()
          {
            $data = [
              'member_id' => $this->session->userdata('member_id'),
              'fines_date' => $this->input->post('fines_date'),
              'description' => $this->input->post('description'),
              'debet' => $this->input->post('debet'),
              'credit' => $this->input->post('credit'),
           ];
     
               $this->db->insert('pp_fines', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
               redirect('transaksi/transaksi2');
          }
//edit_denda
public function edit_denda($id)
  {
    $data['title'] = 'Transaksi';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Transaksi_model', 'Transaksi_model');
    $data['get_denda'] = $this->Transaksi_model->get_denda_Byid($id);

    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('debet', 'debet', 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_denda', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      $data = [
        'member_id' => $this->session->userdata('member_id'),
        'fines_date' => $this->input->post('fines_date'),
        'description' => $this->input->post('description'),
        'debet' => $this->input->post('debet'),
        'credit' => $this->input->post('credit'),
         ];
          $this->db->where('id', $id);
          $this->db->update('pp_fines', $data);
          if($this->input->post('credit')==$this->input->post('debet')){
          $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Denda telah dilunasi !</div>');
          }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
          }
          redirect('transaksi/transaksi2');
    }
  }
//pengembalian
public function pengembalian()
{
  $data['title'] = 'Pengembalian';
  $data['user'] = $this->db->get_where('user', ['email' =>
  $this->session->userdata('email')])->row_array();
  $this->load->model('Transaksi_model', 'Transaksi_model');
  
  
  $this->form_validation->set_rules('item_kode', 'item_kode','required');
  if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('pengembalian', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
  }else{
    $item_kode = $this->input->post('item_kode'); 
    $this->load->model('Transaksi_model', 'Transaksi_model');
    $datapengembalian = $this->Transaksi_model->get_loan_Byitem_kode($item_kode);
    if(!$datapengembalian){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Kode Eksemplar '.$item_kode.' tidak terdaftar (tidak terdaftar dalam pangkalan data) !</div>');
      redirect('transaksi/pengembalian');
    }else{
      $id = $datapengembalian['id'];
    $judul = $datapengembalian['judul'];
    $member_id = $datapengembalian['member_id'];
    $nama = $datapengembalian['nama'];
    $item_kode = $datapengembalian['item_kode'];
    $loan_date = $datapengembalian['loan_date'];
    $due_date = $datapengembalian['due_date'];
    $return_date=date('Y-m-d');
    
    $data = [
      'is_return' => '1',
      'return_date' => $return_date,
       ];
        $this->db->where('id', $id);
        $this->db->update('pp_loan', $data);


$this->session->set_flashdata('message2', '<div class="alert alert-warning" role"alert">Kode Eksemplar '.$item_kode.' dikembalikan pada '.$return_date.' !</div>');
$this->session->set_flashdata('message3','
<table class="table">
<tr><td>Judul</td><td>'.$judul.'</td><td>ID Peminjaman</td><td>'.$id.'</td></tr>
<tr><td>Nama Anggota</td><td>'.$nama.'</td><td>ID Anggota</td><td>'.$member_id.'</td></tr>
<tr><td>Tanggal Pinjam</td><td>'.$loan_date.'</td><td>Tanggal harus kembali</td><td>'.$due_date.'</td></tr>
</table>
');
redirect('transaksi/pengembalian');
}
} 
}

public function kirim_email($member_id,$denda)
{
////////////
$smtp_user = $this->db->get_where('options', ['name' =>
'smtp_user'])->row_array();
$smtp_user = $smtp_user['value'];
$smtp_pass = $this->db->get_where('options', ['name' =>
'smtp_pass'])->row_array();
$smtp_pass = $smtp_pass['value'];
$smtp_port = $this->db->get_where('options', ['name' =>
'smtp_port'])->row_array();
$smtp_port = $smtp_port['value'];

$member = $this->db->get_where('pp_member', ['member_id' =>
$member_id])->row_array();
$member_email = $member['member_email'];
///////////

$config = [
  'protocol'  => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_user' => $smtp_user,
  'smtp_pass' => $smtp_pass,
  'smtp_port' => $smtp_port,
  'mailtype'  => 'html',
  'charset'   => 'utf-8',
  'newline'   => "\r\n"
];
$this->load->library('email');
$this->email->initialize($config);
$this->email->from('admin@admin.com', 'TCPerpustakaan Administrator');
$this->email->to($member_email);
$this->email->subject('Pemberitahuan Denda Keterlambatan!');
$this->email->message('Peminjaman anda mengalami keterlambatan dan memiliki biaya denda sebesar : <b>'.$denda.'</b>');
$this->email->send();
$this->session->set_flashdata('message', '<div class="alert alert-warning" role"alert">Email pemberitahuan keterlembatan dan denda telah terkirim!</div>');
redirect('transaksi/transaksi2');
}
 

  //end
}