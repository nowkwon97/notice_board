<?php
  class View extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('View_model');
      
    }

    public function index($id) {
      //* 게시글 상세 조회 기능 구현
      /**
       * ? 1. 모델에서 viewPost($id) 함수를 호출하여 반환된 값을 $data['posts]에 저장
       */

      // 1. View_model에서 viewPost($id) 함수를 불러와 반환된 값을 $data['post']에 저장
      $data['posts'] = $this->View_model->viewPost($id);

      $this->load->view('posts/view', $data);
    }
  }
?>