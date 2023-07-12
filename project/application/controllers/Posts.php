<?php
  class Posts extends CI_Controller {
    public function index() {
      //* 게시글 목록 조회 기능 구현
      
      // // DB 정보 불러오기
      // //? APPPATH는 CI 프레임워크에서 애플리케이션 디렉토리의 경로를 나타내는 상수이다.
      // //? APPPATH 상수는 application 디렉토리의 절대 경로를 가리킨다.
      // //? APPPATH 를 사용하여 애플리케이션 디렉토리 내의 파일 및 디렉토리 접근 가능
      // require(APPPATH . 'config/database.php');
      // // DB연결
      // $conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

      $this->load->view('posts/index');
    }

    public function view($id) {
      // 게시글 상세 조회 기능 구현
      $this->load->view('posts/view');
    }

    public function create() {
      // 게시글 작성 기능 구현
    }

    public function edit($id) {
      // 게시글 수정 기능 구현
    }

    public function delete($id) {
      // 게시글 삭제 기능 구현
    }
  }
?>