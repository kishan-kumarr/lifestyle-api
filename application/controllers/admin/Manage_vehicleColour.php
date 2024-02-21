<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_vehicleColour extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
         //$this->load->helper('imageupload');
          $this->table="vehicle_colour";
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
          $this->load->view('admin/view_vehicle_colour' , $data);
          $this->load->view('admin/footer');
       }


     function add_vehicleColour(){

       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('vehicleColour', 'Vehicle Colour', 'trim|required|is_unique[vehicle_colour.vehicleColour]');

               if($this->form_validation->run()==true)
                  {
                        $insert_data  = array(
                                          'vehicleColour'  => $this->input->post('vehicleColour'),
                                          'status'       => '1'
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('vehicle-colour');
                                }
                               else
                                  {
                                    $this->session->set_flashdata('Error', 'Something went wrong !');
                                    redirect('add-vehicle-colour');
                                  }
                        } // if image not upload
                        else
                        {
                           $this->session->set_flashdata('Error', 'Vehicle Colour must be unique');
                           redirect('add-vehicle-colour');
                        }

            }
            else
            {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/add_vehicle_colour');
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
        redirect('vehicle-colour');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('vehicle-colour');
      }

    }



     function updateVehicleColour($id)
      {
       $cond=array('id' => $id);
       $select='*';
       $vihcleRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

          if(isset($_POST['submit']))
           {
             if(strtolower($this->input->post('vehicleColour')) != strtolower($vihcleRecord['singleRecord']['vehicleColour']))
             {
               $is_unique =  '|is_unique[vehicle_colour.vehicleColour]';
             }
              else
               {
                 $is_unique =  '';
               }
               $this->form_validation->set_rules('vehicleColour', 'Vehicle Colour', 'required|trim'.$is_unique);


            if($this->form_validation->run()==true)
                {

                       $update_data  = array(
                                          'vehicleColour'  => $this->input->post('vehicleColour')
                                        );

                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('vehicle-colour');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-vehicle-colour/'.$id);
                                }
                      }
                      else
                        {
                         $this->session->set_flashdata('Error', 'Vehicle Colour must be unique');
                         redirect('update-vehicle-colour/'.$id);
                        }
              }
              else
              {
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/edit_vehicle_colour', $vihcleRecord);
                $this->load->view('admin/footer');
              }


      }



      function deleteVehicleColour($id){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('vehicle-colour');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('vehicle-colour');
                }
             }


    }
?>
