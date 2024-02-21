<?php
defined('BASEPATH') or die('not allow to access script');
class Manage_coupon extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->table = "coupon";
		if (!$this->session->userdata('AdminEmail')) 
		{
			redirect('admin');
		}
	}

	function index() 
	{
		$cond  = array();
		$order = array('id', 'DESC');

		$data['couponData'] = $this->CommonModel->select($this->table, $cond, $order);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_coupon', $data);
		$this->load->view('admin/footer');
	}

	function add_coupon() 
	{
		if (isset($_POST['submit']))
		 {
			$this->form_validation->set_rules('validFrom', 'Valid From', 'trim|required');
			$this->form_validation->set_rules('validTo', 'Valid To', 'trim|required');
			$this->form_validation->set_rules('code', 'Code', 'trim|required|is_unique[coupon.code]');
			$this->form_validation->set_rules('value', 'Value', 'trim|required');
			$this->form_validation->set_rules('no_of_times', 'Number of Times', 'trim|required');

			if ($this->form_validation->run() == true)
			 {
				$insert_data = array(
					'validFrom'   => $this->input->post('validFrom'),
					'validTo'     => $this->input->post('validTo'),
					'code'        => $this->input->post('code'),
					'value'       => $this->input->post('value'),
					'no_of_times' => $this->input->post('no_of_times'),
					'status'      => '1',
				);
				if ($this->CommonModel->insert($this->table, $insert_data)) {
					$this->session->set_flashdata('Success', 'Insert Successfully Done');
					redirect('coupon-list');
				} 
				else
				 {
					// if data not insert in database
					{
						$this->session->set_flashdata('Error', 'Something went wrong ');
						redirect('add-coupon');
					}
				}
			}
			// if form validation fail
			 else
			  {
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/add_coupon');
				$this->load->view('admin/footer');
			}
		}
		 else 
		 {
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_coupon');
			$this->load->view('admin/footer');
		}

	}

	function changeStatus($id)
	 {
		$select = 'status';
		$cond   = array('id' => $id);

		$user = $this->CommonModel->single($this->table, $cond, $select);

		if ($user['status'] == 1)
		 {
			$updateStatus = 0;
		 } 
		else
		 {
			$updateStatus = 1;
		 }

		$data = array('status' => $updateStatus);
		$cond = array('id'     => $id);
		if ($this->CommonModel->update($this->table, $data, $cond)) 
		{
			$this->session->set_flashdata('Success', 'Status Changed Successfully');
			redirect('coupon-list');
		} 
		else
		{
			$this->session->set_flashdata('Error', 'Opps! Something went wrong');
			redirect('coupon-list');
		}

	}

	function updateCoupon($id)
	 {
		$cond                         = array('id' => $id);
		$select                       = '*';
		$couponRecord['singleRecord'] = $this->CommonModel->single($this->table, $cond, $select);

		if (isset($_POST['submit']))
		 {
			if ($this->input->post('code') != $couponRecord['singleRecord']['code'])
			 {
				$is_unique = '|is_unique[coupon.code]';
			 } 
			 else
			  {
				$is_unique = '';
			  }

			$this->form_validation->set_rules('validFrom', 'Valid From', 'trim|required');
			$this->form_validation->set_rules('validTo', 'Valid To', 'trim|required');
			$this->form_validation->set_rules('code', 'Code', 'trim|required'.$is_unique);
			$this->form_validation->set_rules('value', 'Value', 'trim|required');
			$this->form_validation->set_rules('no_of_times', 'Number of Times', 'trim|required');

			if ($this->form_validation->run() == true)
			 {

				// ************************* End uploading image *********************************
				$update_data = array(
					'validFrom'   => $this->input->post('validFrom'),
					'validTo'     => $this->input->post('validTo'),
					'code'        => $this->input->post('code'),
					'value'       => $this->input->post('value'),
					'no_of_times' => $this->input->post('no_of_times'),
				);

				if ($this->CommonModel->update($this->table, $update_data, $cond))
				 {
					$this->session->set_flashdata('Success', 'Update Successfully Done');
					redirect('coupon-list');
				 } 
				else
				{
					$this->session->set_flashdata('Error', 'Something went wrong !');
					redirect('update-coupon/'.$id);
				}
			}
			 else 
			 {
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/edit_coupon', $couponRecord);
				$this->load->view('admin/footer');
			 }

		}

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_coupon', $couponRecord);
		$this->load->view('admin/footer');
	}

	function deleteCoupon($id) 
	{

		$cond = array('id' => $id);
		if ($this->db->delete($this->table, $cond)) 
		{
			$this->session->set_flashdata('Success', 'Deleted Successfully');
			redirect('coupon-list');
		} 
		else
		 {
			$this->session->set_flashdata('Error', 'Opps! Something went wrong');
			redirect('coupon-list');
		 }
	}

}
?>