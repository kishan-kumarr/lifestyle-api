	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


	$route['default_controller']                     = 'welcome';
	$route['404_override']                           = 'Error_404';
	$route['translate_uri_dashes']                   = FALSE;

	//------------------------------------- -/ Admin Routing //---------------------------------- -///


	//---------------------------------------- -/ admin profile //--------------------------------- -///
	$route['admin']                                  = 'admin/Login';
	$route['dashboard']                              = 'admin/Dashboard';
	$route['update-profile']                         = 'admin/Dashboard/update_profile';
	$route['admin-logout']                           = 'admin/Login/logout';


	//------------------------------------ -/ admin Manage city //------------------------------------ -///
	$route['city-list']                              = 'admin/Manage_city';
	$route['add-city']                               = 'admin/Manage_city/add_city';
	$route['update-city/(:num)']                     = 'admin/Manage_city/updateCity/$1';


	//----------------------------------- -/ admin Manage state //------------------------------------ -///
	$route['state-list']                             = 'admin/Manage_state';
	$route['add-state']                              = 'admin/Manage_state/add_state';
	$route['update-state/(:num)']                    = 'admin/Manage_state/updateState/$1';


	//--------------------------------- -/ admin Manage state //----------------------------------------- -///
	$route['country-list']                           = 'admin/Manage_country';
	$route['add-country']                            = 'admin/Manage_country/add_country';
	$route['update-country/(:num)']                  = 'admin/Manage_country/updateCountry/$1';


	//--------------------------------- -/ admin predefine message //----------------------------------------- -///
	$route['manage-predefine-message']               = 'admin/Manage_predefine_message';
	$route['add-predefine-message']                  = 'admin/Manage_predefine_message/add_message';
	$route['update-predefine-message/(:num)']        = 'admin/Manage_predefine_message/updateMessage/$1';


	//------------------------------- -/ admin Manage Airport //----------------------------------------- -///
	$route['airport-list']                           = 'admin/Manage_airport';
	$route['add-airport']                            = 'admin/Manage_airport/add_airport';
	$route['update-airport/(:num)']                  = 'admin/Manage_airport/updateAirport/$1';


	//------------------------------ -/ admin Manage branch //-------------------------------------- -///
	$route['branch-list']                            = 'admin/Manage_branch';
	$route['add-branch']                             = 'admin/Manage_branch/add_branch';
	$route['update-branch/(:num)']                   = 'admin/Manage_branch/updateBranch/$1';

	//----------------------------- -/ admin Manage location //------------------------------------- -///
	$route['location-list']                          = 'admin/Manage_location';
	$route['add-location']                           = 'admin/Manage_location/add_location';
	$route['update-location/(:num)']                 = 'admin/Manage_location/updateLocation/$1';

	//------------------------------- -/ admin Manage vehicle //--------------------------------------------
	$route['vehicle-type']                           = 'admin/Manage_vehicleType';
	$route['add-vehicle-type']                       = 'admin/Manage_vehicleType/add_vehicleType';
	$route['update-vehicle-type/(:num)']             = 'admin/Manage_vehicleType/updateVehicleType/$1';

	$route['vehicle-model']                          = 'admin/Manage_vehicleModel';
	$route['add-vehicle-model']                      = 'admin/Manage_vehicleModel/add_vehicleModel';
	$route['update-vehicle-model/(:num)']            = 'admin/Manage_vehicleModel/updateVehicleModel/$1';

	$route['vehicle-colour']                         = 'admin/Manage_vehicleColour';
	$route['add-vehicle-colour']                     = 'admin/Manage_vehicleColour/add_vehicleColour';
	$route['update-vehicle-colour/(:num)']           = 'admin/Manage_vehicleColour/updateVehicleColour/$1';

	$route['vehicle-list']                           = 'admin/Manage_vehicle';
	$route['add-vehicle']                            = 'admin/Manage_vehicle/add_vehicle';
	$route['update-vehicle/(:num)']                  = 'admin/Manage_vehicle/updateVehicle/$1';



	//---------------------------------- -/ admin Manage Users //------------------------------------------
	$route['user-list']                              = 'admin/Manage_user';
	$route['add-user']                               = 'admin/Manage_user/add_user';
	$route['update-user/(:num)']                     = 'admin/Manage_user/updateUser/$1';



	//--------------------------------- -/ admin Manage Users //---------------------------------------------
	$route['driver-list']                            = 'admin/Manage_driver';
	$route['add-driver']                             = 'admin/Manage_driver/add_driver';
	$route['update-driver/(:num)']                   = 'admin/Manage_driver/updateDriver/$1';

	//--------------------------------- -/ admin Manage price //---------------------------------------------
	$route['price-list']                             = 'admin/Manage_price';
	$route['add-price']                              = 'admin/Manage_price/add_price';
	$route['update-price/(:num)']                    = 'admin/Manage_price/updatePrice/$1';
	$route['view-price/(:num)']                      = 'admin/Manage_price/viewPrice/$1';


	//------------------------------------ -/ admin Manage Users //-----------------------------------------
	$route['coupon-list']                            = 'admin/Manage_coupon';
	$route['add-coupon']                             = 'admin/Manage_coupon/add_coupon';
	$route['update-coupon/(:num)']                   = 'admin/Manage_coupon/updateCoupon/$1';

	//-------------------------------------- -/ admin Manage Employee //------------------------------------
	$route['ceo-list']                               = 'admin/Manage_ceo';
	$route['add-ceo']                                = 'admin/Manage_ceo/add_ceo';
	$route['update-ceo/(:num)']                      = 'admin/Manage_ceo/updateCeo/$1';
	$route['view-ceo/(:num)']                        = 'admin/Manage_ceo/viewCeo/$1';

	$route['set-ceo-permission']                     = 'admin/Manage_ceo/setPermission';


	$route['branch-manager-list']                    = 'admin/Manage_branch_manager';
	$route['add-branch-manager']                     = 'admin/Manage_branch_manager/add_branch_manager';
	$route['update-branch-manager/(:num)']           = 'admin/Manage_branch_manager/updateBranchManager/$1';
	$route['view-branch-manager/(:num)']             = 'admin/Manage_branch_manager/viewBranchManager/$1';

	$route['driver-list']                            = 'admin/Manage_driver';
	$route['add-driver']                             = 'admin/Manage_driver/add_driver';
	$route['update-driver/(:num)']                   = 'admin/Manage_driver/updateDriver/$1';
	$route['view-driver/(:num)']                     = 'admin/Manage_driver/viewDriver/$1';


	//-------------------------------------------- -/ Manage user tutorial //--------------------------------------------- -
	$route['manage-user-tutorial']                   = 'admin/ManageTutorial';
	$route['update-tutorial/(:num)']                 = 'admin/ManageTutorial/updateTutorial/$1';


	// ------------------------ Manage vehicle Hour -------------------------------------------//
	$route['vehicle-hour-list']                      = 'admin/ManageHourForVehicle';
	$route['add-vehicle-hour']                       = 'admin/ManageHourForVehicle/addTime';
	$route['update-vehicle-hour/(:num)']             = 'admin/ManageHourForVehicle/updateTime/$1';




	// ---------------------------  User Routing ----------------------------------------------//
	$route['user-confirmation/(:any)']               = 'Api/Users/userConfirmation/$1';
	$route['password-recover/(:any)']                = 'Api/Users/passwordRecover/$1';


	$route['driver-confirmation/(:any)']             = 'Api/Drivers/driverConfirmation/$1';
	$route['driver-password-recover/(:any)']         = 'Api/Drivers/passwordRecover/$1';
	// --------------------------- End Usser Routing ----------------------------------------------//



	//------------------------------------------------- -/ sub-admin profile //---------------------------------------- -///
	$route['sub-admin']                              = 'sub-admin/Login';
	$route['sub-admin-dashboard']                    = 'sub-admin/Dashboard';
	$route['sub-admin-update-profile']               = 'sub-admin/Dashboard/update_profile';
	$route['sub-admin-logout']                       = 'sub-admin/Login/logout';


	$route['sub-admin-branch-manager-list']          = 'sub-admin/Manage_branch_manager';
	$route['add-sub-admin-branch-manager']           = 'sub-admin/Manage_branch_manager/add_branch_manager';
	$route['update-sub-admin-branch-manager/(:num)'] = 'sub-admin/Manage_branch_manager/updateBranchManager/$1';
	$route['view-sub-admin-branch-manager/(:num)']   = 'sub-admin/Manage_branch_manager/viewBranchManager/$1';


	$route['sub-admin-driver-list']                  = 'sub-admin/Manage_driver';
	$route['sub-admin-add-driver']                   = 'sub-admin/Manage_driver/add_driver';
	$route['sub-admin-update-driver/(:num)']         = 'sub-admin/Manage_driver/updateDriver/$1';
	$route['sub-admin-view-driver/(:num)']           = 'sub-admin/Manage_driver/viewDriver/$1';

	//-------------------------------------------- -/ End sib-admin profile //--------------------------------------------- -
