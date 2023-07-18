<?php
  class Delete extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Delete_model');
      $this->load->helper('url');
      $this->load->library('session');
    }

    public function index($id) {
      //* 게시글 삭제 기능 구현
      /**
       * todo 로그인한 계정의 id에 따라 posts의 user_id를 판별하고 본인 계정만 삭제가 가능하도록 하는 기능 구현 필요
       * ? 1. session의 username을 $username에 초기화
       * ? 2. 브라우저의 url의 id와 비교하기 위한 user_id 초기화
       * ? 3. SELECT id from posts WHERE user_id = $user_id
       * ? 4. getIdByUserId의 결과가 여러 개일 경우를 대비하여 result()로 받음
       * ? 5. 쿼리 결과에 따른 값들을 반복하여 true로 설정해줌
       * ? 6. $username의 id($user_id)가 id와 일치할 시 모델에서 deletePost() 호출하여 게시글 삭제
       * ? 7. $username의 id($user_id)가 id와 일치하지 않을 시
       */

       // 1. session의 username을 $username에 초기화
      $username = $this->session->userdata('username');
      // 2. 브라우저의 url의 id와 비교하기 위한 user_id 초기화
      $user_id = $this->Delete_model->getUserIdByUsername($username);
      // 3. SELECT id from posts WHERE user_id = $user_id
      $query = $this->Delete_model->getIdByUserId($user_id);
      // 4. getIdByUserId의 결과가 여러 개일 경우를 대비하여 result()로 받음
      $queryId = $query->result();
      // 5. 쿼리 결과에 따른 값들을 반복하여 true로 설정해줌
      $canEdit = false;
      foreach ($queryId as $row) {
        if ($row->id == $id) {
          $canEdit = true;
          break;
        }
      }
      if($canEdit) {
        // 6. $username의 id($user_id)가 id와 일치할 시 모델에서 deletePost() 호출하여 게시글 삭제
        $this->Delete_model->deletePost($id);
        $this->load->view('posts/delete');
      } else {
        // 7. $username의 id($user_id)가 id와 일치하지 않을 시
        echo "<h3>권한이 없습니다.</h3>";
      }
    }
  }
?>