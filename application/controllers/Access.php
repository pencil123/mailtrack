<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Access_model');
        $this->load->library('email');
        $this->email->initialize();
        $this->filename = '/data/logs/imgs.log';
    }
    public function index()
    {
        //读日志并写入数据库
        $this->read_log();

        //读取数据库，发送邮件
        $this->sendmail();

    }

    private function sendmail()
    {
        $access = $this->Access_model->parse_access();
        foreach($access as $key=>$value){
            $info = $this->Access_model->record_info($key);
            $mail =$info[0];
            $title = $info[1];
            var_dump($info);
            var_dump($value);
            $this->email->from('public@publicmail.cn');
            $this->email->to('public@publicmail.cn');
            $this->email->subject('this is subject');
            $this->email->message('this is message');
            $this->email->send();
        }
    }

    private function read_log()
    {
        //确定开始读取的位置
        $offset = $this->Access_model->offset();
        $file = fopen($this->filename,'r');
        fseek($file,$offset);
        //读取内容
        while(!feof($file)){
            $line = fgets($file);
            //echo $line;
            $this->parse($line);
        }
        //将偏移量写入数据库
        $offset = ftell($file);
        $this->Access_model->offset($offset);
    }

    private function parse($line)
    {
        //记录为空，直接返回
        if(!$line){
            return False;
        }

        $line_array = explode(';',$line);

        //状态码为304缓存，直接返回
        $status_str = $line_array[3];
        if(trim($status_str) == '304'){
            return False;
        }
        
        //IP地址处理
        $ip_str = $line_array[0];

        //时间处理        
        $time_str = $line_array[1];
        $seconds = strtotime($time_str);
        $access_time = date('Y-m-d H:i:s',$seconds);

        //请求地址处理
        $request_str = $line_array[2];
        $request_array = explode(' ',$request_str);
        foreach($request_array as $req){
            if(substr($req,1,3) === 'img'){
                $request_url = $req;
            }
        }

        $this->Access_model->sync_access($request_url,$access_time,$ip_str);
    }
}