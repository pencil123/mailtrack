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
        $this->load->model('welcome_model');
    }

    public function login()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/login');
        $this->load->view('templates/footer');
    }

    public function forgotpassword()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/register');
        $this->load->view('templates/footer');
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