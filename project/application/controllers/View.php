<?php
  class View extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Post_model');
      
    }

    public function index($id) {
      //* 게시글 상세 조회 기능 구현

      //* Post_model에서 viewPost($id) 함수를 불러와 반환된 값을 $data['post']에 저장
      $data['posts'] = $this->Post_model->viewPost($id);

      $this->load->view('posts/view', $data);
    }
  }
?>