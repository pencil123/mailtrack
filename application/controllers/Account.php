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
        $this->load->helper('email');
        $this->load->helper('url');
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
            
            //邮件是否合法
            if (!valid_email($mail)){
            echo 'email is not valid';
            return false;}

            $passwd =  $this->input->post('password');
            $result = $this->account_model->login($mail,$passwd);
            if($result){
                //登陆成功

                $this->session->set_userdata(array('mail' => $mail,'user_id' => $result));

                $this->load->view('templates/header',$data);
                $this->load->view('account/track');
                $this->load->view('templates/footer');
            }else{
                //登陆失败
                $csrf = array('name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),'loginfalse'=>True);
                $this->load->view('templates/header',$data);
                $this->load->view('account/login',$csrf);
                $this->load->view('templates/footer');
            }
        }else{
            //GET 登陆页面
            $csrf = array('name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),'loginfalse'=>False);
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

            //邮件是否合法
            if (!valid_email($mail)){
            echo 'email is not valid';
            return false;
            }

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
                $user_id = $this->account_model->register($mail,$passwd);
                $this->session->set_userdata(array('mail' => $mail,'user_id' => $user_id));
                $this->load->view('templates/header',$msg);
                $this->load->view('account/track');
                $this->load->view('templates/footer');
            }
        }else{
            //GET 注册
            $name = $this->security->get_csrf_token_name();
            $hash = $this->security->get_csrf_hash();
            $csrf = array('name'=>$name,'hash'=>$hash);
            $this->load->view('templates/header',$msg);
            $this->load->view('account/register',$csrf);
            $this->load->view('templates/footer');
        }
    }

    public function editpassword()
    //修改密码
    {
        $oldpassword = $this->input->post('oldpassword');
        $msg = array('title'=>'修改密码');
        if(!$oldpassword){
            $name = $this->security->get_csrf_token_name();
            $hash = $this->security->get_csrf_hash();
            $csrf = array('name'=>$name,'hash'=>$hash,'wrongpasswd'=>False);
            $this->load->view('templates/header',$msg);
            $this->load->view('account/editpassword',$csrf);
            $this->load->view('templates/footer');
            return True;
        }
        $mail = $this->session->mail;
        $login = $this->account_model->login($mail,$oldpassword);
        if(!$login){
            $name = $this->security->get_csrf_token_name();
            $hash = $this->security->get_csrf_hash();
            $csrf = array('name'=>$name,'hash'=>$hash,'wrongpasswd'=>True);
            $this->load->view('templates/header',$msg);
            $this->load->view('account/editpassword',$csrf);
            $this->load->view('templates/footer');
            return True;
        }else{
            $newpassword = $this->input->post('password');
            $this->account_model->change_passwd($mail,$newpassword);
            redirect(base_url('/account/profile?passwordchanged'),'refresh',301);
            return True;
        }
    }

    public function track()
    {
        if(!$this->session->mail){
            redirect(base_url('/account/login'),'refresh',301);
        }
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/track');
        $this->load->view('templates/footer');
    }

    public function message()
    {
        if(!$this->session->mail){
            redirect(base_url('/account/login'),'refresh',301);
        }
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/message');
        $this->load->view('templates/footer');
    }

    public function report()
    {
        $user_id = $this->session->user_id;
        if(!$user_id){
            redirect(base_url('/account/login'),'refresh',301);
        }

        $action = $this->input->get('action');
        $ajax = $this->input->get('ajax');


        if(!$action){
            $data['title'] = 'Alien';
            $data['records'] = $this->account_model->record_list($user_id);
            $this->load->view('templates/header',$data);
            $this->load->view('account/report',$data);
            $this->load->view('templates/footer');
            return True;
        }

        if($action == 'delete'){
            $ids = $this->input->post('id');
            $this->account_model->delete_records($user_id,$ids);
            return True;
        }
        if($action == 'pause'){
            $id = $this->input->get('id');
            $this->account_model->pause_record($user_id,$id);
            $data['title'] = 'Alien';
            $data['records'] = $this->account_model->record_list($user_id);
            $this->load->view('templates/header',$data);
            $this->load->view('account/report',$data);
            $this->load->view('templates/footer');
            return True;
        }

        if($action == 'resume'){
            $id = $this->input->get('id');
            $this->account_model->resume_record($user_id,$id);
            $data['title'] = 'Alien';
            $data['records'] = $this->account_model->record_list($user_id);
            $this->load->view('templates/header',$data);
            $this->load->view('account/report',$data);
            $this->load->view('templates/footer');
            return True;
        }

    }

    public function photo()
    {
        if(!$this->session->mail){
            redirect(base_url('/account/login'),'refresh',301);
        }
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/photo');
        $this->load->view('templates/footer');
    }

    public function settings()
    {
        if(!$this->session->mail){
            redirect(base_url('/account/login'),'refresh',301);
        }
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/settings');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $mail = $this->session->mail;
        if(!$mail){
            redirect(base_url('/account/login'),'refresh',301);
        }
        $data['title'] = 'Alien';
        $data['mail'] = $mail;
        if($this->input->get('passwordchanged') === '')
            $data['passwdchanged'] = True;
        else
            $data['passwdchanged'] =False;
        $this->load->view('templates/header',$data);
        $this->load->view('account/profile',$data);
        $this->load->view('templates/footer');
    }
}