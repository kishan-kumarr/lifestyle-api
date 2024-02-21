<?php
     defined('BASEPATH') or die('not allow to access script');
     class Dashboard extends CI_Controller
     {
     	function __construct()
     	{
     		parent::__construct();
            if(!$this->session->userdata('AdminEmail'))
            {
              redirect('admin');
            }
     	}

      /*  admin Dashboard
       *  @method index
       *  @param null
       *  @route dashboard
       */

     	function index()
       	{
          $cond  = array('status' => '1');
          $cond2 = array('status' => '1','role' => '2');
          $order = array('id','DESC');

           $data['total_ceo']      = $this->CommonModel->select('admin', $cond2 ,$order);
           $data['total_managers'] = $this->CommonModel->select('branch_manager', $cond ,$order);
           $data['total_drivers']  = $this->CommonModel->select('driver', $cond ,$order);

           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');
           $this->load->view('admin/dashboard', $data);
           $this->load->view('admin/footer');
       	}


       /*  Dashboard update profile
       *   @method update_profile
       *   @param null
       *   @route update-profile
       */

        function update_profile()
        {
           $table='admin';
           $cond=array('email'=>$this->session->userdata('AdminEmail'));
           $select='*';
           $data['data'] = $this->CommonModel->single($table, $cond, $select);

          if(isset($_POST['submit']))
           {
              $this->form_validation->set_rules('email','Email','required');
              $this->form_validation->set_rules('password','Password','required');

                    if ($this->form_validation->run()==true)
                      {
                        $updateData = array(
                                          'email'           => $this->input->post('email'),
                                          'normal_password' => $this->input->post('password'),
                                          'password'        => md5($this->input->post('password'))
                                          );

                           if($this->CommonModel->update($table, $updateData, $cond))
                            {
                              $this->session->set_userdata('AdminEmail',$this->input->post('email'));
                              $this->session->set_flashdata("Success","Updated Successfully");
                              redirect(base_url('dashboard'),'refresh');
                            }
                            else
                            {
                             $this->load->view('admin/header');
                             $this->load->view('admin/sidebar');
                             $this->load->view('admin/update_profile', $data);
                             $this->load->view('admin/footer');
                            }
                      }
                      else
                      {
                       // if validation false
                       $this->load->view('admin/header');
                       $this->load->view('admin/sidebar');
                       $this->load->view('admin/update_profile', $data);
                       $this->load->view('admin/footer');
                      }
              }
              else
              {
               $this->load->view('admin/header');
               $this->load->view('admin/sidebar');
               $this->load->view('admin/update_profile', $data);
               $this->load->view('admin/footer');
              }

        }


     }
?>
