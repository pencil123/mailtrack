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

    public function sync_access($img_url,$time,$ip_str)
    {
        $where_array = array('imgpath'=>$img_url);
        $result = $this->db->get_where('record',$where_array);
        $record_id = $result->row()->id;

        $long_ip = ip2long($ip_str);
        $data_array = array(
            'record_id'=>$record_id,
            'access_time'=>$time,
            'ip'=>$long_ip);

        $this->db->insert('access',$data_array);
    }

    public function parse_access()
    //解析访问记录；
    //返回数组结果形式；
    //array{[record_id]:[info1][info2]}
    {
        $access_array = array();
        $where_array = array('status'=>1);
        $query = $this->db->get_where('access',$where_array);
        foreach( $query->result() as $row){
            $record_id = $row->record_id;
            $ip_str = long2ip($row->ip);
            $single = array('ip'=>$ip_str,'time'=>$row->access_time);

            if(array_key_exists($record_id, $access_array)){
                array_push($access_array[$record_id], $single);
            }else{
                $access_array[$record_id] = array($single);
            }
        }
        return $access_array;
    }

    public function record_info($record_id)
    {
        $where_array = array('id'=>$record_id);
        $result = $this->db->get_where('record',$where_array);
        $mail = $result->row()->receive_mail;
        $title = $result->row()->title;
        return array($mail,$title);
    }
}