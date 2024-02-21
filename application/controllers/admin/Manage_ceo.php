<?php
  defined('BASEPATH') or die('not allow to access script');
  class Manage_ceo extends MY_Controller
     {
      function __construct()
      {
         parent::__construct();

          $this->table="admin";
          $this->load->model('JoinModel');
          if(!$this->session->userdata('AdminEmail')){
          redirect('admin');
          }
      }


      function index()
        {

          $cond=array('role' => '2');
          $order=array('id','DESC');

          $data['ceoData'] = $this->CommonModel->select($this->table, $cond ,$order);
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/all_ceo' , $data);
          $this->load->view('admin/footer');
       }


     function add_ceo(){

      //location listing
        $cond=array('status' => '1');
        $order=array('id','DESC');
        $data['locationList'] = $this->CommonModel->select('location', $cond ,$order);
        $data['uploadError'] = '';//image error

          if(isset($_POST['submit']))
           {
            if($this->session->userdata('formToken') != $this->input->post('formToken'))
            // preventing multi form data submit
            {
              $this->session->set_flashdata('Success', 'Insert Successfully Done');
              redirect('ceo-list');
            }
            else
            {

                  $this->session->unset_userdata('formToken');
                  $this->form_validation->set_rules('name', 'Name', 'trim|required');
                  $this->form_validation->set_rules('email', 'Email', 'trim|required');
                  $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
                  $this->form_validation->set_rules('address', 'Address', 'trim|required');
                  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
                  $this->form_validation->set_rules('location', 'Location', 'trim|required');
                  $this->form_validation->set_rules('password', 'Password', 'trim|required');
                  $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

                  if(empty($_FILES['document']['name']))
                  {
                    $this->form_validation->set_rules('document', 'Document', 'trim|required');
                  }

                    if($this->form_validation->run()==true)
                        {

                          // ************************* uploading image *********************************
                                      unset($config);
                                      $date = time();
                                      $config['upload_path'] = './assets/admin/document/ceo';
                                      $config['allowed_types'] = 'pdf';
                                      $config['overwrite'] = FALSE;
                                      $config['remove_spaces'] = TRUE;
                                      $this->load->library('upload', $config);
                                      $this->upload->initialize($config);
                                      if(!$this->upload->do_upload('document'))
                                      {
                                        $image_name = $this->upload->data('file_name');
                                        // echo $this->upload->display_errors();exit;
                                          $data['uploadError'] = $this->upload->display_errors();
                                          $this->load->view('admin/header');
                                          $this->load->view('admin/sidebar');
                                          $this->load->view('admin/add_ceo', $data);
                                          $this->load->view('admin/footer');
                                      }
                                      else
                                      {
                                        // ************************* End uploading image *********************************
                                        //$UserTitle = $this->input->post('title');
                                        $UserName  = $this->input->post('name');
                                        $UserEmail = $this->input->post('email');
                                        $password  = $this->input->post('confirm_password');
                                        $subject   = 'Account Created';

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
                                                                                        <td align="left">'.'Hi '.$UserName. ', '.'<br>Welcome to 121 Lifestyle. <br>Your Account has been created By Admin <br>
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
                                              'name'              => $this->input->post('name'),
                                              'email'             => $this->input->post('email'),
                                              'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                                              'mobile'            => $this->input->post('mobile'),
                                              'address'           => $this->input->post('address'),
                                              'document'          => $image_name,
                                              'location'          => $this->input->post('location'),
                                              'password'          => md5($this->input->post('password')),
                                              'normal_password'    => $this->input->post('password'),
                                              'status'            => '1',
                                              'role'              => '2'
                                              );
                                              if($this->CommonModel->insert($this->table , $insert_data))
                                                {
                                                $this->session->set_flashdata('Success', 'Insert Successfully Done');
                                                redirect('ceo-list');
                                                }
                                                else // if data not insert in database
                                                {
                                                  $this->session->set_flashdata('Error', 'Something went wrong ');
                                                  redirect('add-ceo');
                                                }
                                            } // if mail not sent
                                          else
                                            {
                                            $this->session->set_flashdata('Error', 'Something went wrong Email not sent');
                                            redirect('add-ceo');
                                            }
                                      }
                            } // if form validation fail
                            else
                              {
                              $this->load->view('admin/header');
                              $this->load->view('admin/sidebar');
                              $this->load->view('admin/add_ceo', $data);
                              $this->load->view('admin/footer');
                              }
                      }
                  }
                  else
                  {
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/add_ceo', $data);
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
        redirect('ceo-list');
      }
      else
      {
        $this->session->set_flashdata('Error', 'Opps! Something went wrong');
        redirect('ceo-list');
      }

    }



     function updateCeo($id){

       $cond=array('id' => $id);
       $select='*';
       $ceoRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
       //$ceoRecord['uploadError'] = '';//image error
        $cond1=array('status' => '1'); // fetching location
        $order1=array('id','DESC');
        $ceoRecord['locationList'] = $this->CommonModel->select('location', $cond1 ,$order1);
        if(isset($_POST['submit']))
          {

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobileCountryCode', 'Mobile Country Code', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('location', 'Location', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run()==true)
                   {

                     // ************************* uploading image *********************************
                    if(empty($_FILES['document']['name']))
                         {
                           $document = $this->input->post('hiddenDocument');
                         }
                          else
                            {
                                unset($config);
                                $date = time();
                                $config['upload_path'] = './assets/admin/document/ceo';
                                $config['allowed_types'] = 'pdf';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('document'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('update-ceo/'.$id);
                                 }
                                else
                                  {
                                    $document = $this->upload->data('file_name');

                                  }
                                }
                       // ************************* End uploading image *********************************
                                $update_data  = array(
                                                'name'              => $this->input->post('name'),
                                                'email'             => $this->input->post('email'),
                                                'mobileCountryCode' => $this->input->post('mobileCountryCode'),
                                                'mobile'            => $this->input->post('mobile'),
                                                'address'           => $this->input->post('address'),
                                                'document'          => $document,
                                                'location'          => $this->input->post('location'),
                                                'password'          => md5($this->input->post('password')),
                                                'normal_password'   => $this->input->post('password')
                                                );

                          if($this->CommonModel->update($this->table , $update_data, $cond))
                            {

                            $this->session->set_flashdata('Success', 'Update Successfully Done');
                             redirect('ceo-list');
                            }
                              else
                                {
                                $this->session->set_flashdata('Error', 'Something went wrong !');
                                redirect('update-ceo/'.$id);
                                }

                      }// form validation
                      else
                        {
                         $this->load->view('admin/header');
                         $this->load->view('admin/sidebar');
                         $this->load->view('admin/edit_ceo', $ceoRecord);
                         $this->load->view('admin/footer');
                        }

          }
          else
          {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/edit_ceo', $ceoRecord);
            $this->load->view('admin/footer');
          }

      }




      function deleteCeo($id){

          $cond=array('id' => $id);
          if($this->db->delete($this->table, $cond))
               {
              $this->session->set_flashdata('Success','Deleted Successfully');
              redirect('ceo-list');
              }
              else
                {
                  $this->session->set_flashdata('Error','Opps! Something went wrong');
                  redirect('ceo-list');
                }
             }

     function viewCeo($id)
      {
         $cond=array('id' => $id);
         $select='*';
         $ceoRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);
         $this->load->view('admin/header');
         $this->load->view('admin/sidebar');
         $this->load->view('admin/view_ceo', $ceoRecord);
         $this->load->view('admin/footer');
      }


      function setPermission()
      {

        if(isset($_POST['submit']))
        {
             $this->form_validation->set_rules('role', 'Role', 'trim|required');
             if($this->form_validation->run()==true)
                   {
                       if(isset($_POST['setMenuName']))
                         {
                            if (count($_POST['setMenuName']) >= 1)
                            {
                              $this->db->delete('set_permission', array('roleId' => $this->input->post('role')));
                              // deleting existing data
                              for ($k = 0; $k < count($_POST['setMenuName']); $k++)
                                {
                                 $permission = array(
                                    'roleId' => $this->input->post('role'),
                                    'menuId' => $this->input->post('setMenuName')[$k],
                                     );
                                $this->CommonModel->insert('set_permission' , $permission);
                                }
                             $this->session->set_flashdata('Success','Permission Set Successfully');
                             redirect('set-ceo-permission');
                            }
                          }
                   }
                   else
                   { // form validation false
                     $cond = array('parent_id' => '0');
                     $order = array('position' , 'ASC');
                     $data['menuList'] = $this->CommonModel->select('menu', $cond, $order);

                    // $cond1 = array('status' => '1', 'role' => '2');
                    //$order1 = array();
                    // $data['ceoList'] = $this->CommonModel->select('admin', $cond1, $order1);

                     $this->load->view('admin/header');
                     $this->load->view('admin/sidebar');
                     $this->load->view('admin/set_permission', $data);
                     $this->load->view('admin/footer');
                   }

        }
          else
          { // if not set submit button
             $cond = array('parent_id' => '0');
             $order = array('position' , 'ASC');
             $data['menuList'] = $this->CommonModel->select('menu', $cond, $order);

             //$cond1 = array('status' => '1', 'role' => '2');
             // $order1 = array();
             //$data['ceoList'] = $this->CommonModel->select('admin', $cond1, $order1);

             $this->load->view('admin/header');
             $this->load->view('admin/sidebar');
             $this->load->view('admin/set_permission', $data);
             $this->load->view('admin/footer');
          }
      }


      public function getSelectedMenuList()
      {
        if(!empty($this->input->post('roleId')))
        {
          $roleId =  $this->input->post('roleId');
          $menuList = $this->JoinModel->getSelectedMenuList();
          echo json_encode($menuList);
        }

      }

    }
?>
