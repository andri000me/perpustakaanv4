<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
	public function index()
	{
		$data['infoperpustakaan'] = $this->db->get_where('options', ['id' => '1'])->row_array();
		$data['title'] = $data['infoperpustakaan']['value'];
		$this->form_validation->set_rules('member_id', 'member_id', 'required');
		if ($this->form_validation->run() == false) {
		$this->load->view('themes/frontend/head', $data);
		$this->load->view('themes/frontend/header');
		$this->load->view('index', $data);
		$this->load->view('themes/frontend/footer', $data);
		}else{
			$member_id = $this->input->post('member_id');
			$data['infomember'] = $this->db->get_where('pp_member', ['member_id' => $member_id])->row_array();
			$member_image = $data['infomember']['member_image'];
			if($data['infomember']){
				$query = $this->db->query("SELECT member_id,DATE_FORMAT(visitor_count.checkin_date, '%Y-%m-%d')
				FROM visitor_count where member_id=$member_id and DATE(checkin_date) = CURDATE()");
				$isvisittoday = $query->num_rows();
				if(!$isvisittoday){
				$member_id = $data['infomember']['member_id'];
				$member_name = $data['infomember']['nama'];
				$institution = $data['infomember']['institution'];
				$checkin_date = date('Y-m-d H:i:s');
				 $data = [
         'member_id' => $member_id,
         'member_name' => $member_name,
         'institution' => $institution,
         'checkin_date' => $checkin_date,
          ];
          $this->db->insert('visitor_count', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert"><img src="'.base_url('assets/images/member/'.$member_image).'"class="rounded-circle">
				Data Saved !</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">
			<img src="'.base_url('assets/images/member/'.$member_image).'"class="rounded-circle">
			Member ID telah login pada hari yang sama !</div>');
		}
				
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Member ID tidak dikenal !</div>');
			}


			redirect(base_url('pengunjung'));	
		}
	}
}
