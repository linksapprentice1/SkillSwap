<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile extends CI_Controller {

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
    $data=$this->User->dataWithoutSkills($user_id);

    if ($data !=null){
       $this->load->view('edit_profile', $data);
    }

    $this->load->view('footer');
  }
  public function edit(){
    $user_id = $this->session->userdata("logged_in")['user_id'];
    $username = $this->session->userdata("logged_in")['username'];
    if (isset($user_id)){
       $config['upload_path'] = './uploads/';
       $config['allowed_types'] = 'gif|jpg|png';
       $config['file_name']= $username . '.jpg';
       $config['overwrite'] = true;
       $this->load->library('upload', $config);

       $uploaded_image = $this->upload->do_upload();

      $data  = array("age"=>$this->input->post("age"), "gender" =>$this->input->post("gender"), "zip" => $this->input->post("zip"), "description"=>$this->input->post("description"));
      if ($uploaded_image)
         $data["image"] = 1;
      $this->load->database();
      $this->load->model('User');
      $this->User->editWithoutSkills($user_id, $data);
    }
     redirect('/index.php/editProfile', 'refresh'); 
   
  }
}
