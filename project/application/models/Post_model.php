<?php
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

    public function viewPost($id) {
      // posts테이블에서 id값이 $id 인 값을 조회
      $query = $this->db->get_where('posts', array('id' => $id));
      // 쿼리 결과를 배열로 담아 반환
      return $query->row_array();
    }

    public function createPost($data) {
      // $data를 posts테이블에 삽입
      $this->db->insert('posts', $data);
    }
    
    public function getPostForEditPost($id) {
      // 조회 쿼리 실행 및 변수에 담기
      $query = $this->db->query("SELECT * FROM posts WHERE id = $id");
      // 쿼리 결과를 배열로 담아 반환
      return $query->result_array();
    }

    public function editPost($id, $postData) {
      // Where 'id' = $id
      $this->db->where('id', $id);
      // posts테이블을 $postData의 내용으로 수정
      $this->db->update('posts', $postData);
    }

    public function deletePost($id) {
      // posts테이블에서 id=$id인 데이터 삭제
      $this->db->delete('posts', array('id'=>$id));
    }
  }
?>