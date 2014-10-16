<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public $icones = array(
        'educacao' => '/img/icon-educacao.png',
        'saude' => '/img/icon-educacao.png',
        'trabalho' => '/img/icon-educacao.png',
    );

     public function __construct() {
        parent::__construct();
        $this->load->library('Googlemaps');
        $this->load->model('obras_model', 'obras');
    }
    
    
    public function index(){
        //comment
       $dados['mapa'] = $this->mapa();
       $this->template->load('index','contents', $dados);
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
            switch (($obra['categoria']){
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
/* Location: ./application/controllers/home.php */
