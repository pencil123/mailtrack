<?php
class Pages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('first');
/*        $this->load->helper('url_helper');*/
    }

    public function index()
    {
        $data['news'] = $this->first->get_news();
        $data['title'] = 'hi world';

        $this->load->view('templates/header',$data);
        $this->load->view('pages/home',$data);
        $this->load->view('templates/footer');
    }

    public function view($record_id = NULL)
    {
        $data['news_item'] = $this->first->get_news($record_id);
        if (empty($data['news_item']))
        {
            show_404();
        }
        echo "hello";

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/footer');
    }
}