<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_location extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
          $this->table="location";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {
          $cond=array();
          $order=array('id','DESC');

          $data['locationList'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/all_location', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_location(){

       if(isset($_POST['submit']))
          {

            $this->form_validation->set_rules('locationName', 'Location Name', 'trim|required|is_unique[location.locationName]');
            $this->form_validation->set_rules('countryName', 'Country Name', 'trim|required');
            $this->form_validation->set_rules('stateName', 'State Name', 'trim|required');
            $this->form_validation->set_rules('cityName', 'City Name', 'trim|required');
               if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                          'locationName' => $this->input->post('locationName'),
                                          'countryName'  => $this->input->post('countryName'),
                                          'stateName'    => $this->input->post('stateName'),
                                          'cityName'     => $this->input->post('cityName'),
                                          'status'       => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('location-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-location');
                                }
                       
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_location');
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_location');
            $this->load->view('admin/footer');
          }

         
      }


   

    function changeStatus($id)
    {
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
        redirect('location-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('location-list');
      }

    }

   

     function updateLocation($id){
       $cond=array('id' => $id);
       $select='*';
       $locationRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
            if($this->input->post('locationName') != $locationRecord['singleRecord']['locationName'])
             {
               $is_unique =  '|is_unique[location.locationName]';
             } 
              else
               {
                 $is_unique =  '';
               }
            $this->form_validation->set_rules('locationName', 'Location Name', 'required|trim'.$is_unique);
            $this->form_validation->set_rules('countryName', 'Country Name', 'trim|required');
            $this->form_validation->set_rules('stateName', 'State Name', 'trim|required');
            $this->form_validation->set_rules('cityName', 'City Name', 'trim|required');

            if($this->form_validation->run()==true)
                   { 
                      
                        $update_data  = array(
                                          'locationName' => $this->input->post('locationName'),
                                          'countryName'  => $this->input->post('countryName'),
                                          'stateName'    => $this->input->post('stateName'),
                                          'cityName'     => $this->input->post('cityName')
                                        );
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('location-list'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-location/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_location', $locationRecord);
                         $this->load->view('admin/footer');
                        }

         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/edit_location', $locationRecord);
         $this->load->view('admin/footer');
      }


   

      function deleteLocation($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('location-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('location-list');
                }
             }



    }
?>