<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opac_model extends CI_Model
{
  public function get_gmd()
  {

    $this->db->select('`pp_gmd`.*');
    $this->db->from('pp_gmd');
    $this->db->order_by('pp_gmd.nama', 'asc');
    return $this->db->get()->result_array();
  }

    //end
}