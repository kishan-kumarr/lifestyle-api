<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_airport extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();

          $this->load->model('JoinModel');
          $this->table="airport";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }

      function index()
        {
          $cond = array();
          $order = array('id','DESC');
          $data['airportList'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/view_airport', $data);
          $this->load->view('admin/footer');
        }


     function add_airport()
     {

        $cond = array('status' => '1');
        $order = array('id','DESC');
        $data['coutnryList'] = $this->CommonModel->select('country', $cond ,$order);

        if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('airportName', 'Airport Name', 'trim|required|is_unique[airport.airportName]');
               if($this->form_validation->run()==true)
                    {
                         $insert_data  = array(
                                          'airportName' => $this->input->post('airportName'),
                                          'latitude'    => $this->input->post('latitude'),
                                          'langitude'   => $this->input->post('langitude')
                                        );
                            if($this->CommonModel->insert($this->table , $insert_data))
                              {
                                 $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                 redirect('airport-list');
                              }
                             else
                                {
                                  $this->session->set_flashdata('Error', 'Something went wrong !');
                                  redirect('add-airport');
                                }

                      }
                      else
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_airport', $data);
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_airport', $data);
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
        redirect('airport-list');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('airport-list');
      }

    }



     function updateAirport($id = '')
     {
       $cond=array('id' => $id);
       $select='*';
       $airportRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if(isset($_POST['submit']))
         {
            if($this->input->post('airportName') != $airportRecord['singleRecord']['airportName'])
             {
               $is_unique =  '|is_unique[airport.airportName]';
             }
              else
               {
                 $is_unique =  '';
               }
            $this->form_validation->set_rules('airportName', 'Airport Name', 'trim|required'.$is_unique);

            if($this->form_validation->run()==true)
                   {
                        $update_data  = array(
                                          'airportName' => $this->input->post('airportName'),
                                          'latitude'    => $this->input->post('latitude'),
                                          'langitude'   => $this->input->post('langitude')
                                        );
                           if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('airport-list');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Opps! Something went wrong');
                                redirect('update-airport/'.$id);
                                }
                      }
                      else
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_airport', $airportRecord);
                         $this->load->view('admin/footer');
                        }
                }
                else
                {
                  $this->load->view('admin/header');
                  $this->load->view('admin/sidebar');
                  $this->load->view('admin/edit_airport', $airportRecord);
                  $this->load->view('admin/footer');
                }


      }




      function deleteAirport($id)
      {
        $cond=array('id' => $id);
          if($this->CommonModel->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('airport-list');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('airport-list');
                }
             }


      function getStateBasedOnCountry() // fetching country state list based on country
      {
          if($this->input->post('countryId') != '')
            {
              $cond=array('status' => '1', 'countryId' => $this->input->post('countryId'));
              $order=array('id','DESC');
              $data = $this->CommonModel->select('state', $cond ,$order);

              echo json_encode($data);
            }
      }

      function getCityBasedOnState() // fetching city list based on state
      {
          if($this->input->post('stateId') != '')
            {
             // echo $this->input->post('stateId');exit;
              $cond=array('status' => '1', 'stateId' => $this->input->post('stateId'));
              $order=array('id','DESC');
              $data = $this->CommonModel->select('city', $cond ,$order);

              echo json_encode($data);
            }
      }


    }
?>
