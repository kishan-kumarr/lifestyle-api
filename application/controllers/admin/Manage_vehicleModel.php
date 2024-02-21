<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_vehicleModel extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
         //$this->load->helper('imageupload');
          $this->table="vehicle_model";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
    
      function index()
        {
          $cond=array();
          $order=array('id','DESC');

          $data['vehicleData'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_vehicle_model' , $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_vehicleModel(){

       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('vehicleModel', 'Vehicle Model', 'trim|required|is_unique[vehicle_model.vehicleModel]');

               if($this->form_validation->run()==true) 
                  {
                        $insert_data  = array(
                                          'vehicleModel'  => $this->input->post('vehicleModel'),
                                          'status'       => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('vehicle-model'); 
                                }
                               else 
                                  {
                                    $this->session->set_flashdata('Error', 'Something went wrong !');
                                    redirect('add-vehicle-model');
                                  }
                        } // if image not upload
                        else
                        {
                          $this->session->set_flashdata('Error', 'Vehicle Model must be unique');
                          redirect('add-vehicle-model');
                        }          
                           
            }
            else
            {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/add_vehicle_model');
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
        redirect('vehicle-model');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('vehicle-model');
      }

    }

   

     function updateVehicleModel($id)
      {
       $cond=array('id' => $id);
       $select='*';
       $vihcleRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
          
          if(isset($_POST['submit']))
           {
             if($this->input->post('vehicleModel') != $vihcleRecord['singleRecord']['vehicleModel'])
             {
               $is_unique =  '|is_unique[vehicle_model.vehicleModel]';
             } 
              else
               {
                 $is_unique =  '';
               }
               $this->form_validation->set_rules('vehicleModel', 'Vehicle Model', 'required|trim'.$is_unique);
              
           
            if($this->form_validation->run()==true)
                { 
                  
                       $update_data  = array(
                                          'vehicleModel'  => $this->input->post('vehicleModel'),
                                        );
                          
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('vehicle-model'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-vehicle-model/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->session->set_flashdata('Error', 'Vehicle Model must be unique');
                         redirect('update-vehicle-model/'.$id); 
                        }
          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/edit_vehicle_model', $vihcleRecord);
            $this->load->view('admin/footer');
          }    
         
        
      }



      function deleteVehicleModel($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('vehicle-model');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('vehicle-model');
                }
             }


    }
?>