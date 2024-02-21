<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_vehicle extends CI_Controller
     {
      function __construct()
      {
         parent::__construct();
         // $sideBar = getSidebar();
         //   $key = array_search($this->uri->segment(1), array_column($sideBar, 'MenuSlug'));
         //   if($key =='')
         //   {
         //     redirect('dashboard','refresh');
         //   }
         $this->load->helper('imageupload');
          $this->table="vehicle";
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
          $this->load->view('admin/view_vehicle' , $data);
          $this->load->view('admin/footer');
        }
     
   
     function add_vehicle(){

       if(isset($_POST['submit']))
          {
            if($_FILES['vehicleImage']['name'] == ''){ // if file not selected
               $this->form_validation->set_rules('vehicleImage', 'Vehicle Image', 'trim|required');
              }
            $this->form_validation->set_rules('vehicleName', 'Vehicle Name', 'trim|required|is_unique[vehicle.vehicleName]');
            $this->form_validation->set_rules('passenger', 'Passenger', 'trim|required');
            $this->form_validation->set_rules('luggage', 'Luggage', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');

               if($this->form_validation->run()==true) 
                  {
                    // upload image using helper
                     $userImage = 'vehicleImage';
                     $uploadPath = './assets/admin/img';
                     if(uploadImage($uploadPath, $userImage) == true)
                      {
                        $date = time();
                        $imageName = $date.$_FILES['vehicleImage']['name'];
                        resizeImage("./assets/admin/img/","./assets/admin/resizeImage/",$imageName,500,500);
                        $insert_data  = array(
                                          'vehicleImage' => $imageName,
                                          'vehicleName'  => $this->input->post('vehicleName'),
                                          'passenger'    => $this->input->post('passenger'),
                                          'luggage'      => $this->input->post('luggage'),
                                          'price'        => $this->input->post('price'),
                                          'status'       => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('vehicle-list'); 
                                }
                               else 
                                  {
                                    $this->session->set_flashdata('Error', 'Something went wrong !');
                                    redirect('add-vehicle');
                                  }
                        } // if image not upload
                        else
                        {
                         $this->session->set_flashdata('Error', 'Image not upload');
                         redirect('add-vehicle');
                        }          
                           
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_vehicle');
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_vehicle');
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
        redirect('vehicle-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('vehicle-list');
      }

    }

   

     function updateVehicle($id)
      {
       $cond=array('id' => $id);
       $select='*';
       $vihcleRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
      
             if($this->input->post('vehicleName') != $vihcleRecord['singleRecord']['vehicleName'])
             {
               $is_unique =  '|is_unique[vehicle.vehicleName]';
             } 
              else
               {
                 $is_unique =  '';
               }
               $this->form_validation->set_rules('vehicleName', 'Vehicle Name', 'required|trim'.$is_unique);
               $this->form_validation->set_rules('passenger', 'Passenger', 'trim|required');
               $this->form_validation->set_rules('price', 'Price', 'trim|required');
           
            if($this->form_validation->run()==true)
                { 
                     // ************************* uploading image *********************************
                    if(empty($_FILES['vehicleImage']['name']))
                         { 
                           $imageName = $this->input->post('hiddenImage');
                         }
                          else 
                            { 
                              // upload image using helper
                              $userImage = 'vehicleImage';
                              $uploadPath = './assets/admin/img';
                               if(uploadImage($uploadPath, $userImage) == true)
                                {
                                  $date = time();
                                  $imageName = $date.$_FILES['vehicleImage']['name'];
                                  resizeImage("./assets/admin/img/","./assets/admin/resizeImage/",$imageName,500,500);
                                }
                             }
                       // ************************* End uploading image *********************************
                       $update_data  = array(
                                          'vehicleImage' => $imageName,
                                          'vehicleName'  => $this->input->post('vehicleName'),
                                          'passenger'    => $this->input->post('passenger'),
                                          'luggage'      => $this->input->post('luggage'),
                                          'price'        => $this->input->post('price'),
                                        );
                          
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('vehicle-list'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-vehicle/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_vehicle', $vihcleRecord);
                         $this->load->view('admin/footer');
                        }
         
         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/edit_vehicle', $vihcleRecord);
         $this->load->view('admin/footer');
      }



      function deleteVehicle($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('vehicle-list');
              }
              else 
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('vehicle-list');
                }
             }


    }
?>