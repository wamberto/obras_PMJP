<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Googlemaps');
    }
    
    public  function mapa_1(){
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $config['directions'] = 'TRUE';
        $config['directionsStart'] = 'UTFPR - Avenida 7 de Setembro, Curitiba, Brasil';
        $config['directionsEnd'] = 'Av. Presidente Affonso Camargo, 330 Curitiba, Brasil';
        $config['directionsDivID'] = 'directionsDiv';
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapa',$data);
    }
    
    public  function mapa_2(){
        
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '37.429, -122.1519';
        $marker['infowindow_content'] = '1 - Hello World!';
        $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '37.409, -122.1319';
        $marker['draggable'] = TRUE;
        $marker['animation'] = 'DROP';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '37.449, -122.1419';
        $marker['onclick'] = 'alert("You just clicked me!!")';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
 
        $this->load->view('mapa',$data);

    }
}


