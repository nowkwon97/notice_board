<?php
//! 컨트롤러 파일 이름과 해당 클래스의 이름이 정확히 일치해야 한다.
  class Posts extends CI_Controller {
    public function index() {
      //* 게시글 목록 조회 기능 구현

      // DB 정보 불러오기
      //? APPPATH는 CI 프레임워크에서 애플리케이션 디렉토리의 경로를 나타내는 상수이다.
      //? APPPATH 상수는 application 디렉토리의 절대 경로를 가리킨다.
      //? APPPATH 를 사용하여 애플리케이션 디렉토리 내의 파일 및 디렉토리 접근 가능
      require(APPPATH . 'config/database.php');
      // DB연결
      $conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

      // 게시글 목록 조회 쿼리 실행
      $sql = "SELECT * FROM posts ORDER BY created_at DESC";
      $result = mysqli_query($conn, $sql);
      
      //* view로 보내기 위한 빈 배열 생성
      $data['posts'] = array();
      
      // 결과를 $data 배열에 저장
      if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $data['posts'][] = $row;
        }
      }
      // 디버깅
      // print_r($data['posts'][0]);

      $this->load->view('posts/index', $data);
    }

    public function view() {
      // 게시글 상세 조회 기능 구현
      $this->load->view('posts/view');
    }

    public function create() {
      // 게시글 작성 기능 구현
      $this->load->view('posts/create');
    }

    public function edit() {
      // 게시글 수정 기능 구현
      $this->load->view('posts/edit');
    }

    public function delete() {
      // 게시글 삭제 기능 구현
      $this->load->view('posts/delete');
    }
  }
?>