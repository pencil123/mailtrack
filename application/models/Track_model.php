<?php
class Track_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function add($mail,$img_url,$remind_days,$subject,$ip)
    {
        $login = $this->session->mail;
        if($login){
            $where_array = array('mail'=>$login);
            $result = $this->db->get_where('user',$where_array);
            $row = $result->row();
            $user_id = $row->id;
        }else{
            $user_id = 0;
        }
        $long_ip = ip2long($ip);
        $img = parse_url($img_url);
        $imgpath = $img['path'];
        $array_data = array(
            'receive_mail' => $mail,
            'imgpath' => $imgpath,
            'title'=>$subject,
            'remind'=>$remind_days,
            'ip'=>$long_ip,
            'user_id'=>$user_id);
        $query = $this->db->insert('record',$array_data);
        return True;
    }
}