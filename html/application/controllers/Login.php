<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
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
    $this->load->view('login');
    $this->load->view('footer');
  }
  public function loginForm(){
   $this->load->library('session');

   $this->load->database();
   $result= $this->db->query("SELECT id, username from User where username=? and password=?", array($this->input->post("username"),md5($this->input->post("password")))); 
   if ($result->row() != null){
      $user_result = $result->row();
      $session_data = array(
        'username' => $user_result->username,
        'user_id' => $user_result->id
      );
      // Add user data in session
      $this->session->set_userdata('logged_in', $session_data);
      $this->load->helper('url');
      redirect('/index.php/dashboard', 'refresh');
   }
   else{
    $data=array("error_message"=>"Incorrect username or password.");
    $this->load->view('header');
    $this->load->view('login', $data);
    $this->load->view('footer');
   }
 }
}
