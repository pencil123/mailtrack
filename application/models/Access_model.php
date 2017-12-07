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
        $where_array = array('imgpath'=>$img_url,'status'=>1);
        $result = $this->db->get_where('record',$where_array);
        if(!$result->num_rows()) return False;
        $record_id = $result->row()->id;
        $long_ip = ip2long($ip_str);
        $result = $this->sina_ip_lib($ip_str);
        if($result)
            $addr = $result;
        else
            $addr = 'unknown';
        $data_array = array(
            'record_id'=>$record_id,
            'access_time'=>$time,
            'ip'=>$long_ip,
            'addr'=>$addr);
        $this->db->insert('access',$data_array);
        return True;
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
            $single = array('ip'=>$ip_str,'time'=>$row->access_time,'addr'=>$row->addr);

            if(array_key_exists($record_id, $access_array)){
                array_push($access_array[$record_id], $single);
            }else{
                $access_array[$record_id] = array($single);
            }
        }
        return $access_array;
    }

    public function update_status()
    {
        $where_array= array('status'=>1);
        $update_array = array('status'=>2);
        $this->db->where($where_array);
        $this->db->update('access',$update_array);
        return True;
    }

    public function record_info($record_id)
    {
        $where_array = array('id'=>$record_id);
        $result = $this->db->get_where('record',$where_array);
        $mail = $result->row()->receive_mail;
        $title = $result->row()->title;
        return array($mail,$title);
    }

    private function sina_ip_lib($ip_str)
    {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=".$ip_str);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $location = curl_exec($curl);
        $location = json_decode($location,true);
        if($location===FALSE) return FALSE;
        if($location['ret'] == -1) return False;
        $addr = $location['country'].$location['province'].$location['city'];
        return $addr;
    }
}