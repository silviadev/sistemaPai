<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Via_model extends CI_Model
{
  public function viaLista()
  {
    $this->db->select('*');
    $this->db->from('via');
    return $this->db->get();
  }
}
