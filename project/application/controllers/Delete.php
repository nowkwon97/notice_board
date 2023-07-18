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
       * ? 1. 모델에서 deletePost()호출하여 게시글 삭제
       */
      $username = $this->session->userdata('username');
      $user_id = $this->Delete_model->getUserIdByUsername($username);
      $query = $this->Delete_model->getIdByUserId($user_id);
      $queryId = $query->row()->id;
      echo $queryId;
      //! posts테이블의 user_id와 users테이블의 id가 일치할 시 로 바꾸기 or 현재 user_id에 해당하는 글이 여러 개 일 시 모든 글을 인식하는 로직으로 수정해야 한다.
      if($queryId===$id) {
        // $username의 id($user_id)가 id와 일치할 시

        // 1. 모델에서 deletePost() 호출하여 게시글 삭제
        $this->Delete_model->deletePost($id);
        $this->load->view('posts/delete');
      } else {
        // $username의 id($user_id)가 id와 일치하지 않을 시
        echo "<h3>권한이 없습니다.</h3>";
      }
    }
  }
?>