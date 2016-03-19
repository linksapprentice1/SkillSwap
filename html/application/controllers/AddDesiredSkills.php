<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDesiredSkills extends CI_Controller {

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
    $this->load->model('User');
    $user_id = $this->session->userdata('logged_in')['user_id'];
    $skills = $this->User->skillsDesired($user_id);
 
    $this->load->view('header');
    $this->load->view('navbar');
    $this->load->view('add_desired_skills', array("skills"=> $skills));
    $this->load->view('footer');
  }
  public function addDesiredSkill(){
    $user_id = $this->session->userdata('logged_in')['user_id'];
    if (isset($user_id)){
      $this->load->database();
      $this->load->model('User');
      $skill_name = $this->input->post("skill_name");
      $skill_id = $this->User->addDesiredSkill($user_id, $skill_name);
      echo json_encode(array("id"=>$skill_id, "name"=>$skill_name));
    }
  }

  public function deleteDesiredSkill(){
    $user_id = $this->session->userdata('logged_in')['user_id'];
    if (isset($user_id)){
      $this->load->database();
      $this->load->model("User");
      $skill_id = $this->input->post("skill_id");
      $this->User->deleteDesiredSkill($user_id, $skill_id);
    }
  }
}
