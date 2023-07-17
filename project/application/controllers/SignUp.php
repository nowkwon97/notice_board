<?php
  class SignUp extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
    }

    /**
     * todo 회원가입 로직 필요
     * 폼 유효성 검사를 해야한다.
     * 폼 유효성 검사에 따라 결과 및 오류 처리
     * 회원가입 화면에서 받아온 username, password를 DB에 넣어야 한다.
     * 회원 가입 성공 시 로그인 페이지로 리디렉션
     */

    public function index() {


      redirect('login');
    }
  }
?>