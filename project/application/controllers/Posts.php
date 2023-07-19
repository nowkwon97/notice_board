<?php
//! 컨트롤러 파일 이름과 해당 클래스의 이름이 정확히 일치해야 한다.
  class Posts extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Post_model');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('date');
      $this->load->library('form_validation');
      $this->load->library('session');
    }
    public function index() {
      $username = $this->session->userdata('username');
      echo "<strong>현재 접속한 계정: </strong>" . $username;

      //* 게시글 목록 조회 기능 구현
      /**
       * ? 1. 모델에서 getPost() 호출하여 반환된 값을 $data['posts']에 저장
       */

      // 1. Post_model에서 getPosts() 함수를 불러와 반환된 값을 $data['posts']에 저장
      $data['posts'] = $this->Post_model->getPosts();

      $this->load->view('posts/index', $data);
    }
  }
?>