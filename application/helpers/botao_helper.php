<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('gerar_botao')) {

    function set_botao($botao, $no_anchor = FALSE) {
        $titulo;
        $link;
        $nivel;
        $niveis;
        $class;
        $botoes = array();

        $btn = null;
        foreach ($botao as $key => $value) {

            switch ($key) {
                case 'titulo':
                    $titulo = $value;
                    break;
                case 'link':
                    $link = $value;
                    break;
                case 'nivel':
                    $nivel = $value;
                    break;
                case 'niveis':
                    $niveis = $value;
                    break;
                case 'class':
                    $class = $value;
                    break;
            }
        }
        if (check_nivel($nivel, $niveis) != false) {
            if ($no_anchor) {
                $btn = '<a href="' . $link . '"><button type="button" class="' . $class . '">' . $titulo . ' </button></a>';
            } else {
                $btn = anchor($link, '<button type="button" class="' . $class . '">' . $titulo . ' </button>');
            }
        }
        $botoes[] = $btn;
        return $botoes;
    }

}

// --------------------------------------------------------------------

/**
 * Checa o nivel do usuario
 *
 * retorna true ou false caso o nivel do usuario nao esteja na lista de niveis passado quando for setado o botao
 * se a lista for vazia tera um retorno true.
 *
 * @access	private
 * @return	boolean
 */
if (!function_exists('check_nivel')) {

    function check_nivel($nivel, $niveis) {

        if ($niveis == '') {
            return true;
        } else {
            $pos = strpos($niveis, $nivel);
            if ($pos === false) {
                return false;
            } else {
                return true;
            }
        }
    }

}

function exibir_botoes($botoes) {
        $html = '';
        foreach ($botoes as $botao) {
            $html .= '&nbsp;' . $botao;
        }
        return $html;
    }
