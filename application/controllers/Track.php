<?php
class Track extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('track_model');
        $this->load->helper('file');
        $this->load->helper('date');
        $this->load->helper('security');
    }

    public function selectimage()
    {
        $this->load->view('track/selectimage');
    }

    public function getsocialimages()
    {
        $data = read_file('application/views/track/getsocialimage.php');
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
        //$this->load->view('track/getsocialimages');
    }

    public function getemoticonimages()
    {
        $data = read_file('application/views/track/getemoticonimages.php');
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
        //$this->load->view('track/getsocialimages');
    }

    public function getcommonimages()
    {
        $data = read_file('application/views/track/getcommonimages.php');
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
        //$this->load->view('track/getsocialimages');
    }

    public function getuserdefinedimages()
    {
        $data = '{"status":0,"info":"login_required","data":0}';
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
        //$this->load->view('track/getsocialimages');
    }

    public function remind()
    {
        $data = '{"status":1,"info":"OK","data":1}';
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
        //$this->load->view('track/getsocialimages');
    }


    public function send()
    {
        $mail = $this->input->post('email');
        $image = $this->input->post('image');
        $remind_days = $this->input->post('remind_days');
        $subject = $this->input->post('subject');
        $time_zone = $this->input->post('time_zone');
        $source = 'images/t/'.$image;
        $file_type = substr(strrchr($image,'.'),1);
        $time_stamp = now('Australia/Victoria');
        $hash_string = 'img/'.do_hash(strval($time_stamp)).'.'.$file_type;
        $ip = $this->input->ip_address();

        if(copy($source,$hash_string)){
            $imgs_url = "http".((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "")."://".$_SERVER['HTTP_HOST'].'/'.$hash_string;
        }
        $this->track_model->add($mail,$imgs_url,$remind_days,$subject,$ip);
        $data = '{"status":1,"info":"OK","data":"'.$imgs_url.'"}';
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo $data;
    }
}