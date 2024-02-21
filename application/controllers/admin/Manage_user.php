<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_user extends CI_Controller
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
          $this->table="user";
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }
    /*  users list
     *  @method index
     *  @param null
     *  @route users-list
     */
      function index()
        {

          $cond=array();
          $order=array('id','DESC');

          $data['userData'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/all_user' , $data);
          $this->load->view('admin/footer');
      }

    /*  Add User By admin
     *  @method add_user
     *  @param null
     *  @route add-user
     */
     function add_user(){

       if(isset($_POST['submit']))
          {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
            // $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');


               if($this->form_validation->run()==true)
                  {

                      $UserTitle = $this->input->post('title');
                      $UserName  = $this->input->post('firstName');
                      $UserEmail = $this->input->post('email');
                      $password  = $this->input->post('confirm_password');
                      $subject   = 'Account Created';
                      // $mailMsg   = '';
                      // $mailMsg   .= 'Hi '.$UserTitle.' '.$UserName. ', '.'<br>';
                      // $mailMsg   .= 'Your Account has been created by admin <br>';
                      // $mailMsg   .= 'You can login now to use this Credentials <br>';
                      // $mailMsg   .= 'Your Email Id is <b>'.$UserEmail .' '. '</b>and Your Password is <b>'.$password.' </b><br>';

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
                                                                      <td align="left">'.'Hi '.$UserName. ', '.'<br>Welcome to Biology Booster. <br>Your Account has been created By Admin <br>
                                                                      You can login now to use this Credential <br> Your Email Id is: <b>'.$UserEmail .' '. '</b>and Your Password is: <b>'.$password.' </b><br></td>
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
                          $insert_data  = array(
                            'title'             => $this->input->post('title'),
                            'firstName'         => $this->input->post('firstName'),
                            'lastName'          => $this->input->post('lastName'),
                            'email'             => $this->input->post('email'),
                            'mobile'            => $this->input->post('mobile'),
                            'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                            'password'          => md5($this->input->post('password')),
                            'normalPassword'    => $this->input->post('password'),
                            'status'            => '1'
                            );
                             if($this->CommonModel->insert($this->table , $insert_data))
                              {
                               $this->session->set_flashdata('Success', 'Insert Successfully Done');
                               redirect('user-list');
                              }
                              else // if data not insert in database
                              {
                                $this->session->set_flashdata('Error', 'Something went wrong ');
                                redirect('add-user');
                              }
                        } // if mail not sent
                        else
                          {
                          $this->session->set_flashdata('Error', 'Something went wrong Email not sent');
                          redirect('add-user');
                          }
                      } // if form validation fail
                      else
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/add_user');
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/add_user');
            $this->load->view('admin/footer');
          }


      }


    /*  Add User By admin
     *  @method change status
     *  @param idmanage-user-tutorial
     *  @route change-status
     */

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
        redirect('user-list');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('user-list');
      }

    }

    /*  update user
     *  @method updateUser
     *  @param id
     *  @route update-user
     */

     function updateUser($id){
       $cond=array('id' => $id);
       $select='*';
       $userRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

       if(isset($_POST['submit']))
          {
            if($this->input->post('email') != $userRecord['singleRecord']['email'])
             {
               $is_unique =  '|is_unique[user.email]';
             }
              else
               {
                 $is_unique =  '';
               }

            $this->form_validation->set_rules('email', 'Email', 'required|trim'.$is_unique);
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');

            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');


            if($this->form_validation->run()==true)
                   {

                     // ************************* uploading image *********************************
                    // if(empty($_FILES['image']['name']))
                    //      {
                    //        $imageName = $this->input->post('hiddenImage');
                    //      }
                    //       else
                    //         {
                    //             unset($config);
                    //             $date = time();
                    //             $config['upload_path'] = './assets/frontend/images';
                    //             $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                    //             $config['overwrite'] = FALSE;
                    //             $config['remove_spaces'] = TRUE;
                    //             $image_name = $date.$_FILES['image']['name'];
                    //             $config['file_name'] = $image_name;
                    //             $this->load->library('upload', $config);
                    //             $this->upload->initialize($config);
                    //             if(!$this->upload->do_upload('image'))
                    //              {
                    //                // echo $this->upload->display_errors();exit;
                    //                 $this->session->set_flashdata('Error', 'Image can not upload');
                    //                 redirect('update-user/'.$id);
                    //              }
                    //             else
                    //               {
                    //                 $bannerImage = $this->upload->data();
                    //                 $imageName = $image_name;
                    //               }
                    //           }
                       // ************************* End uploading image *********************************
                        $update_data  = array(
                                      'title'             => $this->input->post('title'),
                                      'firstName'         => $this->input->post('firstName'),
                                      'lastName'          => $this->input->post('lastName'),
                                      'email'             => $this->input->post('email'),
                                      'mobile'            => $this->input->post('mobile'),
                                      'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                                      'password'          => md5($this->input->post('password')),
                                      'normalPassword'    => $this->input->post('password')
                                      );

                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {
                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('user-list');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-user/'.$id);
                                }
                      }
                      else
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_user', $userRecord);
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/edit_user', $userRecord);
            $this->load->view('admin/footer');
          }

      }


    /*  delete user
     *  @method deleteUser
     *  @param id
     *  @route delete-user
     */

      function deleteUser($id){

          $cond=array('id' => $id);
          if($this->db->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('user-list');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('user-list');
                }
             }


    }
?>
