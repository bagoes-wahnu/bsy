<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class E_Model extends CI_Model {
    public $table_name = '';
    public $primary_key = '';
    public $primaryFilter = 'intval';
    public $order_by = '';
    
    function __construct() {
        parent::__construct();
    }
    public function get ($ids = FALSE,$limit = FALSE,$column = FALSE, $order = FALSE){
        $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;
        if ($ids !== FALSE) {
            is_array($ids) || $ids = array($ids); 
            $filter = $this->primaryFilter;
            $ids = array_map($filter, $ids); 
            
            $this->db->where_in($this->primary_key, $ids);
        }
        if($order == FALSE)
			$this->db->order_by($this->order_by);
		else
			$this->db->order_by($order);
        $this->db->select($column == FALSE ? "*" : $column);
         if($limit == TRUE){
			$this->db->limit($limit);
		} else {
			$single == FALSE || $this->db->limit(1);
		}
		$limit	== TRUE ? $single = TRUE : "";
        $method = $single ? 'row_array' : 'result_array';
        return $this->db->get($this->table_name)->$method();
    }
    public function get_by ($key, $val = FALSE, $orwhere = FALSE, $single = FALSE, $column=FALSE, $order = FALSE, $limit = FALSE) {
        if ($val == TRUE) {
            $this->db->where(htmlentities($key), htmlentities($val));
        }
        else {
			if(!is_array($key)){
				$this->db->where($key);
			} else {
				$key = array_map('htmlentities', $key);
				$where_method = $orwhere == TRUE ? 'or_where' : 'where';
				$this->db->$where_method($key);
			}           
        }
		if($order == FALSE)
			$this->db->order_by($this->order_by);
		else
			$this->db->order_by($order);
		$this->db->select($column == FALSE ? "*" : $column)->from($this->table_name);
        if($limit == TRUE){
			$this->db->limit($limit);
		} else {
			$single == FALSE || $this->db->limit(1);
		}
        $method = $single ? 'row_array' : 'result_array';
		return $this->db->get()->$method();
    }
    public function save($data, $id = FALSE) {
        if ($id == FALSE) {
            $this->db->set($data)->insert($this->table_name);
        }
        else {
            if(!is_array($id)){
				$filter = $this->primaryFilter;
				$this->db->set($data)->where($this->primary_key, $filter($id))->update($this->table_name);
			} else {
				$this->db->set($data)->where($id)->update($this->table_name);
                $this->db->select($this->primary_key)->from($this->table_name)->where($id);
                $q = $this->db->get();
                $q = $q->row_array();
                $id = $q[$this->primary_key];
			}
        }
        return $id == FALSE ? $this->db->insert_id() : $id;
    }

    public function update_all($data) {
		$data = $this->db->set($data)->update($this->table_name);
        return $data;
    }
    public function delete($ids){
        
        $filter = $this->primaryFilter; 
        $ids = ! is_array($ids) ? array($ids) : $ids;
        
        foreach ($ids as $id) {
            $id = $filter($id);
            if ($id) {
                $this->db->where($this->primary_key, $id)->delete($this->table_name);
            }
        }
    }

	public function delete_by($key, $value=false){
        if (empty($key)) {
            return FALSE;
        } else {
            if($value == true && is_array($key)){
                return FALSE;
            }else if (!is_array($key) && $value == false){
                return FALSE;
            } else {
                if(is_array($key))
                    $this->db->where($key)->delete($this->table_name);
                else
                     $this->db->where($key, $value)->delete($this->table_name);
            }
        }
    }
}