<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class YourProfile extends CI_Controller {

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

    $user_id = $this->session->userdata("logged_in")['user_id'];

   $this->load->view('header');
   $this->load->view('navbar');

   $this->load->database();

   $this->load->model('User');   
   $data=$this->User->dataWithSkills($user_id);

   if ($data !=null){
       $this->load->view('profile', $data);
   }

    $this->load->view('footer');
  }
}
