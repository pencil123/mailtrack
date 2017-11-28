<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
        $this->load->model('account_model');
    }
    
    public function index()
    {
        $this->report();
    }

    public function login()
    {
        $data['title'] = 'Alien';
        $mail = $this->input->post('account');

        //post操作
        if(!is_null($mail)){
            $passwd =  $this->input->post('password');
            $result = $this->account_model->login($mail,$passwd);
            if($result){
                //登陆成功
                $this->session->set_userdata(array('mail' => $mail,'passwd' => $passwd));
                $this->load->view('templates/header',$data);
                $this->load->view('account/track');
                $this->load->view('templates/footer');
            }else{
                //登陆失败
                $this->load->view('templates/header',$data);
                $this->load->view('account/loginfalse');
                $this->load->view('templates/footer');
            }
        }else{
            //GET 登陆页面
            $csrf = array('name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash());
            $this->load->view('templates/header',$data);
            $this->load->view('account/login',$csrf);
            $this->load->view('templates/footer');
        }
    }


    public function logout()
    {
        $msg = array('title'=>'登陆');
        $user_mail = $this->session->unset_userdata(array("mail","passwd"));
        $this->login();
    }

    public function forgotpassword()
    {
        $msg = array('title'=>'忘记密码');
        $csrf = array('name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash());
        $this->load->view('templates/header',$msg);
        $this->load->view('account/forgotpassword',$csrf);
        $this->load->view('templates/footer');
    }

    public function register()
    {
       $msg = array('title'=>'注册');
        $mail = $this->input->post('account');
        if(!is_null($mail)){
            //用户已经存在
            if($this->account_model->mail_exist($mail)){
                $msg = array('title'=>'用户已存在');
                $this->load->view('templates/header',$msg);
                $this->load->view('account/user_exist');
                $this->load->view('templates/footer');
            }else{
                //注册成功
                //1、写入数据库
                //2、更新session，直接登陆
                $msg = array('title'=>'注册成功');
                $passwd =  $this->input->post('password');
                $this->account_model->register($mail,$passwd);
                $this->session->set_userdata(array('mail' => $mail,'passwd' => $passwd));
                $this->load->view('templates/header',$msg);
                $this->load->view('account/track');
                $this->load->view('templates/footer');
            }
        }else{
            //GET 注册
            $csrf = array('name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash());
            $this->load->view('templates/header',$msg);
            $this->load->view('account/register',$csrf);
            $this->load->view('templates/footer');
        }
    }


    public function track()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/track');
        $this->load->view('templates/footer');
    }

    public function message()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/message');
        $this->load->view('templates/footer');
    }

    public function report()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/report');
        $this->load->view('templates/footer');
    }

    public function photo()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/photo');
        $this->load->view('templates/footer');
    }

    public function settings()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/settings');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/profile');
        $this->load->view('templates/footer');
    }
}