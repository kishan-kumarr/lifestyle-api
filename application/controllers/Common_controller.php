<?php
defined('BASEPATH') or die('not allow to access script');
class Common_controller extends CI_Controller
 {
	function __construct()
	 {
		parent::__construct();
	 }

	public function unique_email()
	{
		if ($this->input->post('email') != '')
		{
			$cond        = array('email' => $this->input->post('email'), 'status' => '1');
			$select      = 'email';
			$userData    = $this->CommonModel->single('user', $cond, $select);// checking in user table
			$ceoData     = $this->CommonModel->single('admin', $cond, $select);// checking in ceo table
			$managerData = $this->CommonModel->single('branch_manager', $cond, $select);// checking in branch_manager table
			$driverData  = $this->CommonModel->single('driver', $cond, $select);// checking in driver table

			if (!empty($userData))
			 {
				$data['status'] = 'false';
			 }
			 elseif (!empty($ceoData))
			 {
				$data['status'] = 'false';
			 }
			 elseif (!empty($managerData))
			 {
				$data['status'] = 'false';
			 }
			  elseif (!empty($driverData))
			 {
				$data['status'] = 'false';
			 }
			 else
			 {
				$data['status'] = 'success';
			 }
			// false = duplicate email found in same or another table
			// success = email is unique
			echo json_encode($data);
		}
	}

	public function update_unique_email()// chekcing for duplicate email while updating
	{
		if ($this->input->post('email') != '' && $this->input->post('id'))
		 {
			$cond        = array('email' => $this->input->post('email'), 'id !=' => $this->input->post('id'));
			$select      = 'email';
			$userData    = $this->CommonModel->single('user', $cond, $select);// checking in user table
			$ceoData     = $this->CommonModel->single('admin', $cond, $select);// checking in ceo table
			$managerData = $this->CommonModel->single('branch_manager', $cond, $select);// checking in branch_manager table
			$driverData  = $this->CommonModel->single('driver', $cond, $select);// checking in driver table
			//echo $this->db->last_query();
			exit;
			if (!empty($userData))
			 {
				$data['status'] = 'false';
			 }
			 elseif (!empty($ceoData))
			  {
				$data['status'] = 'false';
			 }
			 elseif (!empty($managerData))
			 {
				$data['status'] = 'false';
			 }
			 elseif (!empty($driverData))
			  {
				$data['status'] = 'false';
			 }
			 else
			  {
				$data['status'] = 'success';
			  }
			// false = duplicate email found in same or another table
			// success = email is unique
			echo json_encode($data);
		}
	}

	public function ceoList()
	{
		if ($this->input->post('locationId') != '')
		 {
			$cond  = array('location' => $this->input->post('locationId'), 'status' => '1', 'role' => '2');
			$order = array('id', 'DESC');
			$data  = $this->CommonModel->select('admin', $cond, $order);
			echo json_encode($data);
		}
	}

	public function branchManagerList()
	 {
		if ($this->input->post('branchId') != '')
		 {
			$cond  = array('branch' => $this->input->post('branchId'), 'status' => '1');
			$order = array('id', 'DESC');
			$data  = $this->CommonModel->select('branch_manager', $cond, $order);
			echo json_encode($data);
		}
	}


  public function getMaxChildPersonLuggage()
  {
    if($this->input->is_ajax_request())
        {
           $vehicleTypeId = $this->input->post('vehicleType');
           $cond          = array('id' => $vehicleTypeId);
           $select        = 'childSeatAvailable, maximumLuggage, maximumPerson';
           $maxValue      = $this->CommonModel->single('vehicle_type', $cond, $select);
           echo json_encode($maxValue);
        }
  }

}
?>
