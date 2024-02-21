<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('common');
	}

	// ------------------------------------------------------ User Login -------------------------------------------------------------------//
	public function login()
	 {
		$Users["Status"]  = false;
		$Users["Message"] = "";
		$Users["data"]    = array();

		$email    = trim($this->input->post('email'));
		$password = trim(md5($this->input->post('password')));
		$cond     = array('email' => $email, 'password' => $password, 'status' => '1');
		$select   = '*';
		$result   = $this->CommonModel->single('user', $cond, $select);
		if ($result) {
			$Users["Status"] = true;
			array_push($Users["data"], $result);

		} else {
			$Users["Status"]  = false;
			$Users["Message"] = "Incorrect user email or password";
		}

		echo json_encode($Users);
	}


	// ------------------------------------------------------ Check already social register or not -------------------------------------------------------------------//
	public function checkSocialRegisterOrNot()
	 {
		$Users["Status"]      = false;
		$Users["isRegister"]  = "";
		$Users["Message"] 		= "";

		$token    = trim($this->input->post('socialToken'));
		$cond     = array('socialToken' => $token);
		$select   = 'socialToken';
		$result   = $this->CommonModel->single('user', $cond, $select);


		if($token != '')
		{
					if ($result)
					 {
						$Users["Status"] = false;
						$Users["Message"] = "Already Registered !";
						$Users["isRegister"] = 1;
					 }
					else
					 {
						 $Users["Status"] = false;
 						 $Users["Message"] = "New User";
 						 $Users["isRegister"] = 0;
					 }
			}


	}



	// ------------------------------------------------------ Social Login -------------------------------------------------------------------//
	public function socialLogin()
	 {
		$Users["Status"]      = false;
		$Users["isRegister"]  = "";
		$Users["Message"] 		= "";
		$Users["data"]    		= array();
		$errors           		= array();

		$token    = trim($this->input->post('socialToken'));
		$cond     = array('socialToken' => $token);
		$select   = 'socialToken';
		$result   = $this->CommonModel->single('user', $cond, $select);


		if($token != '')
		{
					if ($result)
					 {
						$Users["Status"] = false;
						$Users["Message"] = "Already Registered !";
						$Users["isRegister"] = 1;

					 }
					else
					 {

							if (mb_strlen(trim($_POST['firstName'])) <= 0)
				 			 {
				 				$errors = 'Please Enter Your First Name';
				 		   }
				 			if (mb_strlen(trim($_POST['mobileCountryCode'])) <= 0)
				 			 {
				 				$errors = 'Please Enter Mobile Country code';
				 			 }
				 			// if (mb_strlen(trim($_POST['mobile'])) != 10)
				 			// {
				 			// 	$errors = 'Please Enter valid mobile no';
				 			// }
				 			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				 			 {
				 				$errors = 'Invalid Email Id';
				 		 	}

							$uniqueEmail = uniqueEmailForApi($_POST['email']);// checkcing email exist or not in table(user,branch_manager,admin(ceo))
							if ($uniqueEmail['status'] == 'false')
							 {
								$errors = "Email id already used";
							 }

							 if (!empty($errors))
					 		 {
					 			$Users["Status"]  = false;
					 			$Users["Message"] = $errors;
							 }
							 else
							 {
									 $insertData = array(
																			 'firstName'         => $this->input->post('firstName'),
																			 'lastName'          => $this->input->post('lastName'),
																			 'email'             => $this->input->post('email'),
																			 'mobileCountryCode' => $this->input->post('mobileCountryCode'),
																			 'mobile'            => $this->input->post('mobile'),
																			 'status'            => '1',
																			 'socialToken'			 => $this->input->post('socialToken')
																		 );

										 if ($this->CommonModel->insert('user', $insertData))
										  {
											 $Users["Status"]  = true;
											 $Users["Message"] = "Data inserted Successfully !";
										  }
										  else
											 {
												 $Users["Status"]  = false;
												 $Users["Message"] = "Something went wrong!";
										   }
							 } //

					 }
			}// if token blank

		echo json_encode($Users);
	}



	// ------------------------------------------*. Get all mobile code --------------------------------------------------*//
	public function mobileCountryCode()
	 {
		$MobileCode["Status"]  = false;
		$MobileCode["Message"] = "";
		$MobileCode["data"]    = array();

		if (getAllMobileCode())// get all mobile country code using helper
		{
			$MobileCode["Status"]  = true;
			$MobileCode["Message"] = "All mobile country code list";
			$MobileCode["data"]    = getAllMobileCode();
		} else {
			$MobileCode["Status"]  = false;
			$MobileCode["Message"] = "Something went wrong";
		}
		echo json_encode($MobileCode);
	}
	// ------------------------------------------* End Get all mobile code --------------------------------------------------*//

	// ------------------------------------------* User Registration --------------------------------------------------*//
	public function register()
	 {

		$Users["Status"]  = false;
		$Users["Message"] = "";

		$errors = array();
		if (mb_strlen(trim($_POST['firstName'])) <= 0)
		 {
			$errors = 'Please Enter Your First Name';
		}
		if (mb_strlen(trim($_POST['mobileCountryCode'])) <= 0)
		 {
			$errors = 'Please Enter Mobile Country code';
		}
		// if (mb_strlen(trim($_POST['mobile'])) != 10)
		// {
		// 	$errors = 'Please Enter valid mobile no';
		// }
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		 {
			$errors = 'Invalid Email Id';
		}
		if (mb_strlen(trim($_POST['password'])) < 6)
		{
			$errors = 'Password must be at least 6 characters';
		}
		if (trim($_POST['password']) !== trim($_POST['confirmPassword']))
		 {
			$errors = 'Password and Confirm Password must be same';
		}
		$uniqueEmail = uniqueEmailForApi($_POST['email']);// checkcing email exist or not in table(user,branch_manager,admin(ceo))
		if ($uniqueEmail['status'] == 'false')
		 {
			$errors = "Email id already used";
		}

		if (isset($_POST['referredByOther']) && !empty($_POST['referredByOther']))
		 {
			$cond1               = array('my_referal_code' => $_POST['referredByOther']);
			$count_refferal_code = $this->CommonModel->row_count('user', $cond1);
			if ($count_refferal_code <= 0)
			{
				$errors = "Invailid Referral Code";
			}
		}

		$cond3        = array('mobile' => $_POST['mobile']);
		$count_mobile = $this->CommonModel->row_count('user', $cond3);
		if ($count_mobile > 0)
		{
			$errors = "Mobile no already used";
		}

		if (!empty($errors))
		 {
			$Users["Status"]  = false;
			$Users["Message"] = $errors;
			echo json_encode($Users);
		}
		else
		 {
			 $randCode  = md5(time());//using for mail varify
			// $UserName  = $_POST['firstName'];
			// $UserEmail = $_POST['email'];
			// $password  = $_POST['password'];
			// $subject   = 'Account Created';

			//-----------------------------* */ email templete ------------------------------------------------

			// $siteName = $this->lang->line('site_name');
			// $message  = '<html>
      //             <head>
      //                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
      //                 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      //                 <title>121 lifestyle</title>
      //                 <!-- <link href="https://fonts.googleapis.com/css?family=roboto:300,300i,400,400i,500,500i,600,700,800,900" rel="stylesheet"> -->
      //             </head>
      //             <body style="background-color: #f1f1f1; font-family: roboto, sans-serif; font-size: 15px; margin: 0; padding: 0;">
      //                 <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="background: #f1f1f1; font-family: "roboto", sans-serif; font-size: 14px;">
      //                 <tbody>
      //                   <tr>
      //                       <td align="center">
      //                         <table border="0" cellpadding="10" cellspacing="0" width="600" align="center">
      //                             <tbody>
      //                               <tr>
      //                                   <td align="center">
      //                                     <table border="0" cellpadding="10" cellspacing="0" width="600">
      //                                         <tbody>
      //                                           <tr>
      //                                               <td align="center"><a href=""><img src="'.base_url().'/assets/admin/img/logo.png"></a></td>
      //                                           </tr>
      //                                         </tbody>
      //                                     </table>
      //                                     <table border="0" cellpadding="10" cellspacing="10" width="600" style="background: #fff; border:3px solid #ddd;">
      //                                         <tbody>
      //                                           <tr>
      //                                               <td align="center" style="font-size: 30px; font-weight: bold; color: #222; letter-spacing: 1px; border-bottom:2px solid #115aa6;">Account Created</td>
      //                                           </tr>
      //                                           <tr>
      //                                               <td>
      //                                                 <table border="0" cellpadding="0" cellspacing="0" width="600">
      //                                                     <tbody>
      //                                                       <tr>
      //                                                           <td align="left">'.'Hi '.$UserName.', '.'<br>Welcome to '.$siteName.'<br>Your Account has been created Successfully <br>
      //                                                           <a href="'.base_url("user-confirmation").'/'.$randCode.'">CLICK HERE TO ACTIVATE YOUR ACCOUNT</a></b><br></td>
      //                                                       </tr>
      //                                                     </tbody>
      //                                                 </table>
      //                                               </td>
      //                                           </tr>
      //                                           <tr>
      //                                               <td>
      //                                                 <table border="0" cellpadding="0" cellspacing="0" width="600">
      //                                                     <tbody>
      //                                                       <tr>
      //                                                           <td align="left" valign="top">
      //                                                             <p>Team, <br><a href="'.base_url().'">'.$siteName.'</a></p>
      //                                                           </td>
      //                                                     </tbody>
      //                                                 </table>
      //                                               </td>
      //                                           </tr>
      //                                         </tbody>
      //                                     </table>
      //                                   </td>
      //                               </tr>
      //                             </tbody>
      //                         </table>
      //                       </td>
      //                   </tr>
      //                 </tbody>
      //                 </table>
      //             </body>
      //           </html>';
			//
			// $config = Array(
			// 	'protocol'  => $this->lang->line('smtp'),
			// 	'smtp_host' => $this->lang->line('smtp_host'),
			// 	'smtp_port' => $this->lang->line('smtp_port'),
			// 	'smtp_user' => $this->lang->line('smtp_user'),
			// 	'smtp_pass' => $this->lang->line('smtp_pass'),
			// 	'mailtype'  => $this->lang->line('mailtype'),
			// 	'charset'   => $this->lang->line('charset')
			// );
			//
			// $this->load->library('email', $config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");
			// $this->email->from($this->lang->line('admin_email'), $siteName);
			// $this->email->to($UserEmail);
			// $this->email->subject($subject);
			// $this->email->message($message);
			// $result = $this->email->send();

			$myReferralCode = time();

			//if ($result)
			 //{
				$insertData = array(
					'firstName'         => $this->input->post('firstName'),
					'lastName'          => $this->input->post('lastName'),
					'email'             => $this->input->post('email'),
					'mobileCountryCode' => $this->input->post('mobileCountryCode'),
					'mobile'            => $this->input->post('mobile'),
					'password'          => md5($this->input->post('password')),
					'normalPassword'    => $this->input->post('password'),
					'status'            => 1,
					'my_referal_code'   => $myReferralCode,
					'referredByOther'   => $this->input->post('referredByOther'),
					'randCode'          => $randCode,
				);

				if ($this->CommonModel->insert('user', $insertData))
				 {
					$Users["Status"]  = true;
					$Users["Message"] = "Registration Successful.";
					echo json_encode($Users);
				}
				else
				 {
					$Users["Status"]  = false;
					$Users["Message"] = "Something went wrong!";
					echo json_encode($Users);
				}

		//	}// end mail function
		}// if validation true
	}// register function

	public function userConfirmation($pram = '')
	 {
		$randCode = $this->uri->segment('2');

		$cond = array('randCode' => $randCode);
		if ($this->CommonModel->row_count('user', $cond))
		 {
			//updating user status
			$updateData = array('status' => '1', 'randCode' => '');
			if ($this->CommonModel->update('user', $updateData, $cond))
			 {
				$Users["Status"]  = true;
				$Users["Message"] = "Registration Successfully Done";
				echo json_encode($Users);
			}
			else
			{
				$Users["Status"]  = false;
				$Users["Message"] = "Something went wrong Please Try again!";
				echo json_encode($Users);
			}
		}
		else
		{
			$Users["Status"]  = false;
			$Users["Message"] = "Invailid Email Try again!";
			echo json_encode($Users);
		}

	}
	// ------------------------------------------* End User Registration --------------------------------------------------*//

	// ------------------------------------------* Password Recover --------------------------------------------------*//
	public function forgetPassword() {
		$Users["Status"]  = false;
		$Users["Message"] = "";
		if (isset($_POST['email'])) {
			$cond = array('email' => $_POST['email'], 'status' => '1');
			if ($this->CommonModel->row_count('user', $cond)) {
				$UserEmail = $_POST['email'];
				$randCode  = md5(time());

				$subject = 'Password Recover';

				//-----------------------------* */ email templete ------------------------------------------------
				$siteName = $this->lang->line('site_name');
				$message  = '<html>
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
                                                          <a href="'.base_url("password-recover").'/'.$randCode.'">CLICK HERE TO RESET YOUR PASSWORD</a></b><br></td>
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
				$this->email->from($this->lang->line('admin_email'), $siteName);
				$this->email->to($UserEmail);
				$this->email->subject($subject);
				$this->email->message($message);
				$result = $this->email->send();
				if ($result) {
					$updateData = array('randCode' => $randCode);
					$condition  = array('email'    => $UserEmail, 'status'    => '1');
					if ($this->CommonModel->update('user', $updateData, $condition)) {
						$Users["Status"]  = true;
						$Users["Message"] = "Password has been sent to your email";
					} else {
						$Users["Status"]  = false;
						$Users["Message"] = "Something went wrong";
					}
				} else {
					$Users["Message"] = "Something wrong with your Email !!!";
				}
			} else {
				$Users["Message"] = "Email id not exist !!!";
			}
		}
		echo json_encode($Users);
	}

	public function passwordRecover() {
		$Users["Status"]  = false;
		$Users["Message"] = "";
		$randCode         = $this->uri->segment('2');
		$data['randCode'] = $randCode;
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

			if ($this->form_validation->run() == true) {
				$password        = md5($this->input->post('confirm_password'));
				$normal_password = $this->input->post('confirm_password');
				$userEmail       = $this->session->userdata('forgotEmail');

				$data = array('randCode' => '', 'password' => $password, 'normalPassword' => $normal_password);
				$cond = array('randCode' => $randCode);

				if ($this->CommonModel->update('user', $data, $cond)) {
					$Users["Status"]  = true;
					$Users["Message"] = "Password updated successfully";
					// $this->session->set_flashdata('Success','Password Updated Successfully');
					redirect('password-recover/'.$randCode);
				} else {
					$Users["Status"]  = false;
					$Users["Message"] = "Something went wrong";
					// $this->session->set_flashdata('Error','Somethig went wrong');
					redirect('password-recover/'.$randCode);
				}
				echo json_encode($Users);
			} else {
				// if form validation false
				$this->load->view('frontend/recover_password', $data);
			}
		} else {
			$this->load->view('frontend/recover_password', $data);
		}
	}
	// ------------------------------------------* End Password Recover --------------------------------------------------*//

	// ------------------------------------------* Get all city List --------------------------------------------------*//
	public function getAllCity() {
		$City['Status']  = false;
		$City['Message'] = '';
		$cond            = array('status' => '1');
		$order           = array('id', 'DESC');
		if ($allCityList = $this->CommonModel->select('city', $cond, $order)) {
			$City['Status']  = true;
			$City['Message'] = 'All City list';
			$City['data']    = $allCityList;
		} else {
			$City['Status']  = false;
			$City['Message'] = 'Empty City List';
		}
		echo json_encode($City);
	}
	// ------------------------------------------* End Get all city List --------------------------------------------------*//

	// ------------------------------------------* Select city --------------------------------------------------*//
	public function selectCity() {
		$City['Status']  = false;
		$City['Message'] = '';

		$cond = array('email' => $_POST['email'], 'status' => '1');
		// $count_emails = $this->CommonModel->row_count('user', $cond);
		if ($this->CommonModel->row_count('user', $cond) <= 0) {
			$errors = "Email id not exist";
		}

		if ($_POST['cityId'] == '' || $_POST['cityId'] == 0) {
			$errors = "Please select city";
		}
		if (!empty($errors)) {
			$City["Status"]  = false;
			$City["Message"] = $errors;
			echo json_encode($City);
		} else {
			$City["Status"]  = true;
			$City["Message"] = 'Result';
			echo json_encode($City);
		}

	}
	// ------------------------------------------* End Select city --------------------------------------------------*//


	public function userTutorial()
	{
		$tutorial['Status']   = true;
		$tutorial['imageUrl'] = base_url('assets/admin/resizeImage');

		$cond = array('status' => '1');
		$order = array('id', 'desc');
		$tutorial['data'] = $this->CommonModel->select('manageToturial', $cond, $order);
		echo json_encode($tutorial);

	}


}
