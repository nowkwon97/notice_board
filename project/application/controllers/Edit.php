<?php
  class Edit extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('Edit_model');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->helper('url');
      $this->load->database();
    }

    public function index($id) {
      //* 게시글 수정 기능 구현
      /**
       * ? 1. 게시글 가져오기
       * ? 2. 현재의 title, content를 view의 edit.php로 보내기위해 변수 선언 및 할당
       * ? 3. 폼 유효성 검사 실행
       * ? 4. 로그인 한 계정의 id의 게시글만 수정이 가능하도록 하는 로직 실행
       * ?  4.1 session의 username을 $username에 초기화
       * ?  4.2 브라우저의 url의 id와 비교하기 위한 user_id 초기화
       * ?  4.3 SELECT id from posts WHERE user_id = $user_id
       * ?  4.4 getIdByUserId의 결과가 여러 개일 경우를 대비하여 result()로 받음
       * ? 5. 브라우저url의 id($id)와 username의 user_id비교
       * ?  5.1 $username의 id($user_id)가 id와 일치할 시
       * ?  5.2 폼 유효성 검사 결과에 따라 처리
       * ?    5.2.1 폼 유효성 검사 실패 시 다시 작성 폼 표시
       * ?    5.2.2 폼 유효성 검사 성공 시 수정된 내용을 배열형태로 변수에 저장
       * ?    5.2.3 Edit_model에서 editPost()를 호출
       * ?    5.2.4 수정 후 게시판으로 리디렉션
       */

      // 1. 게시글 가져오기
      $data['posts'] = $this->Edit_model->getPostForEditPost($id);

      // 2. 현재의 title, content를 view의 eidt.php로 보내기 위해 변수 선언 및 할당
      $title = $data['posts'][0]['title'];
      $content = $data['posts'][0]['content'];

      // 3. 폼 유효성 검사 실행
      $this->form_validation->set_rules('title', '제목', 'required');
      $this->form_validation->set_rules('content', '내용', 'required');

      // 4. 로그인 한 계정의 id의 게시글만 수정이 가능하도록 하는 로직 실행

      // 4.1 session의 username을 $username에 초기화
      $username = $this->session->userdata('username');
      // 4.2 브라우저의 url의 id와 비교하기 위한 user_id 초기화
      $user_id = $this->Edit_model->getUserIdByUsername($username);
      // 4.3 SELECT id from posts WHERE user_id = $user_id
      $query = $this->Edit_model->getIdByUserId($user_id);
      // 4.4 getIdByUserId의 결과가 여러 개일 경우를 대비하여 result()로 받음
      $queryId = $query->result();
      // 쿼리 결과에 따른 값들을 반복하여 true로 설정해줌
      $canEdit = false;
      foreach ($queryId as $row) {
        if ($row->id == $id) {
          $canEdit = true;
          break;
        }
      }
      // 5. 브라우저url의 id($id)와 username의 user_id 비교
      if ($canEdit) {
        // 5.1 $username의 id($user_id)가 id와 일치할 시

        // 5.2 폼 유효성 검사 결과에 따라 처리
        if ($this->form_validation->run()===FALSE) {
          // 5.2.1 폼 유효성 검사 실패 시 다시 작성 폼 표시
          $this->load->view('posts/edit', array('data'=>$data, 'title'=>$title, 'content'=>$content));
          return;
        } else {
          // 5.2.2 폼 유효성 검사 성공 시 수정된 내용을 배열 형태로 변수에 저장
          $postData = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
          );

          // 5.2.3 Edit_model에서 editPost()를 호출
          $this->Edit_model->editPost($id, $postData);

          // 5.2.4 수정 후 게시판으로 리디렉션
          redirect('posts');
        }
      } else {
        // $username의 id($user_id)가 id와 일치하지 않을 시
        echo "<h3>권한이 없습니다.</h3>";
      }
    }
  }
?>