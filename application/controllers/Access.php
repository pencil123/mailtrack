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
        $this->filename = '/data/logs/imgs.log';
    }
    public function index()
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

        $line_array = explode(';',$line,-1);
        //var_dump($line_array);
        $ip_str = $line_array[0];
        $time_str = $line_array[1];
        $request_str = $line_array[2];
        $status_str = $line_array[3];
        echo $ip_str;
        $date_format = 'Y-m-dTH:i:sT';
        
    }
}