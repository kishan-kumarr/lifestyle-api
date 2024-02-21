<?php
  defined('BASEPATH') or die('not allow to access script');
  class Login extends CI_Controller
     {
      function __construct()
      {
         parent::__construct();
         $this->load->model('AdminLoginModel','LM');
      }
      
      function index()
      {
         if($this->session->userdata('BranchManagerEmail'))
         {
           redirect('sub-admin-dashboard');
         }
         else
          {
               $sub=$this->input->post("login");
               if (isset($sub)) 
               { 
                      $this->form_validation->set_rules('email','Email','required');
                      $this->form_validation->set_rules('pass','Password','required');
                      if ($this->form_validation->run()==true) 
                      {
                       
                          $email=$this->input->post("email");
                          $pass=$this->input->post("pass");
                          if ($res = $this->LM->subLogin($email,$pass)) 
                          {
                            $this->session->set_userdata('BranchManagerEmail',$email);    
                            $this->session->set_userdata('BranchManagerId',$res[0]['id']);  
                           // $this->session->set_flashdata("Success","You are Successfully logged in");
                            redirect("sub-admin-dashboard");
                          }
                          else
                          {
                             $this->session->set_flashdata('Error',"Incorrect Email or Password");
                            
                          }
                      }// false form validation 
                      else
                      {
                        $this->session->set_flashdata('Error',"Incorrect Email or Password");
                        $this->load->view('sub-admin/login');
                      }
               }
           $this->load->view('sub-admin/login');
         }
      }

    function logout()
      { 
        $this->session->unset_userdata('BranchManagerEmail');
        redirect("sub-admin");
      }
     }
?>