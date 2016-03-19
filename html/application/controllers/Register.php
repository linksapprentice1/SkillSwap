<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
    if(null != $this->session->userdata('logged_in')){
      $this->load->helper('url');
      redirect('/index.php/dashboard', 'refresh');
    }
    $this->load->view('header');
    $this->load->view('register');
    $this->load->view('footer');
  }
  public function signup(){
   $this->load->database();
   $result= $this->db->query("INSERT INTO User (`username`, `description`, `zip`, `gender`, `age`, `password`)  VALUES(?, ?, ?, ?, ?, ?)", array($this->input->post("username"), $this->input->post("description"), $this->input->post("zip"), $this->input->post("gender"), $this->input->post("age"), md5($this->input->post("password"))));

    if ($result == false){
       $data = array("error_message"=> "An error occurred.");
       $this->load->view('header');
       $this->load->view('register', $data);
       $this->load->view('footer');
    }
    else{
       $data = array("success_message"=> "Account created.");
       $this->load->view("header");
       $this->load->view("login", $data);
       $this->load->view("footer");
    }
  }
  public function usernameExists(){
    $username = $this->input->post("username");
 
    $this->load->database();

    $this->load->model('User');
    if ($this->User->exists($username))
        echo json_encode(array("exists"=>"true"));
    else
        echo json_encode(array("exists"=>"false"));
  }
}
