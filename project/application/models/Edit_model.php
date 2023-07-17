<?php
  class Edit_model extends CI_Model {
    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function getPostForEditPost($id) {
      // 조회 쿼리 실행 및 변수에 담기
      $query = $this->db->query("SELECT * FROM posts WHERE id = $id");
      // 쿼리 결과를 배열로 반환
      return $query->result_array();
    }

    public function editPost($id, $postData) {
      // where id = $id
      $this->db->where('id', $id);
      // posts테이블을 $postData 내용으로 수정
      $this->db->update('posts', $postData);
    }
  }
?>