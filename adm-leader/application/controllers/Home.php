<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index() {



//        $operacao = "fixtures/league/1396?timezone=America/Belem";
//        $resposta = $this->api_model->executa_api_football($operacao);
//
//        echo json_encode($resposta);
//
//        exit();
////
//        $var = sprintf("%s %s %s", 'Shots', 'on', 'Goal');
//
//        foreach ($resposta as $value) {
//            echo json_encode($value->statistics->$var->home);
//        }
//
//        exit();
//
//        //327989

        $data = array(
            'titulo' => 'Home'
        );

        $this->load->view('layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }

}
