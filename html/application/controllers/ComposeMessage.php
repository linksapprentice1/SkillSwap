<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComposeMessage extends CI_Controller {

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
    if(null == $this->session->userdata('logged_in')){
      $this->load->helper('url');
      redirect('/index.php/login', 'refresh');
    }
    $this->load->view('header');
    $this->load->view('navbar');
    $this->load->view('compose_message');
    $this->load->view('footer');
  }
  public function sendMessage(){

    $from = $this->session->userdata('logged_in')['user_id'];
    if ($from != null){
      $username = $this->input->post("username");
      $message = $this->input->post("message");

      $this->load->database();
      $this->load->model('Mail');
      $to = $this->Mail->getIdFromUsername($username);
      $this->Mail->sendMessage($message, $to, $from);
      redirect("index.php/outbox");
    }
  }
 public function deleteMessage(){
      $user_id= $this->session->userdata('logged_in')['user_id'];
      $mailbox_id= $this->input->post("mailbox_id");
      $this->load->database();
      $this->load->model('Mail');
      $this->Mail->deleteMessage($user_id, $mailbox_id);
      $mailbox= $this->input->post("mailbox");
      if ($mailbox=="outbox")
       redirect("index.php/outbox");
      else 
       redirect("index.php/inbox");
 }
}
