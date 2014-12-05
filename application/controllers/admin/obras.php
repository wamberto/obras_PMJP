<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obras extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'table'));
        $this->load->model('admin/obras_model');
        $this->load->helper(array('botao_helper'));
    }
    
    public function index(){
        //redirect('admin/obras/gerenciar','refersh');
        $this->gerenciar();
    }
    
    public function gerenciar(){
        
        $obras = $this->obras_model->list_all_works();
        
        $arr = array();
        
        foreach($obras as $obra){
            $arr[] = array('<a href="obras/visualizar/'.$obra['id_obra'].'">'.$obra['titulo'].'</a>');
        }
        
        $heading = array('data' => 'Título <i class="fa fa-sort"></i>', 'class' => 'header');
        $tmpl = array('table_open' => '<table class="table table-hover tablesorter" width="100%">');
        $this->table->set_heading($heading);
        $this->table->set_template($tmpl);
        $data['content'] = $this->table->generate($arr);
       // $this->template->load('admin/vwManageIndex', 'admin/vwManagePage', $data);
        $this->load->view('admin/vwManagePage', $data);
    }
    
    public function visualizar($id_obra = NULL){
        
        if ($id_obra != NULL){
            $arr_obra = $this->obras_model->load_by_id($id_obra);
 
            foreach($arr_obra as $k => $v){
                $dados_obra = array(
                    array('<h4>Obra</h4>','<h4>'.$v['titulo'].'</h4>'),
                    array('Descrição',$v['descricao']),
                    array('Endereço',$v['endereco']),
                    array('Contrato nº',$v['contrato']),
                    array('Ordem de Serviço nº',$v['ordem']),
                    array('Categoria',$v['categoria']),
                    array('Localidade',$v['localidade']),
                    array('Valor',$v['valor']),
                    array('Data de Início',$v['data_inicio']),
                    array('Previsão de Entrega',$v['previsao']),
                    array('Percentual Executado',$v['percent_exec']),
                );
            }
            
        }
        $th = array('data' => '', 'width' => '200');
        $this->table->set_heading($th, '');
        $tmpl = array('table_open' => '<table class="table" width="100%">');
        $this->table->set_template($tmpl);
        $data['content'] = $this->table->generate($dados_obra);
        //$this->template->load('admin/vwManageIndex', 'admin/vwManagePage', $data);
        $this->load->view('admin/vwManagePage', $data);
        
    }
    
    
} 