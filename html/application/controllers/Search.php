<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
    $this->load->view('header');
    $this->load->view('search');
    $this->load->view('footer');
  }
  public function searchSkill(){
    $skill_name = $this->input->post("skill_name");  
    $this->load->view('header');
    $this->load->view("navbar");
    $this->load->database();
    
    $this->load->model('Skills');
    $data = $this->Skills->usersBySkill($skill_name, 10, 0);
    $data['skills_desired'] = false;
    $this->load->view('users_by_skill', $data);
    $this->load->view("footer"); 
  }
  public function searchDesiredSkill(){
    $skill_name = $this->input->post("skill_name");
    $this->load->view("header");
    $this->load->view("navbar");

    $this->load->database();

    $this->load->model('Skills');
    $data = $this->Skills->usersByDesiredSkill($skill_name, 10, 0);
    $data["skills_desired"] = true;
    $this->load->view("users_by_skill", $data);
    $this->load->view("footer");
  }
}
