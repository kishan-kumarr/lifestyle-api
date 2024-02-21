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
         if($this->session->userdata('AdminEmail'))
         {
           redirect('dashboard');
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
                          $loginAs=$this->input->post("loginAs");
                          if ($res = $this->LM->login($email, $pass, $loginAs))
                          {
                            $this->session->set_userdata('AdminEmail',$email);
                            $this->session->set_userdata('AdminId',$res[0]['id']);
                            //$this->session->set_flashdata("Success","You are Successfully logged in");
                            redirect("dashboard");
                          }
                          else
                          {
                             $this->session->set_flashdata('Error',"Incorrect Email or Password");
                          }
                     }
                     else
                     {
                      $this->session->set_flashdata('Error',"Incorrect Email or Password");
                      $this->load->view('admin/login');
                     }
               }
           $this->load->view('admin/login');
         }
      }

    function logout()
      {
        $this->session->unset_userdata('AdminEmail');
        redirect("admin");
      }
     }
?>
