<?php
  class SignUp extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->database();
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->helper('url');
      $this->load->model('SignUp_model');
    }

    /**
     * todo 회원가입 로직 필요
     * form에서 받아온 username, password를 변수로 초기화
     * 폼 유효성 검사를 해야한다.
     * 폼 유효성 검사에 따라 결과 및 오류 처리
     * 회원가입 화면에서 받아온 username, password를 DB에 넣어야 한다.
     * 회원 가입 성공 시 로그인 페이지로 리디렉션
     */

    public function index() {
      //* 회원 가입 기능 구현

      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->form_validation->set_rules('username', '사용자명', 'required');
      $this->form_validation->set_rules('password', '비밀번호', 'required');

      // 폼 유효성 검사 실행
      if ($this->form_validation->run()===FALSE) {
        // 폼 유효성 검사 실패 시
        $this->load->view('userMgmt/signUp');
      } else {
        // 폼 유효성 검사 성공 시
        $data = array(
          'username' => $username,
          'password' => $password,
        );
        $query = $this->SignUp_model->getWhere($username);
        if ($query->num_rows()>0) {
          echo "<script>alert('존재하는 아이디입니다.')</script>";
        } else {
          $this->db->insert('users', $data);
          redirect('login');
        }
      }
    }
  }
?>