<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->library('Googlemaps');
    }
    
    
    public function index(){
        //comment
       $dados['mapa'] = $this->mapa();
       $this->template->load('index','contents', $dados);
    }
    
     public  function mapa(){
        
        $config['center'] = '-7.119495799999999, -34.84501180000001';
        $config['zoom'] = 'auto';
        $config['map_height'] = '600px';
        $config['scrollwheel'] = FALSE;
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '-7.1222945, -34.87907229999996';
        $marker['infowindow_content'] = '1 - Hello World!';
        $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '-7.161481, -34.838329';
        $marker['infowindow_content'] = 'Viadto de Mangabeira';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '-7.108742, -34.873734';
        $marker['onclick'] = 'alert("You just clicked me!!")';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
     
        return $data;

    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */