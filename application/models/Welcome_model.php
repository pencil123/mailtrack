<?php
class Welcome_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_news($record_id = FALSE)
    {
        if ($record_id === FALSE)
        {
            $query = $this->db->get('record');
            return $query->result_array();
        }

        $query = $this->db->get_where('record', array('id' => $record_id));
        return $query->row_array();
    }
}