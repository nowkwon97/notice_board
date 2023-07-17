<?php
  class Delete_model extends CI_model {
    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function deletePost($id) {
      // posts 테이블에서 id=$id인 데이터 삭제
      $this->db->delete('posts', array('id'=>$id));
    }
  }
?>