<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
	public function index()
	{
		$data['title'] = 'Alien';
        $csrf = array('name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash());
		$this->load->view('templates/header',$data);
		$this->load->view('welcome',$csrf);
		$this->load->view('templates/footer');
	}

    //使用协议
    public function agreement()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/agreement');
        $this->load->view('templates/footer');
    }

    public function howto()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('welcome/howto');
        $this->load->view('templates/footer');
    }

    public function faq()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('welcome/faq');
        $this->load->view('templates/footer');
    }

    public function privacy()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('welcome/privacy');
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        $data['title'] = 'Alien';
        $this->load->view('templates/header',$data);
        $this->load->view('account/agreement');
        $this->load->view('templates/footer');
    }
}