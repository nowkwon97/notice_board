<?php
  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->model('Login_model');
      $this->load->helper('url');
    }

    /**
     * Todo 로그인에 필요한 로직
     * form으로부터 input 데이터 가져오기
     * form으로부터 가져온 username, password 검증
     * 인증 성공 시 세션 생성
     * 로그인 성공 후 게시판으로 리디렉션
     * Todo 로그아웃에 필요한 로직
     * 세션을 제거하여 로그아웃 처리
     */
    public function index() {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->form_validation->set_rules('username', '사용자명', 'required');
      $this->form_validation->set_rules('password', '비밀번호', 'required');

      if ($this->form_validation->run()===FALSE) {
        // 폼 유효성 검사 실패 시
        echo "폼 유효성 검사 실패 시";
        //! 현재 유효성 검사 실패가 뜨고있음..
        $this->load->view('userMgmt/login');
      } else {
        // 폼 유효성 검사 성공 시
        echo "폼 유효성 검사 성공 시";
        // DB에서 정보 확인 후 일치 시 게시판으로
        // 불 일치 시 로그인으로 리디렉션
        $user = $this->Login_model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
          // form의 input 데이터가 DB의 데이터와 일치할 시
          echo "폼 유효성 검사 성공 및 form의 input이 DB와 일치할 시";
          // 세션 발급 및 게시판으로 리디렉션
          $userData = array(
            'username' => $user['username'],
            'logged_in' => TRUE
          );
          $this->session->set_userdata($userData);

          redirect('posts');
        } else {
          // form의 데이터가 DB의 데이터와 일치하지 않을 시
          echo "폼 유효성 검사 성공이지만 form의 input이 DB와 일치하지 않을 시";
          redirect('login');
        }
      }
    }
  }
?>