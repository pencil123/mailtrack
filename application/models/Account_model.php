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

    public function record_list($mail)
    {
        $where_array = array('mail'=>$mail);
        $result = $this->db->get_where('user',$where_array);
        $row = $result->row();
        $user_id = $row->id;

        $query = $this->db->get_where('record',array('user_id'=>$user_id));
        $records_array = array();
        foreach( $query->result() as $row){
            $receive_mail = $row->receive_mail;
            $title = $row->title;
            $create_time = $row->create_time;
            $id = $row->id;
            $where_array = array('record_id'=>$id);
            $this->db->where($where_array);
            $count = $this->db->count_all_results('access');
            array_push($records_array,array('receive_mail'=>$receive_mail,
                'title'=>$title,
                'create_time'=>$create_time,
                'id'=>$id,
                'count'=>$count));
        }
        return $records_array;
    }
}