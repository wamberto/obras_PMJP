<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
     public $icones = array(
        'educacao' => '/img/icon-educacao.png',
        'saude' => '/img/icon-educacao.png',
        'trabalho' => '/img/icon-educacao.png',
    );
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Googlemaps');
        $this->load->model('admin/obras_model', 'obras');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['page'] ='home';
        $data['mapa'] = $this->mapa();
        $data['js_header'] = $data['mapa']['map']['js'];
        $data['content'] = $data['mapa']['map']['html'];
        $this->template->load('vwIndex', 'vwPageOneCol', $data);
        
       // $this->load->view('vwHome',$arr);
    }

     public function do_login() {

        if ($this->session->userdata('is_client_login')) {
            redirect('home/loggedin');
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
 /*
         * Code By Abhishek R. Kaushik
         * Sr. Software Developer 
         */
                $this->load->view('login');
            } else {
                $sql = "SELECT * FROM users WHERE user_name = '" . $user . "' AND user_hash = '" . md5($password) . "'";
                $val = $this->db->query($sql);


                if ($val->num_rows) {
                    foreach ($val->result_array() as $recs => $res) {

                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'user_name' => $res['user_name'],
                            'email' => $res['email'],                            
                            'is_client_login' => true
                                )
                        );
                    }
                    redirect('calls/call');
                } else {
                    $err['error'] = 'Username or Password incorrect';
                    $this->load->view('login', $err);
                }
            }
        }
           }

        
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('title');
         $this->session->unset_userdata('ag_country');
        
        $this->session->unset_userdata('is_client_login');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('home', 'refresh');
    }
    
     public  function mapa(){
         
        $obras = $this->obras->list_all_works();
        
        $config['center'] = '-7.119495799999999, -34.84501180000001';
        $config['zoom'] = 'auto';
        $config['map_height'] = '700px';
        $config['scrollwheel'] = true;
        $this->googlemaps->initialize($config);
        
        foreach($obras as $obra){

            $marker = array();
            $marker['title'] = $obra['titulo'];
            $marker['infowindow_content'] = $this->format_infowindow($obra);
            $marker['position'] = $obra['latitude'] .','.$obra['longitude'];
            switch ($obra['categoria']){
                case 'educacao': 
                    $marker['icon'] = $this->icones['educacao'];
                    break;
                case 'educacao': 
                    $marker['icon'] = $this->icones['educacao'];
                    break;
                case 'educacao': 
                    $marker['icon'] = $this->icones['educacao'];
                    break;
           }
            
            $this->googlemaps->add_marker($marker);
        }
 
        $data['map'] = $this->googlemaps->create_map();
     
        return $data;

    }
    
    public function format_infowindow($obra){
        
        $html = '';
        $html .= 'Obra: <strong>'.$obra['titulo'].'</strong><br/>';
        $html .= 'Situação: <strong>'.$obra['situacao'].'</strong><br/>';
        return $html;
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */