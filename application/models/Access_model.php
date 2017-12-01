<?php
class Access_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function offset($offset=0)
    {
        $where_array = array('key_str'=>'offset');
        if(!$offset){
            $result = $this->db->get_where('setting',$where_array);
            $row = $result->row();
            return intval($row->value_str);
        }else{
            $update_array = array('value_str'=>strval($offset));
            $this->db->set($update_array);
            $this->db->where($where_array);
            $this->db->update('setting');
            return True;
        }
    }
}