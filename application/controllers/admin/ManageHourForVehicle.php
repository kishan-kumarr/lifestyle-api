<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class ManageHourForVehicle extends MY_Controller
  {
    public function __construct()
    {
        parent::__construct();
        $this->table = 'manage_vehicle_hour';
        if(!$this->session->userdata('AdminEmail'))
        {
          redirect('admin');
        }
    }


    function index()
    {
      $datas = $this->CommonModel->select($this->table, [], []);

      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/vehicle_hour_list', compact('datas'));
      $this->load->view('admin/footer');

    }



    function addTime()
    {
        if($this->input->post('submit'))
        {
          $this->form_validation->set_rules('time', 'Time', 'trim|required');
             if($this->form_validation->run()==true)
             {
               $time = $this->input->post('time');
               $hourTime = explode(':', $time);
               if($hourTime[0] < 4)
               {
                     $this->session->set_flashdata('Error', 'Minimum value 4 hours !');
                     redirect('add-vehicle-hour');
               }
               else
               {
                     $insert_data = array('hour' => $hourTime[0], 'minute' => $hourTime[1], 'status' => 1);
                     if($this->CommonModel->insert($this->table , $insert_data))
                       {
                          $this->session->set_flashdata('Success', 'Insert Successfully Done');
                          redirect('vehicle-hour-list');
                       }
                      else
                       {
                         $this->session->set_flashdata('Error', 'Something went wrong !');
                         redirect('add-vehicle-hour');
                       }
               }

             }
             else
             {
               $this->load->view('admin/header');
               $this->load->view('admin/sidebar');
               $this->load->view('admin/add_vehicle_hour');
               $this->load->view('admin/footer');
             }
        }
        else
        {
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/add_vehicle_hour');
          $this->load->view('admin/footer');
        }

    }


    function UpdateTime($id = '')
    {
      $cond   = array('id' => $id);
      $select = 'id,hour,minute';
      $data  = $this->CommonModel->single($this->table, $cond, $select);
        if($this->input->post('submit'))
        {
          $this->form_validation->set_rules('time', 'Time', 'trim|required');
             if($this->form_validation->run()==true)
             {
               $time = $this->input->post('time');
               $hourTime = explode(':', $time);

               if($hourTime[0] < 4)
               {
                     $this->session->set_flashdata('Error', 'Minimum value 4 hours !');
                     redirect('add-vehicle-hour');
               }
               else
               {
                 $update_data = array('hour' => $hourTime[0], 'minute' => $hourTime[1]);
                 if($this->CommonModel->update($this->table , $update_data, $cond))
                   {
                      $this->session->set_flashdata('Success', 'Updated Successfully Done');
                      redirect('vehicle-hour-list');
                   }
                  else
                   {
                     $this->session->set_flashdata('Error', 'Something went wrong !');
                     redirect('update-vehicle-hour/'.$id);
                   }
               }

             }
             else
             {
               $this->load->view('admin/header');
               $this->load->view('admin/sidebar');
               $this->load->view('admin/update_vehicle_hour', compact('data'));
               $this->load->view('admin/footer');
             }
        }
        else
        {
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/update_vehicle_hour', compact('data'));
          $this->load->view('admin/footer');
        }

    }



    function changeStatus($id = null, $status = null)
    {
        if($status == 1)
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
        redirect('vehicle-hour-list');
       }
      else
      {
       $this->session->set_flashdata('Error', 'Opps! Something went wrong');
       redirect('vehicle-hour-list');
      }

    }




    function deleteRecord($id)
    {
      $cond=array('id' => $id);
      if($this->db->delete($this->table, $cond))
          {
            $this->session->set_flashdata('Success','Deleted Successfully');
            redirect('vehicle-hour-list');
          }
          else
            {
              $this->session->set_flashdata('Error','Opps! Something went wrong');
              redirect('vehicle-hour-list');
            }
         }


  }

 ?>
