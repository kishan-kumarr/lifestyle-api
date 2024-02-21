<?php
     defined('BASEPATH') or die('not allow to access script');
     class Dashboard extends CI_Controller
     {
     	function __construct()
     	{
     		parent::__construct();
         if(!$this->session->userdata('BranchManagerEmail'))
         {
           redirect('sub-admin');
         }
     	}


    /*  admin Dashboard 
     *  @method index
     *  @param null
     *  @route dashboard
     */
     	function index()
       	{ 
       
           // $cond=array('status' => '1');
           // $order=array('id','DESC');
           
           // $data['total_ceo']      = $this->CommonModel->select('ceo', $cond ,$order);
           // $data['total_managers'] = $this->CommonModel->select('branch_manager', $cond ,$order);
           // $data['total_drivers']  = $this->CommonModel->select('driver', $cond ,$order);
           
           $this->load->view('sub-admin/header');
           $this->load->view('sub-admin/sidebar');
           $this->load->view('sub-admin/dashboard');
           $this->load->view('sub-admin/footer');
       	}


     /*  Dashboard update profile
     *  @method update_profile
     *  @param null
     *  @route update-profile
     */
        function update_profile()
        {
          
           $table='branch_manager';
           $cond=array('email'=>$this->session->userdata('BranchManagerEmail'));
           $select='*';
           $data['singleRecord'] = $this->CommonModel->single($table, $cond, $select);
         
          if(isset($_POST['submit']))
           {
              $this->form_validation->set_rules('email','Email','required');
              $this->form_validation->set_rules('password','Password','required');
                    
                    if ($this->form_validation->run()==true) 
                      {  
                    // ************************* uploading image *********************************
                              if(empty($_FILES['document']['name']))
                                   { 
                                     $document = $this->input->post('hiddenDocument');
                                   }
                                    else 
                                      { 
                                          unset($config);
                                          $date = time();
                                          $config['upload_path'] = './assets/admin/document/branch_manager';
                                          $config['allowed_types'] = 'pdf';
                                          $config['overwrite'] = FALSE;
                                          $config['remove_spaces'] = TRUE;
                                          $documentName = $date.$_FILES['document']['name'];
                                          $config['file_name'] = $documentName;
                                          $this->load->library('upload', $config);
                                          $this->upload->initialize($config);
                                          if(!$this->upload->do_upload('document'))
                                           {
                                             // echo $this->upload->display_errors();exit;
                                              $this->session->set_flashdata('Error', $this->upload->display_errors());
                                              redirect('sub-admin-update-profile/'.$id); 
                                           }
                                          else
                                            { 
                                              $document = $documentName;
                                            }
                                          }
                                     // ************************* End uploading image *********************************
                                    $update_data  = array(
                                                    'name'              => $this->input->post('name'),
                                                    'email'             => $this->input->post('email'),
                                                    'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                                                    'mobile'            => $this->input->post('mobile'),
                                                    'address'           => $this->input->post('address'),
                                                    'document'          => $document,
                                                    'password'          => md5($this->input->post('password')),
                                                    'normalPassword'    => $this->input->post('password')
                                                    );
                                   if($this->CommonModel->update($table, $update_data, $cond))
                                   {
                                     $this->session->set_userdata('BranchManagerEmail',$this->input->post('email'));
                                     $this->session->set_flashdata("Success","Updated Successfully");
                                     redirect(base_url('sub-admin-dashboard'),'refresh');
                                  } 
                                  else 
                                  {
                                     $this->session->set_flashdata("Error","Somthing went wrong");
                                     redirect('sub-admin-update-profile/'.$id); 
                                  }
                          }       
                        else 
                        {
                         $this->load->view('sub-admin/header');
                         $this->load->view('sub-admin/sidebar');
                         $this->load->view('sub-admin/update_profile', $data);
                         $this->load->view('admin/footer'); 
                        }
                    
              }

          
           $this->load->view('sub-admin/header');
           $this->load->view('sub-admin/sidebar');
           $this->load->view('sub-admin/update_profile', $data);
           $this->load->view('sub-admin/footer');
        }
		

     }
?>