<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Api_football_time extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index() {

        //$this->core_competicao();

        $data = array(
            'titulo' => 'Times Cadastrados',
            'subtitulo' => 'Listar times cadastrados no sistema',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'times' => $this->core_football_model->get_all_football('time_football') // get all users
        );

        $this->load->view('layout/header', $data);
        $this->load->view('time/index');
        $this->load->view('layout/footer');
    }

}
