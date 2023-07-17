<?php
  class Edit extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Edit_model');
      $this->load->library('form_validation');
      $this->load->helper('url');
    }

    public function index($id) {
      //* 게시글 수정 기능 구현
      /**
       * ? 1. 게시글 가져오기
       * ? 2. 현재의 title, content를 edit.php로 보내기위해 변수 선언 및 할당
       * ? 3. 폼 유효성 검사 실행
       * ? 4. 폼 유효성 검사 결과에 따라 처리
       * ?  4.1 폼 유효성 검사 실패 시 다시 작성 폼 표시
       * ?  4.2 폼 유효성 검사 성공 시 수정된 내용을 배열 형태로 변수에 저장
       * ? 5. Edit_model에서 editPost() 호출
       * ? 6. 수정 후 게시판으로 리디렉션
       */

      // 1. 게시글 가져오기
      $data['posts'] = $this->Edit_model->getPostForEditPost($id);

      // 2. 현재의 title, content를 eidt.php로 보내기 위해 변수 선언 및 할당
      $title = $data['posts'][0]['title'];
      $content = $data['posts'][0]['content'];

      // 3. 폼 유효성 검사 실행
      $this->form_validation->set_rules('title', '제목', 'required');
      $this->form_validation->set_rules('content', '내용', 'required');

      // 4. 폼 유효성 검사 결과에 따라 처리
      if ($this->form_validation->run()===FALSE) {
        // 4.1 폼 유효성 검사 실패 시 다시 작성 폼 표시
        $this->load->view('posts/edit', array('data'=>$data, 'title'=>$title, 'content'=>$content));
        return;
      } else {
        // 4.2 폼 유효성 검사 성공 시 수정된 내용을 배열 형태로 변수에 저장
        $postData = array(
          'title' => $this->input->post('title'),
          'content' => $this->input->post('content'),
        );

        // 5. Edit_model에서 editPost()를 호출
        $this->Edit_model->editPost($id, $postData);
        
        // 6. 수정 후 게시판으로 리디렉션
        redirect('posts');
      }
    }
  }
?>