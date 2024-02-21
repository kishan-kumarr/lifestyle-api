<?php
  defined('BASEPATH') or die('not allow to access script');

  class ManageTutorial extends MY_Controller
     {
        function __construct()
        {
          parent::__construct();
            $this->table="manageToturial";
            if(!$this->session->userdata('AdminEmail'))
            {
              redirect('admin');
            }
        }


        function index()
        {
            $cond = array();
            $order = array('id', 'desc');
            $datas = $this->CommonModel->select($this->table, $cond, $order);
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/tutorial_list', compact('datas'));
            $this->load->view('admin/footer');
        }



        function updateTutorial($id = null)
        {
          $cond = array('id' => $id);
          $singleRecord = $this->CommonModel->single($this->table, $cond);

          if($this->input->post('submit'))
          {
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

              if($this->form_validation->run())
              {
                   if(empty($_FILES['image']['name']))
                         {
                           $image = $this->input->post('hiddenImage');
                         }
                          else
                            {
                               //-------- unlink the previous files ----------//
                      					unlinkImage($this->table, $cond, 'image');

                                unset($config);
                                $config['upload_path'] = './assets/admin/img';
                                $config['allowed_types'] = 'jpeg|jpg|png';
                                $config['overwrite'] = FALSE;
                                $config['remove_spaces'] = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload('image'))
                                 {
                                   // echo $this->upload->display_errors();exit;
                                    $this->session->set_flashdata('Error', $this->upload->display_errors());
                                    redirect('update-tutorial/'.$id);
                                 }
                                else
                                  {
                                    $image =  $this->upload->data('file_name');

                                    resizeImage("./assets/admin/img/","./assets/admin/resizeImage/",$image,1080,1620);
                                  }
                                }

                             $updateData = array(
                                    'image' => $image,
                                    'description' => $this->input->post('description')
                                   );
                      if($this->CommonModel->update($this->table , $updateData, $cond))
                      {
                          $this->session->set_flashdata('Success', 'Update Successfully Done');
                          redirect('manage-user-tutorial');
                      }
                      else
                      {
                          $this->session->set_flashdata('Error', 'Something went wrong');
                          redirect('update-tutorial/'.$id);
                      }

              }
              else
              {
                // validation fail
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/edit_tutorial', compact('singleRecord'));
                $this->load->view('admin/footer');
              }
          }
          else
           {
              $this->load->view('admin/header');
              $this->load->view('admin/sidebar');
              $this->load->view('admin/edit_tutorial', compact('singleRecord'));
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
           redirect('manage-user-tutorial');
          }
         else
         {
          $this->session->set_flashdata('Error', 'Opps! Something went wrong');
          redirect('manage-user-tutorial');
         }

       }




  }
?>
