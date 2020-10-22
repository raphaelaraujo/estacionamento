<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

	public function index(){

		$data = array(
			'titulo' => 'Usuários cadastrados',
			'subtitulo' => 'Chegou a hora de listar todos os usuários cadastrados no banco de dados',

			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
			),

			'scripts' => array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net/js/estacionamento.js',
			),

			'usuarios' =>  $this->ion_auth->users()->result(), // get all users
		);

		/*
		echo '<pre>';
		print_r($data['usuarios']);
		exit();
		*/

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');
	}

	public function core($usuario_id = NULL){

		if(!$usuario_id){
			//Cadastra novo usuario
			exit('Pode cadastrar novo usuário');
		} else {
			//Edita usuário
			if(!$this->ion_auth->user($usuario_id)->row()){
				exit('Usuário não existe');
			} else {
				//Editar usuário
				$data = array(
					'titulo' => 'Editar usuário',
					'subtitulo' => 'Chegou a hora de editar o usuário',
					'icone_view' => 'ik ik-user',
					'usuario' =>  $this->ion_auth->user($usuario_id)->row(), // get user
				);
		
				/*
				echo '<pre>';
				print_r($data['usuario']);
				exit();
				*/
				
			}
		}

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/core');
		$this->load->view('layout/footer');
	}
}