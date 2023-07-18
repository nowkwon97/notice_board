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

    // username의 id를 반환하는 함수
    public function getUserIdByUsername($username) {
      $query = $this->db->select('id')->from('users')->where('username', $username)->get();
      // 쿼리 결과가 존재 할 시
      if ($query->num_rows()>0) {
        // 쿼리 결과의 row를 담는 변수
        $row = $query->row();
        // 직접 접근하여 결과값의 id를 반환
        return $row->id;
      }
    }

    // posts 테이블에서 user_id가 $user_id인 id를 선택 하는 함수
    public function getIdByUserId($user_id) {
      $query = $this->db->query("SELECT id FROM posts WHERE user_id = $user_id");
      return $query;
    }
  }
?>