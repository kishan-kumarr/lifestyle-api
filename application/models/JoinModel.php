<?php
    defined('BASEPATH') or die('not allow to access script');
    /**
    *
    */
    class JoinModel extends CI_Model
    {
       function getCountryState()
       {
           $this->db->select('state.*,country.countryName as countryName')
             ->from('state')
             ->order_by('id','DESC')
             ->join('country','state.countryId = country.id','Left');

             return  $this->db->get()->result_array();
       }


       function getCountryStateCity()
       {
           $this->db->select('city.*,country.countryName as countryName, state.stateName as stateName')
             ->from('city')
             ->order_by('id','DESC')
             ->join('country','city.countryId = country.id','Left')
             ->join('state','city.stateId = state.id','Left');

             return  $this->db->get()->result_array();
       }


       public function getAirport()
       {
         $this->db->select('airport.*,country.countryName as countryName, state.stateName as stateName,city.cityName as cityName')
             ->from('airport')
             ->order_by('id','DESC')
             ->join('country','airport.countryId = country.id','Left')
             ->join('state','airport.stateId = state.id','Left')
             ->join('city','airport.cityId = city.id','Left');

             return  $this->db->get()->result_array();
       }

       public function getSelectedMenuList()
       {
         $this->db->select('menu.id,menu.MenuName,set_permission.menuId,set_permission.roleId')
             ->from('menu')
             ->order_by('position','ASC')
             ->join('set_permission','menu.id = set_permission.menuId','Left')
             ->where('menu.parent_id', '0');

             return  $this->db->get()->result_array();
       }


       public function vehicleListBasedOnAirport($airportId = null)
       {
         $this->db->select('airport.id, airport.airportName, dvd.driverId, dvd.vehicleType, dvd.vehicleModel, dvd.childSeatAvailable, dvd.maximumPerson, dvd.maximumLuggage, driver.status, vt.vehicleType, vt.status, vm.vehicleModel, vm.status, price.normalPrice, price.midNightCharge, price.childCharge, price.additionalStop, price.additionalWaitingTime, price.additionalKelometer, price.userCancellationCharge, price.driverCancellationCharge')
                  ->from('airport')
                  ->join('driverVehicleDetail as dvd' , 'airport.id = dvd.airport', 'Left')
                  ->join('driver', 'dvd.driverId = driver.id', 'Left')
                  ->join('vehicle_type as vt', 'dvd.vehicleType = vt.id', 'Left')
                  ->join('vehicle_model as vm', 'dvd.vehicleModel = vm.id', 'Left')
                  ->join('price', 'vt.id = price.vehicleType', 'Left')
                  ->where('airport.id', $airportId)
                  ->where('driver.status', '1')
                  ->where('vt.status', '1')
                  ->where('vm.status', '1');

                  return $this->db->get()->result_array();
       }


       public function getAvailableVehicleType()
       {
         $this->db->select('vType.id, vType.vehicleType, vType.childSeatAvailable, vType.maximumPerson, vType.maximumLuggage, vType.vehicleImage, vehiclePrice.normalPrice, vehiclePrice.midNightCharge, vehiclePrice.childCharge, vehiclePrice.additionalStop, vehiclePrice.additionalWaitingTime, vehiclePrice.additionalKelometer, vehiclePrice.userCancellationCharge, vehiclePrice.driverCancellationCharge')
                  ->from('vehicle_type as vType')
                  ->join('price as vehiclePrice', 'vType.id = vehiclePrice.vehicleType');

                  return $this->db->get()->result_array();
       }
    }
?>
