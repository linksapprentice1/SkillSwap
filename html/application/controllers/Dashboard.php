<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->load->library('session');
    if(null == $this->session->userdata('logged_in')){
       $this->load->helper('url');
       redirect('/index.php/login', 'refresh');
    }
     
    $this->load->database();
    $this->load->model("Skills");
    $data = $this->Skills->topSkillsAndDesiredSkills();

    $this->load->view('header');
    $this->load->view('navbar');
    $this->load->view('dashboard', $data);
    $this->load->view('footer');
  }
}
