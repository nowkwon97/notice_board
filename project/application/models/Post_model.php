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

    public function viewPost($id) {
      // DB 연결
      $this->load->database();
      // posts테이블에서 id값이 $id 인 값을 조회
      $query = $this->db->get_where('posts', array('id' => $id));
      // 쿼리 결과를 배열로 담아 반환
      return $query->row_array();
    }

    public function createPost($data) {

    }

    public function editPost() {

    }

    public function deletePost() {

    }
  }
?>