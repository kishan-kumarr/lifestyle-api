<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_branch extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
        
          $this->table="branch";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {

          $cond=array();
          $order=array('id','DESC');

          $data['branchList'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/all_branch', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_branch(){
           
       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('branchName', 'Branch Name', 'trim|required|is_unique[branch.branchName]');
               if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                          'branchName' => $this->input->post('branchName'),
                                          'status'     => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('branch-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-branch');
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_branch');
                         $this->load->view('admin/footer');
                        }

          }
          else
              {    
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/add_branch');
                $this->load->view('admin/footer');
              }

         
      }


   

    function changeStatus($id){
      $select= 'status';
      $cond = array('id' => $id);
     
      $user = $this->CommonModel->single($this->table, $cond, $select);

      if($user['status'] == 1)
        {
          $updateStatus = 0;
        }
      else 
        {
          $updateStatus = 1;
        }
    
      $data = array('status' => $updateStatus);
      $cond = array('id' => $id);
      if($this->CommonModel->update($this->table, $data, $cond))
      {
        $this->session->set_flashdata('Success', 'Status Changed Successfully');
        redirect('branch-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('branch-list');
      }

    }

   

     function updateBranch($id)
     {
       $cond=array('id' => $id);
       $select='*';
       $branchRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if($this->input->post('submit'))
       {
            if($this->input->post('branchName') != $branchRecord['singleRecord']['branchName'])
             {
               $is_unique =  '|is_unique[branch.branchName]';
             } 
              else
               {
                 $is_unique =  '';
               }
            $this->form_validation->set_rules('branchName', 'Branch Name', 'required|trim'.$is_unique);
            if($this->form_validation->run()==true)
                   { 
                      
                        $update_data  = array(
                                          'branchName' => $this->input->post('branchName'),
                                        );
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('branch-list'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-branch/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_branch', $branchRecord);
                         $this->load->view('admin/footer');
                        }
            }
            else
            {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/edit_branch', $branchRecord);
              $this->load->view('admin/footer');
            }
            
        
      }


   

      function deleteBranch($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('branch-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('branch-list');
                }
             }


    }
?>