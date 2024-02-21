<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_predefine_message extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
          //$this->load->model('JoinModel');
          $this->table="predefine_message";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {
          $cond = array();
          $order = array('id','DESC');

          $data['defaultMessage'] = $this->CommonModel->select($this->table, $cond, $order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_predefine_message', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_message(){

       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
               if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                          'defaultMessage' => $this->input->post('message'),
                                          'status'      => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('manage-predefine-message'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-predefine-message');
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_predifine_message');
                         $this->load->view('admin/footer');
                        }

          }
          else 
          {
             $this->load->view('admin/header');
             $this->load->view('admin/sidebar');
             $this->load->view('admin/add_predifine_message');
             $this->load->view('admin/footer');
          }
      }


   

    function changeStatus($id = ''){
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
        redirect('manage-predefine-message');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('manage-predefine-message');
      }

    }

   

     function updateMessage($id = ''){
      
           $cond=array('id' => $id);
           $select='*';
           $stateRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
          if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
               if($this->form_validation->run()==true) 
                      { 
                         $update_data = array(
                                          'defaultMessage' => $this->input->post('message')
                                        );
                            if($this->CommonModel->update($this->table , $update_data, $cond))
                              {
                                 $this->session->set_flashdata('Success', 'Update Successfully Done');
                                 redirect('manage-predefine-message'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('update-predefine-message/'.$id);
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/update_predefine_message', $stateRecord);
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');
           $this->load->view('admin/update_predefine_message', $stateRecord);
           $this->load->view('admin/footer');
           }
    }


   

      function deleteMessage($id = ''){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('manage-predefine-message');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('manage-predefine-message');
                }
             }






    }
?>