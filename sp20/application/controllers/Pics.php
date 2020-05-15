<?php

//application/controllers/Pics.php

class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->config->set_item('banner', 'Pics Section');
                $this->load->model('pics_model');
                $this->load->helper('url_helper');         
        }

        public function index()
        {
                $this->config->set_item('title', 'Seattle Sports Pics');

                $nav1 = $this->config->item('nav1');

                $data['title'] = 'Sports Pics';

                $data['pics'] = $this->pics_model->get_pics();
                
                $this->load->view('pics/index', $data);
        
                     
        }

        public function view($slug = NULL)
        {      
                $this->config->set_item('title', 'Pics of '. $slug);
                $data['pics_item'] = $this->pics_model->get_pics2($slug);
                // echo "<pre";
                // var_dump($data['pics_item']);
                // echo "</pre>";
                // die;

                if (empty($data['pics_item']))
                {
                        show_404();
                }
                $data['title'] =  'Pictures of ' . $slug;
                
               $this->load->view('pics/view', $data);

        }

}