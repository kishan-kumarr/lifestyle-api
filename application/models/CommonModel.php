<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CommonModel extends CI_Model
{
    public function select($table="",$cond=array(),$order=array(),$limit="") // fetching data
    {
        if(!empty($table))
        {
            if(count($cond)>0)
            {
                $this->db->where($cond);
            }
            if (!empty($order))
            {
                $this->db->order_by($order[0],$order[1]);
            }
            if (!empty($limit))
            {
                $this->db->limit($limit);
            }
            return $this->db->get($table)->result_array();
        }
    }

    public function insert($table="",$data=array()) //inserting data
    {
        if (!empty($table) && !empty($data))
        {
            $this->db->insert($table,$data);
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    public function update($table="",$data=array(),$cond=array()) // updating data
    {
      
        if (!empty($table) && !empty($data) && !empty($cond))
        {
            $this->db->where($cond);
            if($this->db->update($table,$data))
            return true;
            else
            return false;
        }
        else
        {
            return false;
        }
    }


    public function delete($table="",$cond=array()) // deleting data
    {
        if (!empty($table) && !empty($cond))
        {
            $this->db->where($cond);
            if($this->db->delete($table))
            return true;
            else
            return false;
        }
    }

    public function single($table='',$cond=array(),$select='') // fetching single data
    {
        if(!empty($table) && !empty($cond))
        {
            $this->db->where($cond);
            if(!empty($select))
            {
               $this->db->select($select);
            }
            return $this->db->get($table)->row_array();
        }
    }

    public function row_count($table='',$cond=array()) // counting number of row
    {
        if (!empty($table))
        {
            if(!empty($cond))
            {
                $this->db->where($cond);
            }
            return $this->db->get($table)->num_rows();
        }
    }
}
