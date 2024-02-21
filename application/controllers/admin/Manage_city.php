<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_city extends MY_Controller 
     {
      function __construct()
      {
         parent::__construct();

          $this->load->model('JoinModel');
          $this->table="city";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {

          $data['cityList'] = $this->JoinModel->getCountryStateCity();
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_city', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_city(){

          $cond = array('status' => '1');
          $order = array('id','DESC');
          $data['coutnryList'] = $this->CommonModel->select('country', $cond ,$order);

       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('cityName', 'City Name', 'trim|required|is_unique[city.cityName]');
            $this->form_validation->set_rules('countryId', 'Country Name', 'trim|required');
            $this->form_validation->set_rules('stateId', 'State Name', 'trim|required');
               if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                          'cityName'  => $this->input->post('cityName'),
                                          'countryId' => $this->input->post('countryId'),
                                          'stateId'   => $this->input->post('stateId'),
                                          'status'    => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('city-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-city');
                                }
                       
                      }
                      else 
                        {
                         $this->session->set_flashdata('Error', 'City Name must be same');
                         redirect('add-city');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_city', $data);
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
        redirect('city-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('city-list');
      }

    }

   

     function updateCity($id){
      $cond1 = array('status' => '1');
      $order1 = array('id','DESC');
      $cityRecord['coutnryList'] = $this->CommonModel->select('country', $cond1 ,$order1);
       $cond=array('id' => $id);
       $select='*';
       $cityRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if(isset($_POST['submit']))
         {
            if($this->input->post('cityName') != $cityRecord['singleRecord']['cityName'])
             {
               $is_unique =  '|is_unique[city.cityName]';
             } 
              else
               {
                 $is_unique =  '';
               }
            $this->form_validation->set_rules('cityName', 'City Name', 'required|trim'.$is_unique);
            $this->form_validation->set_rules('countryId', 'Country Name', 'required|trim');
            $this->form_validation->set_rules('stateId', 'State Name', 'required|trim');
            
            if($this->form_validation->run()==true)
                   { 
                        $update_data  = array(
                                          'cityName'  => $this->input->post('cityName'),
                                          'countryId' => $this->input->post('countryId'),
                                          'stateId'   => $this->input->post('stateId')
                                        );
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('city-list'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Opps! Something went wrong');
                                redirect('update-city/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->session->set_flashdata('Error', 'City name must be unique');
                         redirect('update-city/'.$id); 
                        }
                }
                else
                {
                  $this->load->view('admin/header');
                  $this->load->view('admin/sidebar');
                  $this->load->view('admin/edit_city', $cityRecord);
                  $this->load->view('admin/footer');
                }

        
      }


   

      function deleteCity($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('city-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('city-list');
                }
             }


      function getStateBasedOnCountry()
      {
          if($this->input->post('countryId') != '')
            {
              $cond=array('status' => '1', 'countryId' => $this->input->post('countryId'));
              $order=array('id','DESC');
              $data = $this->CommonModel->select('state', $cond ,$order);
              
              echo json_encode($data);
            }
      }


    }
?>