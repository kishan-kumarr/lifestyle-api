<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getAllMobileCode()
{
	$ci =& get_instance();
	$ci->db->group_by('country_isd_code');
	$ci->db->order_by("country_isd_code", "asc");
	$query = $ci->db->get('mobileCode');
	return $query->result_array();
}


function getSingleMobileCode($id = '')
{
	if($id !='')
	{
		$ci =& get_instance();
		$ci->db->where('id',$id);
		$query = $ci->db->get('mobileCode');
		return $query->result_array();
	}

}


function getLocationName($id = '')
{
	 $ci =& get_instance();
	 $cond = array('id' => $id);
     return $locationName = $ci->CommonModel->select('location', $cond , array()); //getting location name
}


function getBranchName($id = '')
{
	 $ci =& get_instance();
	 $cond = array('id' => $id);
     return $branchName = $ci->CommonModel->select('branch', $cond , array()); //getting branch name
}


function getCeoName($id = '')
{
	 $ci =& get_instance();
	 $cond = array('id' => $id, 'status'=> 1, 'role' => 2);
     return $ceoName = $ci->CommonModel->select('admin', $cond , array()); //getting ceo name
}


function getCeoRecord($ceoEmail = '')
{
	 $ci =& get_instance();
	 $cond = array('email' => $ceoEmail, 'status' => 1, 'role'=> 2);
     return $ceoName = $ci->CommonModel->select('admin', $cond , array()); //getting ceo name
}

function getBranchRecord($branchManagerEmail = '')
{
	 $ci =& get_instance();
	 $cond = array('email' => $branchManagerEmail);
     return $branchName = $ci->CommonModel->select('branch_manager', $cond , array()); //getting branch name
}



function subMenu($id = '')
{
	 $ci =& get_instance();
	 $cond = array('parent_id'=> $id, 'visible' => '1');
	 $order = array();
     return $subMenu = $ci->CommonModel->select('menu', $cond , $order); //getting Sidebar Menu

     // echo "<pre>";
     // print_r($subMenu);exit;
}


   function uniqueEmailForApi($email = '')
        {
        $ci =& get_instance();
          if($email != '')
          {
          $cond        = array('email' => $email, 'status' => '1');
          $select      = 'email';
          $userData    = $ci->CommonModel->single('user', $cond ,$select); // checking in user table
          $ceoData     = $ci->CommonModel->single('admin', $cond ,$select); // checking in ceo table
          $managerData = $ci->CommonModel->single('branch_manager', $cond ,$select); // checking in branch_manager table
          $driverData  = $ci->CommonModel->single('driver', $cond ,$select); // checking in driver table

              if(!empty($userData))
              {
                $data['status'] = 'false';
              }
              elseif(!empty($ceoData))
              {
                $data['status'] = 'false';
              }
              elseif(!empty($managerData))
              {
                $data['status'] = 'false';
              }
              elseif(!empty($driverData))
              {
                $data['status'] = 'false';
              }
              else
              {
                $data['status'] = 'success';
              }
              // false = duplicate email found in same or another table
              // success = email is unique
             return $data;
          }
        }


function getSidebar()
{
   $ci =& get_instance();
   $table = 'admin';
   $loginCond = array('email' => $ci->session->userdata('AdminEmail'));
   $select = '*';
   $loginAs = $ci->CommonModel->single($table, $loginCond, $select);


  if($loginAs['role'] == '2')
  { // log in as ceo
    $ci->db->select('menu.*,set_permission.menuId,set_permission.roleId')
             ->from('menu')
             ->order_by('position','ASC')
             ->join('set_permission','menu.id = set_permission.menuId','Right')
             ->where('menu.parent_id', '0')
             ->where('set_permission.roleId', $loginAs['role']);

             return  $ci->db->get()->result_array();
     }
     else
     { // log in as admin
     $cond = array();
     $order = array('position', 'ASC');
       return $sideBarMenu = $ci->CommonModel->select('menu', $cond , $order); //getting Sidebar Menu
        // echo $ci->db->last_query();exit;
     }
}


function getMenuSlug()
{
  $ci =& get_instance();
   $table = 'admin';
   $loginCond = array('email' => $ci->session->userdata('AdminEmail'));
   $select = '*';
   $loginAs = $ci->CommonModel->single($table, $loginCond, $select);


  if($loginAs['role'] == '2')
  { // log in as ceo
    $ci->db->select('menu.*,set_permission.menuId,set_permission.roleId')
             ->from('menu')
             ->order_by('position','ASC')
             ->join('set_permission','menu.id = set_permission.menuId','Right')
             ->where('set_permission.roleId', $loginAs['role']);

             return  $ci->db->get()->result_array();
     }
     else
     { // log in as admin
     $cond = array();
     $order = array('position', 'ASC');
       return $sideBarMenu = $ci->CommonModel->select('menu', $cond , $order); //getting Sidebar Menu
     }
}




?>
