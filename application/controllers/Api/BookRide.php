<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookRide extends CI_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('common');
		$this->load->model('JoinModel');
	}

	// ---------------------------** Airport Listing ------------------------------***//
	public function selectAirport() {
		$Ride["Status"]  = false;
		$Ride["Message"] = "";
		$Ride["data"]    = array();
		$airportList     = $this->CommonModel->select('airport', array('status' => '1'), array('id','DESC'));
		if ($airportList)
		{
			$Ride["Status"]  = true;
			$Ride["Message"] = "Airport Listing";
			$Ride["data"]    = $airportList;
		}
		else
		 {
			$Ride["Status"]  = false;
			$Ride["Message"] = "No result found!";
		 }
		echo json_encode($Ride);
	}

	// ---------------------------** End Airport listing ------------------------------***//


	// ----------------------- Available vehicle type list ------------------------------//

		 public function availableVehicleType()
		 {
	 		 $vehicleType["Message"]  = "";
			 $vehicleType["imageUrl"] = base_url('assets/admin/resizeImage');
	 		 $vehicleType["data"]     = array();

			 $vehicleTypeList = $this->JoinModel->getAvailableVehicleType();

			 if(!empty($vehicleTypeList)):
						$vehicleType["Message"]  = "Vehicle Type list";
						$vehicleType["data"]     = $vehicleTypeList;
			 else:
					 $vehicleType["Message"] = "No data found !";
					 $vehicleType["data"] = '';
			 endif;
			 	echo json_encode($vehicleType);
		 }



		 public function vehicleHourList()
		{
			$vehicleHour["Message"] = "";
			$vehicleHour["data"]    = array();
			$vehicleHourList        = $this->CommonModel->select('manage_vehicle_hour', ['status' => '1'], ['hour', 'ASC']);

			if(!empty($vehicleHourList)):
					 $vehicleHour["Message"]  = "Vehicle Hour list";
					 $vehicleHour["data"]     = $vehicleHourList;
				 else:
						$vehicleHour["Message"] = "No data found !";
						$vehicleHour["data"]    = '';
			endif;
			 echo json_encode($vehicleHour);
		}



	// ---------------------------** Get vehicle based on airport  ---------------------//
	public function getVehicleBasedOnAirport()
	{
		$Vehicle["Status"]  = false;
		$Vehicle["Message"] = "";
		$Vehicle["data"]    = array();
		$errors = array();

		if (mb_strlen(trim($_POST['airportId'])) <= 0)
		{
		   $errors = 'You did not select any airport';
		}

		if (!empty($errors))
         {
               $Vehicle["Message"] = $errors;
        	   echo json_encode($Vehicle);
		 }
		 else
		 {
		    $airportId   = $_POST['airportId'];
			$airportList = $this->JoinModel->vehicleListBasedOnAirport($airportId);
			if(!empty($airportList))
			 {
				if($airportList[0]['normalPrice'] != '')
				{
					$Vehicle["Status"]  = true;
					$Vehicle["Message"] = "Airport Listing";
					$Vehicle["data"]    = $airportList;

				}
				else
				{
					// if price not set for this vehicle type
					$Vehicle["Status"]  = false;
					$Vehicle["Message"] = "This Vehicle is not availabe for now !";
				}
			}
			else
				{
					$Vehicle["Status"]  = false;
					$Vehicle["Message"] = "No result found!";
				}

			 echo json_encode($Vehicle);
		 }
	}
	// ---------------------------** End Get vehicle based on airport  ------------------**//



	// ---------------------------** Save Ride detais ------------------------------***//
	public function saveRideDetails()
	{
		$Ride["Status"]  = false;
		$Ride["Message"] = "";
		$Ride["data"]    = array();
		$errors          = array();


		if ($this->input->post('serviceType') == 1)
		{
			// airport

				if($this->input->post('bookFor') == 1)
				{
					// book for own
					if ($this->input->post('pickupDropOff') == '')
							{
								 $errors = 'Please Enter Pickup or Drop Off';
							}
						if ($this->input->post('vehicleType') == '')
								{
									 $errors = 'Please Enter VehicleType';
					    	}
						if ($this->input->post('noOfPerson') == '')
								{
									 $errors = 'Please Enter No. Of Person';
								}
						if ($this->input->post('noOfLuggage') == '')
								{
									 $errors = 'Please Enter No. Of Luggage';
								}


						if ($this->input->post('price') == '')
								{
									 $errors = 'Please Enter Price ';
								}


				}
				else
				{
					// book for other
					if ($this->input->post('pickupDropOff') == '')
							{
								 $errors = 'Please Enter Pickup or Drop Off';
							}
					if ($this->input->post('vehicleType') == '')
							{
								 $errors = 'Please Enter VehicleType';
							}

					if ($this->input->post('noOfPerson') == '')
							{
								 $errors = 'Please Enter No. Of Person';
							}

					if ($this->input->post('noOfLuggage') == '')
							{
								 $errors = 'Please Enter No. Of Luggage';
							}

					if ($this->input->post('noOfChild') == '')
							{
								 $errors = 'Please Enter No. Of Child';
							}

					if ($this->input->post('price') == '')
							{
								 $errors = 'Please Enter Price ';
							}

					if ($this->input->post('nameSign') == '')
							 {
									$errors = 'Please Enter Name Sign';
							 }

					 if ($this->input->post('chauffew') == '')
							 {
									$errors = 'Please Enter Chauffew';
					     }

					 if ($this->input->post('firstName') == '')
							 {
									$errors = 'Please Enter First Name';
					     }

					 if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL))
							 {
									$errors = 'Invalid Email Id';
							 }
					 if ($this->input->post('country') == '')
							 {
									$errors = 'Please Select Country';
					     }
					 // if (mb_strlen(trim($this->input->post('mobile'))) != 10)
						// 	 {
						// 			$errors = 'Please Enter Valid Mobile No.';
					 // 		 }
					 if ($this->input->post('flightNo') == '')
							 {
									$errors = 'Please Enter Flight No.';
					 		 }
					 if ($this->input->post('refferenceNo') == '')
							 {
									$errors = 'Please Enter Refference No.';
					 		 }



				}


		}

		elseif ($this->input->post('serviceType') == 2)
		{
			// one way
			if($this->input->post('bookFor') == 1)
			{
				// book for own
				if ($this->input->post('pickupDropOff') == '')
						{
							 $errors = 'Please Enter Pickup or Drop Off';
						}
					if ($this->input->post('vehicleType') == '')
							{
								 $errors = 'Please Enter VehicleType';
							}
					if ($this->input->post('noOfPerson') == '')
							{
								 $errors = 'Please Enter No. Of Person';
							}
					if ($this->input->post('noOfLuggage') == '')
							{
								 $errors = 'Please Enter No. Of Luggage';
							}


					if ($this->input->post('price') == '')
							{
								 $errors = 'Please Enter Price ';
							}


			}
			else
			{
				// book for other
				if ($this->input->post('pickupDropOff') == '')
						{
							 $errors = 'Please Enter Pickup or Drop Off';
						}
				if ($this->input->post('vehicleType') == '')
						{
							 $errors = 'Please Enter VehicleType';
						}

				if ($this->input->post('noOfPerson') == '')
						{
							 $errors = 'Please Enter No. Of Person';
						}

				if ($this->input->post('noOfLuggage') == '')
						{
							 $errors = 'Please Enter No. Of Luggage';
						}

				if ($this->input->post('noOfChild') == '')
						{
							 $errors = 'Please Enter No. Of Child';
						}

				if ($this->input->post('price') == '')
						{
							 $errors = 'Please Enter Price ';
						}

				if ($this->input->post('nameSign') == '')
						 {
								$errors = 'Please Enter Name Sign';
						 }

				 if ($this->input->post('chauffew') == '')
						 {
								$errors = 'Please Enter Chauffew';
						 }

				 if ($this->input->post('firstName') == '')
						 {
								$errors = 'Please Enter First Name';
						 }

				 if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL))
						 {
								$errors = 'Invalid Email Id';
						 }
				 if ($this->input->post('country') == '')
						 {
								$errors = 'Please Select Country';
						 }
				 if (mb_strlen(trim($this->input->post('mobile'))) != 10)
						 {
								$errors = 'Please Enter Valid Mobile No.';
						 }
				 if ($this->input->post('flightNo') == '')
						 {
								$errors = 'Please Enter Flight No.';
						 }
				 if ($this->input->post('refferenceNo') == '')
						 {
								$errors = 'Please Enter Refference No.';
						 }

			}

		}

		elseif ($this->input->post('serviceType') == 3)
		{
			// hourly
			if($this->input->post('bookFor') == 1)
			{
				// book for own
				if ($this->input->post('timeSlot') == '')
						{
							 $errors = 'Please Enter Pickup or Drop Off';
						}
					if ($this->input->post('vehicleType') == '')
							{
								 $errors = 'Please Enter VehicleType';
							}
					if ($this->input->post('noOfPerson') == '')
							{
								 $errors = 'Please Enter No. Of Person';
							}
					if ($this->input->post('noOfLuggage') == '')
							{
								 $errors = 'Please Enter No. Of Luggage';
							}


					if ($this->input->post('price') == '')
							{
								 $errors = 'Please Enter Price ';
							}


			}
			else
			{
				// book for other
				if ($this->input->post('timeSlot') == '')
						{
							 $errors = 'Please Enter Pickup or Drop Off';
						}
				if ($this->input->post('vehicleType') == '')
						{
							 $errors = 'Please Enter VehicleType';
						}

				if ($this->input->post('noOfPerson') == '')
						{
							 $errors = 'Please Enter No. Of Person';
						}

				if ($this->input->post('noOfLuggage') == '')
						{
							 $errors = 'Please Enter No. Of Luggage';
						}

				if ($this->input->post('noOfChild') == '')
						{
							 $errors = 'Please Enter No. Of Child';
						}

				if ($this->input->post('price') == '')
						{
							 $errors = 'Please Enter Price ';
						}

				if ($this->input->post('nameSign') == '')
						 {
								$errors = 'Please Enter Name Sign';
						 }

				 if ($this->input->post('chauffew') == '')
						 {
								$errors = 'Please Enter Chauffew';
						 }

				 if ($this->input->post('firstName') == '')
						 {
								$errors = 'Please Enter First Name';
						 }

				 if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL))
						 {
								$errors = 'Invalid Email Id';
						 }
				 if ($this->input->post('country') == '')
						 {
								$errors = 'Please Select Country';
						 }
				 // if (mb_strlen(trim($this->input->post('mobile'))) != 10)
					// 	 {
					// 			$errors = 'Please Enter Valid Mobile No.';
					// 	 }
				 if ($this->input->post('flightNo') == '')
						 {
								$errors = 'Please Enter Flight No.';
						 }
				 if ($this->input->post('refferenceNo') == '')
						 {
								$errors = 'Please Enter Refference No.';
						 }

			}


		}

		else
		 {
			 $Ride["Status"]  = false;
			 $Ride["Message"] = "Please Choose any Service !";
		 }




		 if (!empty($errors))
         {
           $Ride["Message"] = $errors;
  	       echo json_encode($Ride);
		    }
		 else
		 {
			 	if($this->input->post('bookFor') == 1)
				{
						// book for own

						   if($this->input->post('serviceType') == 3)
							 {
								 $timeSlot      = $this->input->post('timeSlot');
								 $pickupDropOff = '';
							 }
							 else
							 {
								 $timeSlot      = '';
								 $pickupDropOff = $this->input->post('pickupDropOff');
							 }
								 // if hourly service
 								 $insertData = array(
 																		'serviceType'   	=> $this->input->post('serviceType'),
 																		'bookFor'       	=> '1',
 																		'timeSlot'      	=> $timeSlot,
 																		'vehicleType'   	=> $this->input->post('vehicleType'),
 																		'noOfPerson'    	=> $this->input->post('noOfPerson'),
 																		'noOfLuggage'   	=> $this->input->post('noOfLuggage'),
 																		'price'         	=> $this->input->post('price'),
 																		'pickupDropOff' 	=> $pickupDropOff,
																		'pickupDateTime'	=> $this->input->post('pickupDateTime')
 																	 );

				}
				else
				{
					// book for other
						if($this->input->post('serviceType') == 3)
						{
							$timeSlot      = $this->input->post('timeSlot');
							$pickupDropOff = '';
						}
						else
						{
							$timeSlot      = '';
							$pickupDropOff = $this->input->post('pickupDropOff');
						}

					$insertData = array(
														'serviceType'   	=> $this->input->post('serviceType'),
														'bookFor'       	=> '2',
														'timeSlot'      	=> $timeSlot,
														'vehicleType'   	=> $this->input->post('vehicleType'),
														'noOfPerson'    	=> $this->input->post('noOfPerson'),
														'noOfchild'     	=> $this->input->post('noOfchild'),
														'noOfLuggage'   	=> $this->input->post('noOfLuggage'),
														'price'         	=> $this->input->post('price'),
														'pickupDropOff' 	=> $pickupDropOff,
														'pickupDateTime'	=> $this->input->post('pickupDateTime'),
														'nameSign'        => $this->input->post('nameSign'),
														'chauffew'        => $this->input->post('chauffew'),
														'firstName'       => $this->input->post('firstName'),
														'lastName'        => $this->input->post('lastName'),
														'email'           => $this->input->post('email'),
														'country'         => $this->input->post('country'),
														'mobile'          => $this->input->post('mobile'),
														'promotionalCode' => $this->input->post('promotionalCode'),
														'flightNo'        => $this->input->post('flightNo'),
														'refferenceNo'    => $this->input->post('refferenceNo')
	 							  );

				}

			 // all mandetory fields are not empty

			if($this->CommonModel->insert('saveRideDetails', $insertData))
			{
				$Ride["Status"]  = true;
				$Ride["Message"] = "Ride Confirmed";
			}
			else
			{
				$Ride["Status"]  = false;
				$Ride["Message"] = "Something went wrong ride not confirmed";
			}
		   echo json_encode($Ride);
		 }


	}
	// ---------------------------** End Save Ride detais ------------------------------//



	// all country list created by admin

    public function getAllCountryList()
		{
			$country["Status"]	 = false;
      $country["Message"]  = "";
      $country["data"]     = array();
      $countryList = $this->CommonModel->select('country',array('status' => '1'), array());
      if($countryList) // get bank account type listing
      {
				$country["Status"]  = true;
        $country["Message"] = "Country List";
        $country["data"]    = $countryList;
      }
      else
      {
        $country["Message"] = "Empty Country list";
      }
      echo json_encode($country);
		}



		// all state list created by admin

	    public function getAllStateList()
			{
				$state["Status"]	 = false;
	      $state["Message"]  = "";
	      $state["data"]     = array();
	      $stateList = $this->CommonModel->select('state',array('status' => '1'), array());
	      if($stateList) // get bank account type listing
	      {
					$state["Status"]  = true;
	        $state["Message"] = "State List";
	        $state["data"]    = $stateList;
	      }
	      else
	      {
	        $state["Message"] = "Empty State list";
	      }
	      echo json_encode($state);
			}





}
