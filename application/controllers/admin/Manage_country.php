<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_country extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
          $this->load->model('JoinModel');
          $this->table="country";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {  
          $cond = array();
          $order = array('id','DESC');

          $data['countryList'] = $this->CommonModel->select($this->table, $cond, $order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_country', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_country(){
      
       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('countryName', 'Country Name', 'trim|required|is_unique[country.countryName]');
               if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                          'countryName' => $this->input->post('countryName'),
                                          'status'      => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('country-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-country');
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_country');
                         $this->load->view('admin/footer');
                        }

          }
          else
          { 
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_country');
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
        redirect('country-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('country-list');
      }

    }

   

     function updateCountry($id = ''){
         
           $cond=array('id' => $id);
           $select='*';
           $stateRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if(isset($_POST['submit']))
          {
             if($this->input->post('countryName') != $stateRecord['singleRecord']['countryName'])
                 {
                   $is_unique =  '|is_unique[country.countryName]';
                 } 
                  else
                   {
                     $is_unique =  '';
                   }
                     $this->form_validation->set_rules('countryName', 'Country Name', 'trim|required'.$is_unique);
                     if($this->form_validation->run()==true) 
                      { 
                         $update_data = array(
                                          'countryName' => $this->input->post('countryName')
                                        );
                            if($this->CommonModel->update($this->table , $update_data, $cond))
                              {
                                 $this->session->set_flashdata('Success', 'Update Successfully Done');
                                 redirect('country-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('update-country/'.$id);
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/update_country', $stateRecord);
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/update_country', $stateRecord);
            $this->load->view('admin/footer');
          }

         
      }


   

      function deleteCountry($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('country-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('country-list');
                }
             }






    }
?>