<?php
class Track_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function add($mail,$img_url,$remind_days,$subject,$ip)
    {
        $long_ip = ip2long($ip);
        $imgpaht = parse_url($img_url)['path'];
        $array_data = array(
            'receive_mail' => $mail,
            'imgpath' => $imgpaht,
            'title'=>$subject,
            'remind'=>$remind_days,
            'ip'=>$long_ip);
        $query = $this->db->insert('record',$array_data);
        return True;
    }
}