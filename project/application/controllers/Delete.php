<?php
  class Delete extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Post_model');
      $this->load->helper('url');
    }

    public function index($id) {
      //* 게시글 삭제 기능 구현
      // Post_model에서 deletePost() 호출
      $this->Post_model->deletePost($id);

      $this->load->view('posts/delete');
    }
  }
?>