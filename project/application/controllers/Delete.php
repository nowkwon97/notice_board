<?php
  class Delete extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Delete_model');
      $this->load->helper('url');
    }

    public function index($id) {
      //* 게시글 삭제 기능 구현
      /**
       * ? 1. 모델에서 deletePost()호출하여 게시글 삭제
       */
      
      // 1. 모델에서 deletePost() 호출하여 게시글 삭제
      $this->Delete_model->deletePost($id);

      $this->load->view('posts/delete');
    }
  }
?>