<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_vehicleType extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
          $this->table="vehicle_type";
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
          $this->load->view('admin/view_vehicle_type' , $data);
          $this->load->view('admin/footer');
      }


     function add_vehicleType()
     {
       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('vehicleType', 'Vehicle Type', 'trim|required|is_unique[vehicle_type.vehicleType]');
            $this->form_validation->set_rules('childSeatAvailable', 'Child Seat Available', 'trim|required');
            $this->form_validation->set_rules('maximumPerson', 'Maximum Person', 'trim|required');
            $this->form_validation->set_rules('maximumLuggage', 'Maximum Luggage', 'trim|required');
            if(empty($_FILES['vehicleImage']['name']))
             {
              $this->form_validation->set_rules('vehicleImage', 'Vehicle Image', 'trim|required');
             }

                if($this->form_validation->run()==true)
                  {
                      unset($config);
                      $config['upload_path']   = './assets/admin/img';
                      $config['allowed_types'] = 'jpeg|jpg|png';
                      $config['overwrite']     = FALSE;
                      $config['remove_spaces'] = TRUE;
                      $config['encrypt_name']  = TRUE;
                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);
                      if(!$this->upload->do_upload('vehicleImage'))
                       {
                          //echo $this->upload->display_errors();exit;
                          $this->session->set_flashdata('Error', 'Something went wrong !');
                          redirect('add-vehicle-type');
                       }
                        else
                          {
                            $vehicleImage =  $this->upload->data('file_name');
                            resizeImage("./assets/admin/img/","./assets/admin/resizeImage/",$vehicleImage,500,500);
                           }
                         $insert_data  = array(
                                              'vehicleType'        => $this->input->post('vehicleType'),
                                              'childSeatAvailable' => $this->input->post('childSeatAvailable'),
                                              'maximumPerson'      => $this->input->post('maximumPerson'),
                                              'maximumLuggage'     => $this->input->post('maximumLuggage'),
                                              'vehicleImage'       => $vehicleImage
                                            );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('vehicle-type');
                                }
                               else
                                  {
                                    $this->session->set_flashdata('Error', 'Something went wrong !');
                                    redirect('add-vehicle-type');
                                  }
                        }
                        else
                        {
                          // validation false
                          $this->load->view('admin/header');
                          $this->load->view('admin/sidebar');
                          $this->load->view('admin/add_vehicle_type');
                          $this->load->view('admin/footer');
                        }

            }
            else
            {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/add_vehicle_type');
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
        redirect('vehicle-type');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('vehicle-type');
      }

    }



     function updateVehicleType($id)
      {
       $cond = array('id' => $id);
       $select = '*';
       $vihcleRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

          if(isset($_POST['submit']))
           {
             if($this->input->post('vehicleType') != $vihcleRecord['singleRecord']['vehicleType'])
             {
               $is_unique =  '|is_unique[vehicle_type.vehicleType]';
             }
              else
               {
                 $is_unique =  '';
               }
               $this->form_validation->set_rules('vehicleType', 'Vehicle Type', 'required|trim'.$is_unique);
               $this->form_validation->set_rules('childSeatAvailable', 'Child Seat Available', 'trim|required');
               $this->form_validation->set_rules('maximumPerson', 'Maximum Person', 'trim|required');
               $this->form_validation->set_rules('maximumLuggage', 'Maximum Luggage', 'trim|required');



              if($this->form_validation->run()==true)
                {
                  // ------------------------* uploading image --------------------------------*
                  if(empty($_FILES['vehicleImage']['name']))
                      {
                        $vehicleImage = $this->input->post('hiddenvehicleImage');
                      }
                       else
                         {
                             //-------- unlink the previous files ----------//
                              unlinkImage($this->table, $cond, 'vehicleImage');

                             unset($config);
                             $config['upload_path']   = './assets/admin/img';
                             $config['allowed_types'] = 'jpeg|jpg|png';
                             $config['overwrite']     = FALSE;
                             $config['remove_spaces'] = TRUE;
                             $config['encrypt_name']  = TRUE;
                             $this->load->library('upload', $config);
                             $this->upload->initialize($config);
                             if(!$this->upload->do_upload('vehicleImage'))
                              {
                                 // $this->upload->display_errors();exit;
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('update-vehicle-type/'.$id);
                              }
                             else
                               {
                                 $vehicleImage =  $this->upload->data('file_name');
                                 resizeImage("./assets/admin/img/","./assets/admin/resizeImage/",$vehicleImage,500,500);
                                }
                            }

                          $update_data  = array(
                                               'vehicleType'        => $this->input->post('vehicleType'),
                                               'childSeatAvailable' => $this->input->post('childSeatAvailable'),
                                               'maximumPerson'      => $this->input->post('maximumPerson'),
                                               'maximumLuggage'     => $this->input->post('maximumLuggage'),
                                               'vehicleImage'       => $vehicleImage
                                             );

                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                             $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('vehicle-type');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-vehicle-type/'.$id);
                                }
                      }
                      else
                        {
                          $this->load->view('admin/header');
                          $this->load->view('admin/sidebar');
                          $this->load->view('admin/edit_vehicle_type', $vihcleRecord);
                          $this->load->view('admin/footer');
                        }
            }
            else
            {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/edit_vehicle_type', $vihcleRecord);
              $this->load->view('admin/footer');
            }


      }



      function deleteVehicleType($id){
        $cond = array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
               //-------- unlink the previous files ----------//
                unlinkImage($this->table, $cond, 'vehicleImage');

                $this->session->set_flashdata('Success','Deleted Successfully');
                redirect('vehicle-type');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('vehicle-type');
                }
             }


    }
?>
