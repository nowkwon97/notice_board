<?php
//! 컨트롤러 파일 이름과 해당 클래스의 이름이 정확히 일치해야 한다.
  class Posts extends CI_Controller {
    public function index() {
      //* 게시글 목록 조회 기능 구현

      // mysqli가 아닌 CI 내장 DB 라이브러리를 이용하여 DB를 연결하고 테이블 데이터를 받아오는 로직으로 수정 필요.
      // DB 정보 불러오기
      //? APPPATH는 CI 프레임워크에서 애플리케이션 디렉토리의 경로를 나타내는 상수이다.
      //? APPPATH 상수는 application 디렉토리의 절대 경로를 가리킨다.
      //? APPPATH 를 사용하여 애플리케이션 디렉토리 내의 파일 및 디렉토리 접근 가능
      require(APPPATH . 'config/database.php');
      // DB연결
      // $conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);
      $this->load->database();

      // 게시글 목록 조회 쿼리 실행
      // $sql = "SELECT * FROM posts ORDER BY created_at DESC";
      // $result = mysqli_query($conn, $sql);
      $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
      $data['posts'] = $query->result_array();

      // view로 보내기 위한 빈 배열 생성
      // $data['posts'] = array();
      
      // 결과를 $data 배열에 저장
      // if (mysqli_num_rows($result)>0) {
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     $data['posts'][] = $row;
      //   }
      // }
      // 디버깅
      // print_r($data['posts'][0]);

      $this->load->view('posts/index', $data);
    }

    //! view부분 작업 중. $id를 파라미터로 사용하여 쿼리를 실행하는 로직에서 오류가 발생하는 것으로 보임
    public function view($id) {
      // 게시글 상세 조회 기능 구현

      // DB 연결
      $this->load->database();

      // SELECT * FROM posts WHERE 'id' = '$id'
      $query = $this->db->get_where('posts', array('id' => $id));

      $data['posts'] = $query->row_array();

      $this->load->view('posts/view', $data);
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