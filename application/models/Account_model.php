<?php
class Account_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function register($mail,$passwd)
    {
        $query = $this->db->insert('user', array('mail' => $mail,'passwd' => $passwd));
        return True;
    }

    public function mail_exist($mail)
    {
        $query = $this->db->get_where('user', array('mail' => $mail));
        $count = $query->num_rows();
        if ($count === 0 ){
            return FALSE;
        }else {
            return True;
        }
    }

    public function login($mail,$passwd)
    {
        $query = $this->db->get_where('user', array('mail' => $mail,'passwd' => $passwd));
        $count = $query->num_rows();
        if ($count === 0 ){
            return FALSE;
        }else {
            return True;
        }
    }

    public function logout($mail,$passwd)
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