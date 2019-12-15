<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{

	public function hapusDataPages($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pages');
	}

	public function getPagesById($id)
	{
		return $this->db->get_where('pages', ['id' => $id])->row_array();
	}
}
