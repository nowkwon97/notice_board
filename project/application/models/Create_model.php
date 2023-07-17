<?php
  class Create_model extends CI_Model {
    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function createPost($data) {
      // $data를  posts테이블에 삽입
      $this->db->insert('posts', $data);
    }
  }
?>