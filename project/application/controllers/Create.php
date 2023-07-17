<?php
  class Create extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Post_model');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->helper('date');
      $this->load->database();
    }

    public function index() {
      //* 게시글 작성 기능 구현
      // 폼 유효성 검사
      $this->form_validation->set_rules('title', '제목', 'required');
      $this->form_validation->set_rules('content', '내용', 'required');

      if ($this->form_validation->run()===FALSE) {
        // 유효성 검사 실패 시, 다시 작성 폼 표시
        $this->load->view('posts/create');
        return;
      } else {
        // 유효성 검사 통과 시, 데이터 저장

        $data = array(
          'title' => $this->input->post('title'),
          'content' => $this->input->post('content'),
          'created_at' => date('Y-m-d H:i:s', time())
        );
        // Post_model 에서 createPost()함수 호출
        $this->Post_model->createPost($data);
        // 작성 후 다시 리디렉션
        redirect('posts');
      }
    }
  }
?>