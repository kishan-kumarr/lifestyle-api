<?php
    defined('BASEPATH') or die('not allow to access script');
    /**
    * 
    */
    class AdminLoginModel extends CI_Model
    {    	
       function login($email = '',$passw = '', $loginAs= '')
       {
       	$pass=md5($passw);
          if($loginAs == '1')
          {
             // admin
            $sel=$this->db->get_where("admin",['email'=>$email,'password'=>$pass,'role' => '1']);
          }
          else 
          {
             // ceo
           $sel=$this->db->get_where("admin",['email'=>$email,'password'=>$pass, 'status' => '1', 'role' => '2']);
          }
       	
       	 if ($sel->num_rows()>0) 
       	 {
            $result=$sel->result_array();			 
			     $this->session->set_userdata($result[0]);
       	 	return $result;
       	 }
       	 else
			 return NULL;
       }


      function subLogin($email= '', $passw= '')
       {
        $pass=md5($passw);
         $sel=$this->db->get_where("branch_manager",['email'=>$email,'password'=>$pass, 'status' => '1']);
         if ($sel->num_rows()>0) 
         {
            $result=$sel->result_array();      
           $this->session->set_userdata($result[0]);
          return $result;
         }
         else
       return NULL;
       }
    }
?>