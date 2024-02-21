<?php
    defined('BASEPATH') or die('not allow to access script');
    /**
    * 
    */
    class DriverModel extends CI_Model
    {    	
       function getAllDriverDetail()
       {

           $this->db->select('driver.*,branch_manager.name as branchManagerName,admin.name as ceoName,location.locationName as locationName,branch.branchName as branchNames')
             ->from('driver')
             ->order_by('id','DESC')
             ->join('branch_manager','driver.under_branch_manager = branch_manager.id','Left')
             ->join('admin','driver.under_ceo = admin.id','Left')
             ->join('location','driver.location = location.id','Left')
             ->join('branch','driver.branch = branch.id','Left');
             
             return  $this->db->get()->result_array();
       }


      function getAllDriverDetailByManager()
      { 
            $managerRecord = getBranchRecord($this->session->userdata('BranchManagerEmail')); // getting manager record
            $underManager = $managerRecord[0]['id'];
            $this->db->select('driver.*,branch_manager.name as branchManagerName,admin.name as ceoName,location.locationName as locationName,branch.branchName as branchNames')
               ->from('driver')
               ->order_by('id','DESC')
               ->join('branch_manager','driver.under_branch_manager = branch_manager.id','Left')
               ->join('admin','driver.under_ceo = admin.id','Left')
               ->join('location','driver.location = location.id','Left')
               ->join('branch','driver.branch = branch.id','Left')
               ->where('driver.under_branch_manager', $underManager);

          return  $this->db->get()->result_array();
      }


       function getDriverDetailbyId($id = '')
       {
           $this->db->select(
                    "dr.*,
                    bm.name as branchManagerName,
                    a.name as ceoName,
                    l.locationName as locationName,
                    b.branchName as branchNames,
                  
                    dbt.id as dbtid, dbt.routingNo as routingNo, dbt.accountNo as accountNo, dbt.accountHolderName as accountHolderName, dbt.accountType as accountType,
                    dvd.id as dvdid, dvd.vehiclePlateNo as vehiclePlateNo, dvd.registrationYear as registrationYear, dvd.childSeatAvailable as childSeatAvailable, dvd.maximumPerson as maximumPerson, dvd.maximumLuggage as maximumLuggage, dvd.vehicleImage as vehicleImage,
                    dvl.id as dvlid, dvl.licenseFrontImage as licenseFrontImage, dvl.licenseBackImage as licenseBackImage, dvl.insuranceFileImage as insuranceFileImage,
                   
                    at.accountType,
                    vt.vehicleType,
                    vm.vehicleModel,
                    vc.vehicleColour,
                    c.cityName"
              )
             ->from('driver as dr')
             ->join('branch_manager as bm','dr.under_branch_manager = bm.id','Left')
             ->join('admin as a','dr.under_ceo = a.id','Left')
             ->join('location as l','dr.location = l.id','Left')
             ->join('branch as b','dr.branch = b.id','Left')
             ->join('driverBankDetail as dbt','dr.id = dbt.driverId','Left')
             ->join('driverVehicleDetail as dvd','dr.id = dvd.driverId','Left')
             ->join('driverVehicleLicense as dvl','dr.id = dvl.driverId','Left')
             ->join('city as c','dr.city = c.id','Left')
             ->join('accountType as at','dbt.accountType = at.id','Left')
             ->join('vehicle_type as vt','dvd.vehicleType = vt.id','Left')
             ->join('vehicle_model as vm','dvd.vehicleModel = vm.id','Left')
             ->join('vehicle_colour as vc' ,'dvd.vehicleColour = vc.id','Left')
             ->where('dr.id', $id);
             
             return  $this->db->get()->result_array();
       }


       function getAllPriceList()
       {
         $this->db->select('price.*,vehicle_type.vehicleType as vehicleTypeName')
             ->from('price')
             ->order_by('id','DESC')
             ->join('vehicle_type','price.vehicleType = vehicle_type.id','Left');
             
             return  $this->db->get()->result_array();
       }

       function getPriceById($id = '')
       {
          $this->db->select('price.*,vehicle_type.vehicleType as vehicleTypeName')
             ->from('price')
             ->order_by('id','DESC')
             ->join('vehicle_type','price.vehicleType = vehicle_type.id','Left')
             ->where('price.id', $id);
             
              return $this->db->get()->result_array();
             //echo  $this->db->last_query();exit;

       }
    }
?>