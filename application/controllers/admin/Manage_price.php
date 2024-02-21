<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_price extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();
         $this->load->model('DriverModel');
          $this->table="price";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
   
      function index()
        {
          $cond=array();
          $order=array('id','DESC');

          $data['priceList'] = $this->DriverModel->getAllPriceList();
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/all_price', $data);
          $this->load->view('admin/footer');
      }
     
   
     function add_price()
     {
        $vehicleCond = array('status' => 1);
        $vehicleData['vehicleTypeList'] = $this->CommonModel->select('vehicle_type', $vehicleCond);
      
       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('vehicleType', 'Vehicle Model', 'trim|required|is_unique[price.vehicleType]');
            $this->form_validation->set_rules('normalPrice', 'Price', 'trim|required');
            $this->form_validation->set_rules('midNightCharge', 'Mid Night Charge', 'trim|required');
            $this->form_validation->set_rules('childCharge', 'Child Charge', 'trim|required');
            $this->form_validation->set_rules('additionalStop', 'Additional Stop Charge', 'trim|required');
            $this->form_validation->set_rules('additionalWaitingTime', 'Additional waiting Charge', 'trim|required');
            $this->form_validation->set_rules('additionalKelometer', 'Additional kelometer Charge', 'trim|required');
            $this->form_validation->set_rules('userCancellationCharge', 'User Cancellation Charge', 'trim|required');
            $this->form_validation->set_rules('driverCancellationCharge', 'Driver Cancellation Charge', 'trim|required');
            
            if($this->form_validation->run()==true) 
                      { 
                         $insert_data  = array(
                                           'vehicleType'              => $this->input->post('vehicleType'),
                                           'normalPrice'              => $this->input->post('normalPrice'),
                                           'midNightCharge'           => $this->input->post('midNightCharge'),
                                           'childCharge'              => $this->input->post('childCharge'),
                                           'additionalStop'           => $this->input->post('additionalStop'),
                                           'additionalWaitingTime'    => $this->input->post('additionalWaitingTime'),
                                           'additionalKelometer'      => $this->input->post('additionalKelometer'),
                                           'userCancellationCharge'   => $this->input->post('userCancellationCharge'), 
                                           'driverCancellationCharge' => $this->input->post('driverCancellationCharge')
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('price-list'); 
                              }
                             else 
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-price');
                                }
                       
                        }
                        else 
                          {
                           $this->load->view('admin/header');
                           $this->load->view('admin/sidebar');
                           $this->load->view('admin/add_price', $vehicleData);
                           $this->load->view('admin/footer');
                          }

            }
            else 
            {
             $this->load->view('admin/header');
             $this->load->view('admin/sidebar');
             $this->load->view('admin/add_price', $vehicleData);
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
        redirect('price-list');
      }
      else 
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('price-list');
      }

    }

   

     function updatePrice($id = ''){
      $vehicleCond = array('status' => 1);
      $priceRecord['vehicleTypeList'] = $this->CommonModel->select('vehicle_type', $vehicleCond);
       $cond=array('id' => $id);
       $select='*';
       $priceRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
       
       if(isset($_POST['submit']))
       {
            if($this->input->post('vehicleType') != $priceRecord['singleRecord']['vehicleType'])
             {
               $is_unique =  '|is_unique[price.vehicleType]';
             } 
              else
               {
                 $is_unique =  '';
               }
            $this->form_validation->set_rules('vehicleType', 'Vehicle Model', 'trim|required'.$is_unique);
            $this->form_validation->set_rules('normalPrice', 'Price', 'trim|required');
            $this->form_validation->set_rules('midNightCharge', 'Mid Night Charge', 'trim|required');
            $this->form_validation->set_rules('childCharge', 'Child Charge', 'trim|required');
            $this->form_validation->set_rules('additionalStop', 'Additional Stop Charge', 'trim|required');
            $this->form_validation->set_rules('additionalWaitingTime', 'Additional waiting Charge', 'trim|required');
            $this->form_validation->set_rules('additionalKelometer', 'Additional kelometer Charge', 'trim|required');
            $this->form_validation->set_rules('userCancellationCharge', 'User Cancellation Charge', 'trim|required');
            $this->form_validation->set_rules('driverCancellationCharge', 'Driver Cancellation Charge', 'trim|required');

            if($this->form_validation->run()==true)
                   { 
                    $update_data  = array(
                                         'vehicleType'              => $this->input->post('vehicleType'),
                                         'normalPrice'              => $this->input->post('normalPrice'),
                                         'midNightCharge'           => $this->input->post('midNightCharge'),
                                         'childCharge'              => $this->input->post('childCharge'),
                                         'additionalStop'           => $this->input->post('additionalStop'),
                                         'additionalWaitingTime'    => $this->input->post('additionalWaitingTime'),
                                         'additionalKelometer'      => $this->input->post('additionalKelometer'),
                                         'userCancellationCharge'   => $this->input->post('userCancellationCharge'), 
                                         'driverCancellationCharge' => $this->input->post('driverCancellationCharge')
                                      );
                          
                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('price-list'); 
                            }
                              else 
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-price/'.$id); 
                                }
                      }
                      else 
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_price', $priceRecord);
                         $this->load->view('admin/footer');
                        }
         }     
         else
         {
           $this->load->view('admin/header');
           $this->load->view('admin/sidebar');
           $this->load->view('admin/edit_price', $priceRecord);
           $this->load->view('admin/footer');
         }   

      }


   

      function deletePrice($id = ''){
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
                $this->session->set_flashdata('Success','Deleted Successfully');
                redirect('price-list');
               }
               else 
                  {
                    $this->session->set_flashdata('Error','Opps! Something went wrong');
                    redirect('price-list');
                  }
             }

      function viewPrice($id = '')
      {
         $data['singlePriceRecord'] = $this->DriverModel->getPriceById($id);
         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/view_price', $data);
         $this->load->view('admin/footer');
      }

    }
?>