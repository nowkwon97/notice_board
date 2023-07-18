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
    //! 현재 단일 결과를 반환하여 여러 개의 반환이 있을 시 오류가 발생하고있다.
    public function getIdByUserId($user_id) {
      $query = $this->db->query("SELECT id FROM posts WHERE user_id = $user_id");
      return $query;
    }
  }
?>