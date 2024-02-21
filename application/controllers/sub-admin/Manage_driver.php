<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_driver extends CI_Controller
     {
      function __construct()
      {
         parent::__construct();
          $this->load->model('DriverModel');
          $this->table="driver";
          if(!$this->session->userdata('BranchManagerEmail')){
          redirect('sub-admin');
          }
      }


      function index()
        {
          $data['driverList'] = $this->DriverModel->getAllDriverDetailByManager();
          $this->load->view('sub-admin/header');
          $this->load->view('sub-admin/sidebar');
          $this->load->view('sub-admin/all_driver' , $data);
          $this->load->view('sub-admin/footer');
        }


     function add_driver()
     {
        $cond  = array('status' => '1');
        $order = array('id','DESC');
        $data['locationList']  = $this->CommonModel->select('location', $cond ,$order);
        $data['branchList']    = $this->CommonModel->select('branch', $cond ,$order);
        $data['city']          = $this->CommonModel->select('city', $cond ,$order);
        $data['accountType']   = $this->CommonModel->select('accountType', $cond ,$order);
        $data['vehicleType']   = $this->CommonModel->select('vehicle_type', $cond ,$order);
        $data['vehicleModel']  = $this->CommonModel->select('vehicle_model', $cond ,$order);
        $data['vehicleColour'] = $this->CommonModel->select('vehicle_colour', $cond ,$order);
        $data['airportList']   = $this->CommonModel->select('airport', $cond ,$order);

        $data['uploadError1'] = '';//image error
        $data['uploadError2'] = '';//image error
        $data['uploadError3'] = '';//image error
        $data['uploadError4'] = '';//image error

        $branchManagerRecord = getBranchRecord($this->session->userdata('BranchManagerEmail')); // getting manager details

       if(isset($_POST['submit']))
          {
             // echo "<pre>";
             // print_r($_POST);
             // print_r($_FILES);
             // exit;

            $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('dob', 'D.O.B', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
            $this->form_validation->set_rules('routingNo', 'Routing No', 'trim|required');
            $this->form_validation->set_rules('accountNo', 'Account No', 'trim|required');
            $this->form_validation->set_rules('accountHolderName', 'Account Holder Name', 'trim|required');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('vehiclePlateNo', 'Vehicle Plate No', 'trim|required');
            $this->form_validation->set_rules('vehicleType', 'Vehicle Type', 'trim|required');
            $this->form_validation->set_rules('vehicleModel', 'Vehicle Model', 'trim|required');
            $this->form_validation->set_rules('vehicleColour', 'Vehicle Colour', 'trim|required');
            $this->form_validation->set_rules('registrationYear', 'Registration Year', 'trim|required');
            $this->form_validation->set_rules('childSeatAvailable', 'Child Seat Available', 'trim|required');
            $this->form_validation->set_rules('maximumPerson', 'Maximum Person', 'trim|required');
            $this->form_validation->set_rules('maximumLuggage', 'Maximum Luggage', 'trim|required');
            $this->form_validation->set_rules('airport', 'Airport', 'trim|required');

            if(empty($_FILES['vehicleImage']['name']))
             {
              $this->form_validation->set_rules('vehicleImage', 'Vehicle Image', 'trim|required');
             }

             if(empty($_FILES['licenseFrontImage']['name']))
             {
              $this->form_validation->set_rules('licenseFrontImage', 'License Front Image', 'trim|required');
             }

             if(empty($_FILES['licenseBackImage']['name']))
             {
              $this->form_validation->set_rules('licenseBackImage', 'License Back Image', 'trim|required');
             }

             if(empty($_FILES['insuranceFileImage']['name']))
             {
              $this->form_validation->set_rules('insuranceFileImage', 'Insurance File Image', 'trim|required');
             }

               if($this->form_validation->run()==true)
                  {

                     // ************************* uploading image *********************************
                                unset($config);
                                //$date = time();
                                $config['upload_path'] = './assets/admin/document/driver';
                                $config['allowed_types'] = 'jpeg|jpg|png|pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;

                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('vehicleImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                     $data['uploadError1'] = $this->upload->display_errors();
                                     $this->load->view('admin/header');
                                     $this->load->view('admin/sidebar');
                                     $this->load->view('admin/add_driver', $data);
                                     $this->load->view('admin/footer');
                                 }
                                 $config['file_name'] = $this->upload->data('file_name');

                                $config['file_name'] = $licenseFrontImage;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('licenseFrontImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                     $data['uploadError2'] = $this->upload->display_errors();
                                     $this->load->view('admin/header');
                                     $this->load->view('admin/sidebar');
                                     $this->load->view('admin/add_driver', $data);
                                     $this->load->view('admin/footer');
                                 }
                                 $licenseFrontImage = $this->upload->data('file_name');


                                $config['file_name'] = $licenseBackImage;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('licenseBackImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                     $data['uploadError3'] = $this->upload->display_errors();
                                     $this->load->view('admin/header');
                                     $this->load->view('admin/sidebar');
                                     $this->load->view('admin/add_driver', $data);
                                     $this->load->view('admin/footer');
                                 }
                                 $licenseBackImage = $this->upload->data('file_name');


                                $config['file_name'] = $insuranceFileImage;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('insuranceFileImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                     $data['uploadError4'] = $this->upload->display_errors();
                                     $this->load->view('admin/header');
                                     $this->load->view('admin/sidebar');
                                     $this->load->view('admin/add_driver', $data);
                                     $this->load->view('admin/footer');
                                 }

                                 else
                                 {
                                   $insuranceFileImage = $this->upload->data('file_name');

                                   // ************************* End uploading image *********************************
                                  //$UserTitle = $this->input->post('title');
                                  $UserName  = $this->input->post('name');
                                  $UserEmail = $this->input->post('email');
                                  $password  = $this->input->post('confirm_password');
                                  $subject   = 'Account Created';
                                  $branchManagerName = $branchManagerRecord[0]['name'];
                                  //********************** */ email templete ********************************
                                   $siteName    = $this->lang->line('site_name');
                                   $message='<html>
                                     <head>
                                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                         <title>Go Fit - Order Mailer</title>
                                         <!-- <link href="https://fonts.googleapis.com/css?family=roboto:300,300i,400,400i,500,500i,600,700,800,900" rel="stylesheet"> -->
                                     </head>
                                     <body style="background-color: #f1f1f1; font-family: roboto, sans-serif; font-size: 15px; margin: 0; padding: 0;">
                                         <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="background: #f1f1f1; font-family: "roboto", sans-serif; font-size: 14px;">
                                         <tbody>
                                           <tr>
                                               <td align="center">
                                                 <table border="0" cellpadding="10" cellspacing="0" width="600" align="center">
                                                     <tbody>
                                                       <tr>
                                                           <td align="center">
                                                             <table border="0" cellpadding="10" cellspacing="0" width="600">
                                                                 <tbody>
                                                                   <tr>
                                                                    <td align="center"><a href=""><img src="'.base_url().'/assets/frontend/images/logo.png"></a></td>
                                                                   </tr>
                                                                 </tbody>
                                                             </table>
                                                             <table border="0" cellpadding="10" cellspacing="10" width="600" style="background: #fff; border:3px solid #ddd;">
                                                                 <tbody>
                                                                   <tr>
                                                                       <td align="center" style="font-size: 30px; font-weight: bold; color: #222; letter-spacing: 1px; border-bottom:2px solid #115aa6;">Account Created</td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td>
                                                                         <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                                             <tbody>
                                                                               <tr>
                                                                                  <td align="left">'.'Hi '.$UserName. ', '.'<br>Welcome to 121 Lifestyle. <br>Your Account has been created By Branch Manager <b>('.$branchManagerName.')</b> <br>
                                                                                  Please waite for admin approval
                                                                                  <br>
                                                                                  After that you can login to use this Credential <br> Your Email Id is: <b>'.$UserEmail .' '. '</b>and Your Password is: <b>'.$password.' </b><br></td>
                                                                               </tr>
                                                                             </tbody>
                                                                         </table>
                                                                       </td>
                                                                   </tr>
                                                                   <tr>
                                                                       <td>
                                                                         <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                                             <tbody>
                                                                               <tr>
                                                                                   <td align="left" valign="top">
                                                                                     <p>Team, <br><a href="'.base_url().'">'.$siteName.'</a></p>
                                                                                   </td>
                                                                             </tbody>
                                                                         </table>
                                                                       </td>
                                                                   </tr>
                                                                 </tbody>
                                                             </table>
                                                           </td>
                                                       </tr>
                                                     </tbody>
                                                 </table>
                                               </td>
                                           </tr>
                                         </tbody>
                                         </table>
                                     </body>
                                   </html>';


                                  $this->load->library('email');
                                  $this->email->set_mailtype("html");
                                  $this->email->set_newline("\r\n");
                                  $this->email->from($this->lang->line('admin_email'),$siteName);
                                  $this->email->to($UserEmail);
                                  $this->email->subject($subject);
                                  $this->email->message($message);
                                  $result = $this->email->send();
                                  if($result)
                                    {
                                      $insert_data1  = array(
                                            'firstName'            => $this->input->post('firstName'),
                                            'lastName'             => $this->input->post('lastName'),
                                            'dob'                  => $this->input->post('dob'),
                                            'city'                 => $this->input->post('city'),
                                            'email'                => $this->input->post('email'),
                                            'mobileCountryCode'    => $this->input->post('mobileCountryCode'),
                                            'mobile'               => $this->input->post('mobile'),
                                            'address'              => $this->input->post('address'),
                                            'location'             => $branchManagerRecord[0]['location'],
                                            'under_branch_manager' => $branchManagerRecord[0]['id'],
                                            'branch'               => $branchManagerRecord[0]['branch'],
                                            'under_ceo'            => $branchManagerRecord[0]['under_ceo'],
                                            'password'             => md5($this->input->post('password')),
                                            'normalPassword'       => $this->input->post('password'),
                                            'aboutMe'              => $this->input->post('aboutMe'),
                                            'status'               => '2',
                                            'approvedBy'           => '2',
                                            'createdBy'            => '2'
                                        );
                                         if($this->CommonModel->insert($this->table , $insert_data1))
                                          {

                                            $driverId = $this->db->insert_id();// driver id
                                              $insert_data2  = array(
                                                'driverId'          => $driverId,
                                                'routingNo'         => $this->input->post('routingNo'),
                                                'accountNo'         => $this->input->post('accountNo'),
                                                'accountHolderName' => $this->input->post('accountHolderName'),
                                                'accountType'       => $this->input->post('accountType')
                                              );
                                            $this->CommonModel->insert('driverBankDetail' , $insert_data2); // insert bank detail


                                              $insert_data3  = array(
                                                'driverId'           => $driverId,
                                                'vehiclePlateNo'     => $this->input->post('vehiclePlateNo'),
                                                'vehicleType'        => $this->input->post('vehicleType'),
                                                'vehicleModel'       => $this->input->post('vehicleModel'),
                                                'vehicleColour'      => $this->input->post('vehicleColour'),
                                                'registrationYear'   => $this->input->post('registrationYear'),
                                                'childSeatAvailable' => $this->input->post('childSeatAvailable'),
                                                'maximumPerson'      => $this->input->post('maximumPerson'),
                                                'maximumLuggage'     => $this->input->post('maximumLuggage'),
                                                'airport'            => $this->input->post('airport'),
                                                'vehicleImage'       => $vehicleImage
                                              );
                                            $this->CommonModel->insert('driverVehicleDetail' , $insert_data3);// insert vehicle detail

                                             $insert_data4  = array(
                                                'driverId'           => $driverId,
                                                'licenseFrontImage'  => $licenseFrontImage,
                                                'licenseBackImage'   => $licenseBackImage,
                                                'insuranceFileImage' => $insuranceFileImage
                                              );
                                            $this->CommonModel->insert('driverVehicleLicense' , $insert_data4); // insert License detail

                                           $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                           redirect('sub-admin-driver-list');
                                          }
                                          else // if data not insert in database
                                          {
                                            $this->session->set_flashdata('Error', 'Something went wrong ');
                                            redirect('sub-admin-add-driver');
                                          }
                                       } // if mail not sent
                                    else
                                      {
                                      $this->session->set_flashdata('Error', 'Something went wrong Email not sent');
                                      redirect('sub-admin-add-driver');
                                      }
                                }
                      } // if form validation fail
                      else
                        {
                         $this->load->view('sub-admin/header');
                         $this->load->view('sub-admin/sidebar');
                         $this->load->view('sub-admin/add_driver', $data);
                         $this->load->view('sub-admin/footer');
                        }

          }

         $this->load->view('sub-admin/header');
         $this->load->view('sub-admin/sidebar');
         $this->load->view('sub-admin/add_driver', $data);
         $this->load->view('sub-admin/footer');
      }




    function changeStatus($id){
      $select= 'status';
      $cond = array('id' => $id);

      $user = $this->CommonModel->single($this->table, $cond, $select);

      if($user['status'] == 2)
        {
          $updateStatus = 3;
        }
      else
        {
          $updateStatus = 2;
        }

      $data = array('status' => $updateStatus);
      $cond = array('id' => $id);
      if($this->CommonModel->update($this->table, $data, $cond))
      {
        $this->session->set_flashdata('Success', 'Status Changed Successfully');
        redirect('sub-admin-driver-list');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('sub-admin-driver-list');
      }

    }



     function updateDriver($id){
        $driverRecord['singleRecord'] = $this->DriverModel->getDriverDetailbyId($id);
         //echo "<pre>";
        // print_r($driverRecord['singleRecord']);exit;


        $cond  = array('status' => '1');
        $order = array('id','DESC');
        $driverRecord['locationList']  = $this->CommonModel->select('location', $cond ,$order);
        $driverRecord['branchList']    = $this->CommonModel->select('branch', $cond ,$order);
        $driverRecord['city']          = $this->CommonModel->select('city', $cond ,$order);
        $driverRecord['accountType']   = $this->CommonModel->select('accountType', $cond ,$order);
        $driverRecord['vehicleType']   = $this->CommonModel->select('vehicle_type', $cond ,$order);
        $driverRecord['vehicleModel']  = $this->CommonModel->select('vehicle_model', $cond ,$order);
        $driverRecord['vehicleColour'] = $this->CommonModel->select('vehicle_colour', $cond ,$order);
        $driverRecord['airportList']   = $this->CommonModel->select('airport', $cond ,$order);

        $driverRecord['uploadError1'] = '';//image error
        $driverRecord['uploadError2'] = '';//image error
        $driverRecord['uploadError3'] = '';//image error
        $driverRecord['uploadError4'] = '';//image error



         $order1 = array('id','DESC');
         $cond2=array('status' => '1' , 'location' => $driverRecord['singleRecord'][0]['location'],'role' => 2);
         $driverRecord['ceoList'] = $this->CommonModel->select('admin', $cond2 ,$order1); // related ceo list

         $cond3=array('status' => '1' , 'branch' => $driverRecord['singleRecord'][0]['branch']);
         $driverRecord['relatedBranchList'] = $this->CommonModel->select('branch_manager', $cond3 ,$order1); // realted branch manager list
        // echo "<pre>";
        // print_r($driverRecord);exit;

        if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('dob', 'D.O.B', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
            $this->form_validation->set_rules('routingNo', 'Routing No', 'trim|required');
            $this->form_validation->set_rules('accountNo', 'Account No', 'trim|required');
            $this->form_validation->set_rules('accountHolderName', 'Account Holder Name', 'trim|required');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('vehiclePlateNo', 'Vehicle Plate No', 'trim|required');
            $this->form_validation->set_rules('vehicleType', 'Vehicle Type', 'trim|required');
            $this->form_validation->set_rules('vehicleModel', 'Vehicle Model', 'trim|required');
            $this->form_validation->set_rules('vehicleColour', 'Vehicle Colour', 'trim|required');
            $this->form_validation->set_rules('registrationYear', 'Registration Year', 'trim|required');
            $this->form_validation->set_rules('childSeatAvailable', 'Child Seat Available', 'trim|required');
            $this->form_validation->set_rules('maximumPerson', 'Maximum Person', 'trim|required');
            $this->form_validation->set_rules('maximumLuggage', 'Maximum Luggage', 'trim|required');
            $this->form_validation->set_rules('airport', 'Airport', 'trim|required');


            if($this->form_validation->run()==true)
                   {

                     // ************************* uploading image *********************************
                    if(empty($_FILES['vehicleImage']['name']))
                         {
                           $vehicleImage1 = $this->input->post('hiddenvehicleImage');
                         }
                          else
                            {
                                unset($config);
                                $date = time();
                                $config['upload_path'] = './assets/admin/document/driver';
                                $config['allowed_types'] = 'jpeg|jpg|png|pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $vehicleImage = time().$_FILES['vehicleImage']['name'];
                                $config['file_name'] = $vehicleImage;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('vehicleImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('sub-admin-update-driver/'.$id);
                                 }
                                else
                                  {
                                    $vehicleImage1 = $vehicleImage;
                                  }
                                }



                    if(empty($_FILES['licenseFrontImage']['name']))
                         {
                           $licenseFrontImage1 = $this->input->post('hiddenlicenseFrontImage');
                         }
                          else
                            {
                                unset($config);
                                $date = time();
                                $config['upload_path'] = './assets/admin/document/driver';
                                $config['allowed_types'] = 'jpeg|jpg|png|pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('licenseFrontImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('sub-admin-update-driver/'.$id);
                                 }
                                else
                                  {
                                    $licenseFrontImage = $this->upload->data('file_name');
                                  }
                                }




                      if(empty($_FILES['licenseBackImage']['name']))
                         {
                           $licenseBackImage1 = $this->input->post('hiddenlicenseBackImage');
                         }
                          else
                            {
                                unset($config);
                                $date = time();
                                $config['upload_path'] = './assets/admin/document/driver';
                                $config['allowed_types'] = 'jpeg|jpg|png|pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('licenseBackImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('sub-admin-update-driver/'.$id);
                                 }
                                else
                                  {
                                    $licenseBackImage1 = $this->upload->data('file_name');

                                  }
                                }




                    if(empty($_FILES['insuranceFileImage']['name']))
                         {
                           $insuranceFileImage1 = $this->input->post('hiddeninsuranceFileImage');
                         }
                          else
                            {
                               unset($config);
                                $date = time();
                                $config['upload_path'] = './assets/admin/document/driver';
                                $config['allowed_types'] = 'jpeg|jpg|png|pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('insuranceFileImage'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('sub-admin-update-driver/'.$id);
                                 }
                                else
                                  {
                                    $insuranceFileImage1 = $this->upload->data('file_name');

                                  }
                                }
                       // ************************* End uploading image *********************************
                              $update_data1  = array(
                                            'firstName'            => $this->input->post('firstName'),
                                            'lastName'             => $this->input->post('lastName'),
                                            'dob'                  => $this->input->post('dob'),
                                            'city'                 => $this->input->post('city'),
                                            'email'                => $this->input->post('email'),
                                            'mobileCountryCode'    => $this->input->post('mobileCountryCode'),
                                            'mobile'               => $this->input->post('mobile'),
                                            'address'              => $this->input->post('address'),
                                            'password'             => md5($this->input->post('password')),
                                            'normalPassword'       => $this->input->post('password'),
                                            'aboutMe'              => $this->input->post('aboutMe')
                                        );
                            $updateCondition = array('id' => $id);
                            $ohterTableCondition = array('driverId' => $id);
                          if($this->CommonModel->update($this->table , $update_data1, $updateCondition))
                            {

                                $update_data2  = array(
                                                'driverId'          => $id,
                                                'routingNo'         => $this->input->post('routingNo'),
                                                'accountNo'         => $this->input->post('accountNo'),
                                                'accountHolderName' => $this->input->post('accountHolderName'),
                                                'accountType'       => $this->input->post('accountType')
                                              );
                                            $this->CommonModel->update('driverBankDetail' , $update_data2, $ohterTableCondition); // insert bank detail


                                $update_data3  = array(
                                                'driverId'           => $id,
                                                'vehiclePlateNo'     => $this->input->post('vehiclePlateNo'),
                                                'vehicleType'        => $this->input->post('vehicleType'),
                                                'vehicleModel'       => $this->input->post('vehicleModel'),
                                                'vehicleColour'      => $this->input->post('vehicleColour'),
                                                'registrationYear'   => $this->input->post('registrationYear'),
                                                'childSeatAvailable' => $this->input->post('childSeatAvailable'),
                                                'maximumPerson'      => $this->input->post('maximumPerson'),
                                                'maximumLuggage'     => $this->input->post('maximumLuggage'),
                                                'airport'            => $this->input->post('airport'),
                                                'vehicleImage'       => $vehicleImage1
                                              );
                                            $this->CommonModel->update('driverVehicleDetail' , $update_data3, $ohterTableCondition);// insert vehicle detail

                                $update_data4  = array(
                                                'driverId'           => $id,
                                                'licenseFrontImage'  => $licenseFrontImage1,
                                                'licenseBackImage'   => $licenseBackImage1,
                                                'insuranceFileImage' => $insuranceFileImage1
                                              );
                                            $this->CommonModel->update('driverVehicleLicense' , $update_data4, $ohterTableCondition); // insert License detail

                             $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('sub-admin-driver-list');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('sub-admin-sub-update-list/'.$id);
                                }

                      }// form validation
                      else
                        {
                         $this->load->view('sub-admin/header');
                         $this->load->view('sub-admin/sidebar');
                         $this->load->view('sub-admin/edit_driver', $driverRecord);
                         $this->load->view('sub-admin/footer');
                        }

          }


         $this->load->view('sub-admin/header');
         $this->load->view('sub-admin/sidebar');
         $this->load->view('sub-admin/edit_driver', $driverRecord);
         $this->load->view('sub-admin/footer');
      }




      function deleteDriver($id){

          $cond=array('id' => $id);
          if($this->db->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('sub-admin-driver-list');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('sub-admin-driver-list');
                }
             }

     function viewDriver($id)
      {
        $driverRecord['singleRecord'] = $this->DriverModel->getDriverDetailbyId($id);
         $this->load->view('sub-admin/header');
         $this->load->view('sub-admin/sidebar');
         $this->load->view('sub-admin/view_driver', $driverRecord);
         $this->load->view('sub-admin/footer');
      }

    }
?>
