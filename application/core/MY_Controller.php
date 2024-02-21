<?php
  defined('BASEPATH') or die('not allow to access script');
  class MY_Controller extends CI_Controller 
     {
      function __construct()
      {
         parent::__construct();
          $sideBar = getSidebar();
           $matched = '';
            foreach($sideBar as $menuBar)
             { 
                if($menuBar['MenuSlug'] != '') 
                {
                  $menuslug = $this->CommonModel->select('menu', array('id' => $menuBar['id']));
                }
                else
                {  
                  $menuslug = $this->CommonModel->select('menu', array('parent_id' => $menuBar['id']));
                }
                    foreach($menuslug as $mbar)
                    {
                        if($this->uri->segment(1) == $mbar['MenuSlug'])
                        {
                           $matched = 1;
                        }
                      
                     }
              }
           
            if($matched != 1)
                {
                  redirect('dashboard','refresh');
                }

          }

      }
      
?>