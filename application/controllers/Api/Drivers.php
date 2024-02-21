<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Drivers extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('common');
    }

   // ************************************** User Login *******************************************//
    public function login()
    {

		 $Drivers["Status"] = false;
		 $Drivers["Message"] = "";
		 $Drivers["data"] = array();

		 $email = trim($this->input->post('email'));
     $password = trim(md5($this->input->post('password')));
          $cond = array('email' => $email ,'password' => $password, 'status' => '1');
          $select = '*';
          $result = $this->CommonModel->single('driver', $cond, $select);
          if($result)
            {
               if($this->input->post('rememberMe') != '')
               {
                $Drivers["rememberMe"] = true;
               }
               else
               {
                $Drivers["rememberMe"] = false;
               }
               $Drivers["Status"] = true;
               array_push($Drivers["data"],$result);

            }
             else
              {
               $Drivers["Status"] = false;
               $Drivers["Message"] = "Incorrect user email or password";
              }

        echo json_encode($Drivers);
	}
// ************************************** End User Login *******************************************//

// *************************** Get all mobile code ***********************************//
  public function mobileCountryCode()
    {
      $MobileCode["Status"] = false;
		  $MobileCode["Message"] = "";
      $MobileCode["data"] = array();
      if(getAllMobileCode()) // get all mobile country code using helper
      {
        $MobileCode["Status"] = true;
        $MobileCode["Message"] = "All mobile country code list";
        $MobileCode["data"] = getAllMobileCode();
      }
      else
      {
        $MobileCode["Status"] = false;
        $MobileCode["Message"] = "Something went wrong";
      }
      echo json_encode($MobileCode);
    }
// *************************** End Get all mobile code ***********************************//


// *************************** Get Account Type ***********************************//
  public function getAccountType()
    {
      $BankAccountType["Status"] = false;
      $BankAccountType["Message"] = "";
      $BankAccountType["data"] = array();
      $accountType = $this->CommonModel->select('accountType',array('status' => '1'), array());
      if($accountType) // get bank account type listing
      {
        $BankAccountType["Status"] = true;
        $BankAccountType["Message"] = "Bank account type list";
        $BankAccountType["data"] = $accountType;
      }
      else
      {
        $BankAccountType["Status"] = false;
        $BankAccountType["Message"] = "Something went wrong";
      }
      echo json_encode($BankAccountType);
    }
// *************************** End Get account type ***********************************//



// *************************** Get Vehicle Type ***********************************//
  public function getVehicleType()
    {
      $VehicleType["Status"] = false;
      $VehicleType["Message"] = "";
      $VehicleType["imgUrl"] = base_url('assets/admin/resizeImage');
      $VehicleType["data"] = array();
      $typeList = $this->CommonModel->select('vehicle_type',array('status' => '1'), array());
      if($typeList) // get bank account type listing
      {
        $VehicleType["Status"] = true;
        $VehicleType["Message"] = " Vehicle type list";
        $VehicleType["data"] = $typeList;
      }
      else
      {
        $VehicleType["Status"] = false;
        $VehicleType["Message"] = "Something went wrong";
      }
      echo json_encode($VehicleType);
    }
// *************************** End Get Vehicle type ***********************************//


  // *************************** Get Vehicle Model ***********************************//
  public function getVehicleModel()
    {
      $vehicleModel["Status"] = false;
      $vehicleModel["Message"] = "";
      $vehicleModel["data"] = array();
      $modelList = $this->CommonModel->select('vehicle_model',array('status' => '1'), array());
      if($modelList) // get bank account type listing
      {
        $vehicleModel["Status"] = true;
        $vehicleModel["Message"] = "Vehicle Model list";
        $vehicleModel["data"] = $modelList;
      }
      else
      {
        $vehicleModel["Status"] = false;
        $vehicleModel["Message"] = "Something went wrong";
      }
      echo json_encode($vehicleModel);
    }
// *************************** End Get Vehicle Model ***********************************//


  // *************************** Get Vehicle Colour ***********************************//
  public function getVehicleColour()
    {
      $VehicleColour["Status"] = false;
      $VehicleColour["Message"] = "";
      $VehicleColour["data"] = array();
      $colours = $this->CommonModel->select('vehicle_colour',array('status' => '1'), array());
      if($colours) // get bank account type listing
      {
        $VehicleColour["Status"] = true;
        $VehicleColour["Message"] = "Vehicle Colour list";
        $VehicleColour["data"] = $colours;
      }
      else
      {
        $VehicleColour["Status"] = false;
        $VehicleColour["Message"] = "Something went wrong";
      }
      echo json_encode($VehicleColour);
    }
// *************************** End Get Vehicle Colour ***********************************//





// *************************** User Registration ***********************************//
  public function insertDriverDetails()
    {

		 $Driver["Status"] = false;
		 $Driver["Message"] = "";


        $errors = array();
        if (mb_strlen(trim($_POST['firstName'])) <= 0)
         {
            $errors = 'Please Enter Your First Name';
         }
        if (mb_strlen(trim($_POST['dob'])) <= 0)
         {
            $errors = 'Please Enter Your Date of Birth';
         }

         if (mb_strlen(trim($_POST['state'])) <= 0)
          {
             $errors = 'Please Enter State';
          }

         if (mb_strlen(trim($_POST['mobileCountryCode'])) <= 0)
         {
            $errors = 'Please Enter Mobile Country code';
         }
        // if (mb_strlen(trim($_POST['mobile'])) != 10)
        //  {
        //     $errors = 'Please Enter valid mobile no';
        //  }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
         {
            $errors = 'Invalid Email Id';
         }
        if (mb_strlen(trim($_POST['password'])) < 6 )
         {
            $errors = 'Password must be at least 6 characters';
         }
         if(trim($_POST['password']) !== trim($_POST['confirmPassword']))
         {
            $errors = 'Password and Confirm Password must be same';
         }


       $uniqueEmail = uniqueEmailForApi($_POST['email']); // checkcing email exist or not in table(user,branch_manager,admin(ceo))

         if($uniqueEmail['status'] == 'false')
         {
            $errors = "Email id already used";
         }


        $cond3 = array('mobile' => $_POST['mobile']);
        $count_mobile =  $this->CommonModel->row_count('user', $cond3);
            if ($count_mobile > 0) {
                $errors = "Mobile no already used";
            }

        if (!empty($errors))
         {
    	       $Driver["Status"]=false;
             $Driver["Message"] = $errors;
        	   echo json_encode($Driver);
         }
          else
           {

             $insert_data  = array(
                                  'firstName'         => $this->input->post('firstName'),
                                  'lastName'          => $this->input->post('lastName'),
                                  'dob'               => $this->input->post('dob'),
                                  'email'             => $this->input->post('email'),
                                  'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                                  'mobile'            => $this->input->post('mobile'),
                                  'password'          => md5($this->input->post('password')),
                                  'normalPassword'    => $this->input->post('password'),
                                  'state'             => $this->input->post('state'),
                                  'aboutMe'           => $this->input->post('aboutMe'),
                                  'randCode'          => md5(time()),
                                  'status'            => '0',
                                  'createdBy'         => '0'
                                  ); // insert driver personal detail

                  if($this->CommonModel->insert('driver', $insert_data))
                  {
                    $Driver["Status"] = true;
                    $Driver["Message"] = "Personal details inserted";
                    echo json_encode($Driver);
                  }
                  else
                  {
                    $Driver["Status"] = false;
                    $Driver["Message"] = "Something went wrong!";
                    echo json_encode($Driver);
                  }

          } // if validation true
		  }// register function


    public function insertDriverBankDetail()
    {
       $Driver["Status"] = false;
       $Driver["Message"] = "";


        $errors = array();
        if ($this->input->post('routingNo') == '')
         {
            $errors = 'Please Enter Bank Route No.';
         }
         if ($this->input->post('accountNo') == '')
         {
            $errors = 'Please Enter Bank Account No.';
         }
         if ($this->input->post('accountHolderName') == '')
         {
            $errors = 'Please Enter Bank Bank Holder Name';
         }
         if ($this->input->post('accountType') == '')
         {
            $errors = 'Please Select Account Type';
         }
        if($this->input->post('email') != '')
        {
            $dId = $this->CommonModel->single('driver',array('email' => $this->input->post('email')), 'id');
            if(!empty($dId))
            {
             $driverId = $dId['id'];
            }else
            {
              $errors = 'Driver email not found';
            }
        }
        else
        {
           $errors = 'Driver email required';
        }


        if (!empty($errors))
         {
             $Driver["Status"]=false;
             $Driver["Message"] = $errors;
             echo json_encode($Driver);
         }
          else
           {

          $insert_data  = array(
                                'driverId'          => $driverId,
                                'routingNo'         => $this->input->post('routingNo'),
                                'accountNo'         => $this->input->post('accountNo'),
                                'accountHolderName' => $this->input->post('accountHolderName'),
                                'accountType'       => $this->input->post('accountType')
                              ); // insert driver bank detail

           if($this->CommonModel->insert('driverBankDetail', $insert_data))
                  {
                    $Driver["Status"] = true;
                    $Driver["Message"] = "Bank details inserted";
                    echo json_encode($Driver);
                  }
                  else
                  {
                    $Driver["Status"] = false;
                    $Driver["Message"] = "Something went wrong!";
                    echo json_encode($Driver);
                  }
         }

    }


    public function insertDriverVehicleDetail()
    {
       $Driver["Status"] = false;
       $Driver["Message"] = "";

        $errors = array();
        if ($this->input->post('vehiclePlateNo') == '')
         {
            $errors = 'Please Enter Vehicle Plate No.';
         }
         if ($this->input->post('vehicleType') == '')
         {
            $errors = 'Please Select Vehicle Type';
         }
         if ($this->input->post('vehicleModel') == '')
         {
            $errors = 'Please Select Vehicle Model';
         }

         if ($this->input->post('vehicleColour') == '')
         {
            $errors = 'Please Select Vehicle Colour';
         }

          if ($this->input->post('registrationYear') == '')
         {
            $errors = 'Please Select Registration Year';
         }
          if ($this->input->post('childSeatAvailable') == '')
         {
            $errors = 'Please Select Child Seat Available';
         }
          if ($this->input->post('maximumPerson') == '')
         {
            $errors = 'Please Select Maximum Person';
         }
          if ($this->input->post('maximumLuggage') == '')
         {
            $errors = 'Please Select Maximum Luggage';
         }

          if ($this->input->post('vehicleImage') == '')
         {
            $errors = 'Please Select Vehicle Image';
         }


        if($this->input->post('email') != '')
        {
            $dId = $this->CommonModel->single('driver',array('email' => $this->input->post('email')), 'id');
            if(!empty($dId))
            {
             $driverId = $dId['id'];
            }else
            {
              $errors = 'Driver email not found';
            }
        }
        else
        {
           $errors = 'Driver email required';
        }


        if (!empty($errors))
         {
             $Driver["Status"]=false;
             $Driver["Message"] = $errors;
             echo json_encode($Driver);
         }
          else
           {

                $insert_data  = array(
                                      'driverId'           => $driverId,
                                      'vehiclePlateNo'     => $this->input->post('vehiclePlateNo'),
                                      'vehicleType'        => $this->input->post('vehicleType'),
                                      'vehicleModel'       => $this->input->post('vehicleModel'),
                                      'vehicleColour'      => $this->input->post('vehicleColour'),
                                      'registrationYear'   => $this->input->post('registrationYear'),
                                      'childSeatAvailable' => $this->input->post('childSeatAvailable'),
                                      'maximumPerson'      => $this->input->post('maximumPerson'),
                                      'maximumLuggage'     => $this->input->post('maximumLuggage'),
                                      'vehicleImage'       => $this->input->post('vehicleImage')
                                     );
                   if($this->CommonModel->insert('driverVehicleDetail' , $insert_data))// insert vehicle detailvehicle detail
                    {
                      $Driver["Status"] = true;
                      $Driver["Message"] = "Vehicle details inserted";
                      echo json_encode($Driver);
                    }
                    else
                    {
                      $Driver["Status"] = false;
                      $Driver["Message"] = "Something went wrong!";
                      echo json_encode($Driver);
                    }
              }
            }





    public function insertDriverLicenseDetail()
    {

       $Driver["Status"] = false;
       $Driver["Message"] = "";


        $errors = array();
        if ($this->input->post('licenseFrontImage') == '')
         {
            $errors = 'Please Enter License Front Image.';
         }
         if ($this->input->post('licenseBackImage') == '')
         {
            $errors = 'Please Enter License Back Image';
         }
         if ($this->input->post('insuranceFileImage') == '')
         {
            $errors = 'Please Enter Insurance File Image';
         }



        if($this->input->post('email') != '')
        {
            $dId = $this->CommonModel->single('driver',array('email' => $this->input->post('email')), '*');
            if(!empty($dId))
            {
             $driverId = $dId['id'];
            }else
            {
              $errors = 'Driver email not found';
            }
        }
        else
        {
           $errors = 'Driver email required';
        }


        if (!empty($errors))
         {
             $Driver["Status"]=false;
             $Driver["Message"] = $errors;
             echo json_encode($Driver);
         }
          else
           {
              $randCode  = $dId['randCode'];
              $UserName  = $dId['firstName'];
              $UserEmail = $dId['email'];
              $subject   = 'Account Created';
              $siteName  = $this->lang->line('site_name');
              $mail_data['mailData'] = array(
                                            'siteName' => $siteName,
                                            'UserName' => $UserName
                                            );

              //********************** */ email templete ********************************
              $message = $this->load->view('email_templete/thank_you_templete',$mail_data,true);
              // echo $message;exit;

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
              $insert_data  = array(
                                    'driverId'           => $driverId,
                                    'licenseFrontImage'  => $this->input->post('licenseFrontImage'),
                                    'licenseBackImage'   => $this->input->post('licenseBackImage'),
                                    'insuranceFileImage' => $this->input->post('insuranceFileImage')
                                  );
                    if($this->CommonModel->insert('driverVehicleLicense' , $insert_data)) // insert License detail
                      {
                        $Driver["Status"]  = true;
                        $Driver["Message"] = "Thank You! Please Check Your E-mail";
                        echo json_encode($Driver);
                      }
                      else
                      {
                        $Driver["Status"] = false;
                        $Driver["Message"] = "Something went wrong!";
                        echo json_encode($Driver);
                      }
              }
              else
              {
                $Driver["Status"] = false;
                $Driver["Message"] = "Something went wrong with your email";
                echo json_encode($Driver);
              }
         }

    }



      public function driverConfirmation($pram = '')
      {
           $randCode = $this->uri->segment('2');

           $cond = array('randCode' => $randCode);
           if($this->CommonModel->row_count('driver', $cond))
           {
             //updating driver status
             $updateData = array ('status' => '0', 'randCode' => '');
               if($this->CommonModel->update('driver',$updateData ,$cond))
               {
                $Driver["Status"] = true;
                $Driver["Message"] = "Registration Successfully Done";
                echo json_encode($Driver);
               }
               else
               {
                $Driver["Status"] = false;
                $Driver["Message"] = "Something went wrong Please Try again!";
                echo json_encode($Driver);
               }
           }
           else
           {
            $Driver["Status"] = false;
            $Driver["Message"] = "Invailid Email Try again!";
            echo json_encode($Driver);
           }

      }
  // *************************** End User Registration ***********************************//

  // *************************** Password Recover ***********************************//
  public function forgetPassword()
  {
   $Users["Status"]=false;
   $Users["Message"]="";
   if(isset($_POST['email']))
   {
      $cond = array('email' => $_POST['email'],'status' => '1');
      if($this->CommonModel->row_count('driver', $cond))
        {
          $UserEmail = $_POST['email'];
          $randCode =  md5(time());

          $subject   = 'Password Recover';

          //********************** */ email templete ********************************
          $siteName    = $this->lang->line('site_name');
          $message='<html>
                <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <title>121 lifestyle</title>
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
                                                  <td align="center"><a href=""><img src="'.base_url().'/assets/admin/img/logo.png"></a></td>
                                              </tr>
                                            </tbody>
                                        </table>
                                        <table border="0" cellpadding="10" cellspacing="10" width="600" style="background: #fff; border:3px solid #ddd;">
                                            <tbody>
                                              <tr>
                                                  <td align="center" style="font-size: 30px; font-weight: bold; color: #222; letter-spacing: 1px; border-bottom:2px solid #115aa6;">Recover Your Password</td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                        <tbody>
                                                          <tr>
                                                              <td align="left"> <br>
                                                              <a href="'.base_url("driver-password-recover").'/'.$randCode.'">CLICK HERE TO RESET YOUR PASSWORD</a></b><br></td>
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

          $config = Array(
            'protocol'  => $this->lang->line('smtp'),
            'smtp_host' => $this->lang->line('smtp_host'),
            'smtp_port' => $this->lang->line('smtp_port'),
            'smtp_user' => $this->lang->line('smtp_user'),
            'smtp_pass' => $this->lang->line('smtp_pass'),
            'mailtype'  => $this->lang->line('mailtype'),
            'charset'   => $this->lang->line('charset')
          );

          $this->load->library('email', $config);
          $this->email->set_mailtype("html");
          $this->email->set_newline("\r\n");
          $this->email->from($this->lang->line('admin_email'),$siteName);
          $this->email->to($UserEmail);
          $this->email->subject($subject);
          $this->email->message($message);
          $result = $this->email->send();
          if( $result)
          {
              $updateData = array('randCode' => $randCode);
              $condition  = array('email'    => $UserEmail, 'status' => '1');
              if($this->CommonModel->update('driver', $updateData, $condition))
                {
                  $Users["Status"]= true;
                  $Users["Message"]="Password has been sent to your email";
                }
                else
                {
                  $Users["Status"]= false;
                  $Users["Message"]="Something went wrong";
                }
          }
          else
          {
            $Users["Message"]="Something wrong with your Email !!!";
          }
        }
        else
        {
          $Users["Message"]="Email id not exist !!!";
        }
    }
    echo json_encode($Users);
  }



  public function passwordRecover()
  {
   $Users["Status"]=false;
   $Users["Message"]="";
   $randCode = $this->uri->segment('2');
   $data['randCode'] = $randCode;
   if(isset($_POST['submit']))
       {
          $this->form_validation->set_rules('password', 'Password', 'trim|required');
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

           if($this->form_validation->run()==true)
            {
              $password = md5($this->input->post('confirm_password'));
              $normal_password = $this->input->post('confirm_password');
              $userEmail = $this->session->userdata('forgotEmail');

                  $data = array('randCode' => '' ,'password' => $password, 'normalPassword' => $normal_password);
                  $cond = array('randCode' => $randCode);

                  if($this->CommonModel->update('driver', $data, $cond))
                  {
                    $Users["Status"]= true;
                    $Users["Message"]="Password updated successfully";
                    // $this->session->set_flashdata('Success','Password Updated Successfully');
                     redirect('driver-password-recover/'.$randCode);
                  }
                  else
                  {
                    $Users["Status"]= false;
                    $Users["Message"]="Something went wrong";
                    // $this->session->set_flashdata('Error','Somethig went wrong');
                    redirect('driver-password-recover/'.$randCode);
                  }
                echo json_encode($Users);
             }
             else
             {
               // if form validation false
               $this->load->view('frontend/driver_recover_password', $data);
             }
        }
        $this->load->view('frontend/driver_recover_password', $data);
  }
// *************************** End Password Recover ***********************************//



// *************************** Select city ***********************************//
    public function selectCity()
    {
      $City['Status'] = false;
      $City['Message'] = '';

      $cond = array('email' => $_POST['email'], 'status' => '1');
     // $count_emails = $this->CommonModel->row_count('user', $cond);
      if ($this->CommonModel->row_count('user', $cond) <= 0)
       {
          $errors = "Email id not exist";
       }

         if ($_POST['cityId'] == '' || $_POST['cityId'] == 0)
         {
            $errors = "Please select city";
         }
          if (!empty($errors))
            {
                $City["Status"]=false;
                $City["Message"] = $errors;
                echo json_encode($City);
            }
            else
            {
                $City["Status"]=true;
                $City["Message"] = 'Result';
                echo json_encode($City);
            }

    }
// *************************** End Select city ***********************************//


     // *************************** Get Predifene message list ***********************************//
  public function getAllPredifineMessages()
    {
      $message["Status"] = false;
      $message["Message"] = "";
      $message["data"] = array();
      $messageList = $this->CommonModel->select('predefine_message',array('status' => '1'), array());
      if($messageList)
      {
        $message["Status"] = true;
        $message["Message"] = "Predefine Messages list";
        $message["data"] = $messageList;
      }
      else
      {
        $message["Status"] = false;
        $message["Message"] = "Something went wrong";
      }
      echo json_encode($message);
    }
// *************************** End Predifene message list ***********************************//





function uploadImageUsingBase64()
{
    $image_parts    = explode(";base64,", $this->input->post('image'));
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type     = 'jpeg';
    $filename       = uniqid().'.' .$image_type;
    if(!file_exists('./attachments/products/'.$this->session->userdata('id')))
    {
      if(mkdir('./attachments/products/'.$this->session->userdata('id'), 777));
    }
    $filepath = './attachments/products/'.$this->session->userdata('id').'/'.$filename;
    $blob= $image_parts[1];
    file_put_contents($filepath, base64_decode( str_replace('data:image/jpeg;base64,', '', $blob)));
    $response=array('image_path'=>$filepath,'image_name'=>$filename,'image_id'=>time());
    echo json_encode($response);
}



 }
