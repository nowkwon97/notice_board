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
      // DB 연결
      $this->load->database();
      // $data를 posts테이블에 삽입
      $this->db->insert('posts', $data);
    }
    
    public function getPostForEditPost($id) {
      // DB 연결
      $this->load->database();
      $query = $this->db->query("SELECT * FROM posts WHERE id = $id");

      return $query->result_array();
    }

    public function editPost($id, $postData) {
      // DB 연결
      $this->load->database();

      $this->db->where('id', $id);
      $this->db->update('posts', $postData);
    }

    public function deletePost($id) {
      // DB 연결
      $this->load->database();
      
      $this->db->delete('posts', array('id'=>$id));

      $this->load->view('posts/delete');
    }
  }
?>