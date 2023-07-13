<?php
  class Post_model extends CI_Model {
    public function getPosts() {
      // DB 연결
      $this->load->database();
      // 조회 쿼리 실행 및 변수에 담기
      $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
      // 쿼리 결과를 배열로 담아 반환
      return $query->result_array();
    }

    public function getPost($id) {

    }

    public function createPost($data) {

    }

    public function editPost() {

    }

    public function deletePost() {

    }
  }
?>