<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_state extends CI_Controller
     {
      function __construct()
      {
         parent::__construct();
          $this->load->model('JoinModel');
          $this->table="state";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {
          $cond=array();
          $order=array('id','DESC');

          $data['stateList'] = $this->JoinModel->getCountryState();
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_state', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_state(){
          $data['error'] = array('stateName' => '');
          $cityCond=array('status' => '1');
          $cityOrder=array('id','DESC');
          $data['coutnryList'] = $this->CommonModel->select('country', $cityCond ,$cityOrder);

       if(isset($_POST['submit']))
          {
            $response = $this->formValidation();
            $data['error'] = $response;
          }

         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/add_state', $data);
         $this->load->view('admin/footer');
      }


     function formValidation()
     {

        $response = array();
            $this->form_validation->set_rules('stateName', 'State Name', 'trim|required|is_unique[state.stateName]');
            $this->form_validation->set_rules('countryId', 'Country Name', 'trim|required');
               if($this->form_validation->run()==true) 
                      { echo 'true'; exit;

                         $insert_data  = array(
                                          'countryId' => $this->input->post('countryId'),
                                          'stateName' => $this->input->post('stateName'),
                                          'status'   => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('state-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-state');
                                }
                       
                      }
                      else 
                        {
                          //$response =  validation_errors();
                          $response = $this->form_validation->error_array();

                          //$this->session->set_flashdata('Error', 'State Name must be unique !');
                          //redirect('add-state');
                         // $this->load->view('admin/header');
                         // $this->load->view('admin/sidebar');
                         // $this->load->view('admin/add_state', $data);
                         // $this->load->view('admin/footer');
                        }
                      return $response;

          
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
        redirect('state-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('state-list');
      }

    }

   

     function updateState($id = ''){
          $countryCond=array('status' => '1');
          $countryOrder=array('id','DESC');
          $stateRecord['countryList'] = $this->CommonModel->select('country', $countryCond ,$countryOrder);
           $cond=array('id' => $id);
           $select='*';
           $stateRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if(isset($_POST['submit']))
          {
             if($this->input->post('stateName') != $stateRecord['singleRecord']['stateName'])
                 {
                   $is_unique =  '|is_unique[state.stateName]';
                 } 
                  else
                   {
                     $is_unique =  '';
                   }
            $this->form_validation->set_rules('stateName', 'State Name', 'trim|required'.$is_unique);
            $this->form_validation->set_rules('countryId', 'Country Name', 'trim|required');
               if($this->form_validation->run()==true) 
                      { 
                         $update_data = array(
                                          'countryId' => $this->input->post('countryId'),
                                          'stateName' => $this->input->post('stateName'),
                                          'status'    => '1'
                                        );
                            if($this->CommonModel->update($this->table , $update_data, $cond))
                              {
                                 $this->session->set_flashdata('Success', 'Update Successfully Done');
                                 redirect('state-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('update-state/'.$id);
                                }
                       
                      }
                      else 
                        {
                         $this->session->set_flashdata('Error', 'State Name must be unique !');
                         redirect('update-state/'.$id);
                        }

          }

         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/update_state', $stateRecord);
         $this->load->view('admin/footer');
      }


   

      function deleteState($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('state-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('state-list');
                }
             }


    }
?>