<?php
  class Create extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Create_model');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->helper('date');
      $this->load->database();
    }

    public function index() {
      //* 게시글 작성 기능 구현
      /**
       * ? 1. 폼 유효성 검사
       * ? 2. 폼 유효성 검사 결과에 따라 처리
       * ?  2.1 폼 유효성 검사 실패 시, 다시 작성 폼 표시
       * ?  2.2 폼 유효성 검사 성공 시, 데이터 저장
       * ? 3. 모델에서 createPost()호출하여 게시글 생성
       * ? 4. 생성 후 게시판으로 리디렉션
       */

      // 1. 폼 유효성 검사
      $this->form_validation->set_rules('title', '제목', 'required');
      $this->form_validation->set_rules('content', '내용', 'required');

      // 2. 폼 유효성 검사 결과에 따라 처리
      if ($this->form_validation->run()===FALSE) {
        // 2.1 유효성 검사 실패 시, 다시 작성 폼 표시
        $this->load->view('posts/create');
        return;
      } else {
        // 2.2 유효성 검사 통과 시, 데이터 저장
        $data = array(
          'title' => $this->input->post('title'),
          'content' => $this->input->post('content'),
          'created_at' => date('Y-m-d H:i:s', time())
        );

        // 3. 모델에서 createPost()호출하여 게시글 생성
        $this->Create_model->createPost($data);
        
        // 4. 생성 후 게시판으로 리디렉션
        redirect('posts');
      }
    }
  }
?>