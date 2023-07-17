<?php
//! 모델 하나에 페이지 하나로 수정하기
  class Post_model extends CI_Model {
    public function __construct() {
      parent::__construct();
      $this->load->database();
    }
    public function getPosts() {
      // 조회 쿼리 실행 및 변수에 담기
      $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
      // 쿼리 결과를 배열로 담아 반환
      return $query->result_array();
    }
  }
?>