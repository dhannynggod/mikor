<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

  function logged_id()
  {
    return $this->session->userdata('id_login');
  }

  public function login($username, $passwordx)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->where('password', $passwordx);
    return $this->db->get()->row();
  }
}
