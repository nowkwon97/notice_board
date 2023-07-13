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
      // require(APPPATH . 'config/database.php');
      // DB연결
      // $conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);
      // $this->load->database();

      // 게시글 목록 조회 쿼리 실행
      // $sql = "SELECT * FROM posts ORDER BY created_at DESC";
      // $result = mysqli_query($conn, $sql);
      // $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC");
      // $data['posts'] = $query->result_array();

      // view로 보내기 위한 빈 배열 생성
      // $data['posts'] = array();
      
      // 결과를 $data 배열에 저장
      // if (mysqli_num_rows($result)>0) {
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     $data['posts'][] = $row;
      //   }
      // }
      // 디버깅
      // print_r($data['posts']);

      //* Post_model 불러오기
      $this->load->model('Post_model');
      //* Post_model에서 getPosts() 함수를 불러와 반환된 값을 $data['posts']에 저장
      $data['posts'] = $this->Post_model->getPosts();

      $this->load->view('posts/index', $data);
    }

    public function view($id) {
      // 게시글 상세 조회 기능 구현

      // DB 연결
      $this->load->database();

      // SELECT * FROM posts WHERE 'id' = '$id'
      $query = $this->db->get_where('posts', array('id' => $id));

      $data['posts'] = $query->row_array();
      // print_r($data['posts']);

      $this->load->view('posts/view', $data);
    }

    public function create() {
      // 게시글 작성 기능 구현

      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('date');
      $this->load->library('form_validation');
      $this->load->database();
      
      // 폼 유효성 검사
      $this->form_validation->set_rules('title', '제목', 'required');
      $this->form_validation->set_rules('content', '내용', 'required');
      
      if ($this->form_validation->run() === FALSE){
        // 유효성 검사 실패 시, 다시 작성 폼 표시
        $this->load->view('posts/create');
        return;
      } else {
        // 유효성 검사 통과 시, 데이터 저장
        $data = array(
          'title' => $this->input->post('title'),
          'content' => $this->input->post('content'),
          //! 시간이 현재 시간으로 나오지 않고있음(날짜는 잘 나옴)
          'created_at' => date('Y-m-d H:i:s', time())
        );
        // DB에 데이터 삽입
        $this->db->insert('posts', $data);
        // 작성 후 다시 리디렉션
        // 리디렉션을 쓰기위해선 url helper를 불러와야한다.
        redirect('posts');
      }
      
      $this->load->view('posts/create');
    }

    public function edit($id) {
      // 게시글 수정 기능 구현
      echo $id;

      // DB 연결
      $this->db->database();

      // 게시글 수정 쿼리
      $query = $this->db->

      $this->load->view('posts/edit');
    }

    public function delete($id) {
      // 게시글 삭제 기능 구현
      $this->load->view('posts/delete');
    }
  }
?>