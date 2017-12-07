<?php
class Account_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function register($mail,$passwd)
    {
        $query = $this->db->insert('user', array('mail' => $mail,'passwd' => $passwd));
        $user_id = $this->db->insert_id('id');
        return $user_id;
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
    //验证成功返回user_id；
    //验证失败返回False
    {
        $result = $this->db->get_where('user', array('mail' => $mail,'passwd' => $passwd));
        $row = $result->row();
        if (!$row){
            return FALSE;
        }else {
            return $row->id;
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

    public function record_list($user_id)
    {

        $query = $this->db->get_where('record',array('user_id'=>$user_id,'status !='=>0));
        $records_array = array();
        foreach( $query->result() as $row){
            $receive_mail = $row->receive_mail;
            $title = $row->title;
            $create_time = $row->create_time;
            $id = $row->id;
            $status = $row->status;
            $where_array = array('record_id'=>$id);
            $this->db->where($where_array);
            $count = $this->db->count_all_results('access');
            array_push($records_array,array('receive_mail'=>$receive_mail,
                'title'=>$title,
                'create_time'=>$create_time,
                'id'=>$id,
                'status'=>$status,
                'count'=>$count));
        }
        return $records_array;
    }

    public function delete_records($user_id,$records_id)
    {
        foreach($records_id as $record_id){
            $where_array = array('user_id'=>$user_id,'id'=>$record_id);
            $this->db->where($where_array);
            $this->db->update('record',array('status'=>0));
        }
        return True;
    }

    public function pause_record($user_id,$record_id)
    {
        $where_array = array('user_id'=>$user_id,'id'=>$record_id);
        $this->db->where($where_array);
        $this->db->update('record',array('status'=>2));
        return True;
    }

    public function resume_record($user_id,$record_id)
    {
        $where_array = array('user_id'=>$user_id,'id'=>$record_id);
        $this->db->where($where_array);
        $this->db->update('record',array('status'=>1));
        return True;
    }
}