<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoriadosis_model extends CI_Model
{
  public function categoriaDosisLista()
  {
    $this->db->select('*');
    $this->db->from('categoriadosis');
    return $this->db->get();
  }
}
