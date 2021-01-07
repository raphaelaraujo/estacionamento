<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Calendario extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('fullcalendar_model');
	}

	public function index(){

		$data = array(
			'titulo' => 'Agenda',
			'subtitulo' => 'Gerenciamento de seus compromissos',

			'styles' => array(
				'plugins/fullcalendar/dist/fullcalendar.min.css',
			),

			'scripts' => array(
		        'plugins/moment/moment.js',
		        'plugins/fullcalendar/dist/fullcalendar.min.js',
		        'plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js',
		        //'js/calendar.js',
			)	
			//'usuarios' =>  $this->ion_auth->users()->result(), // get all users
		);


		//echo json_encode($eventos);

		/*
		echo '<pre>';
		print_r($eventos);
		exit();
		*/

		/*
		echo '<pre>';
		print_r($data['usuarios']);
		exit();
		*/

		$this->load->view('layout/header', $data);
		$this->load->view('calendario/index');
		$this->load->view('layout/footer');
		
	}

	function load(){

		$event_data = $this->fullcalendar_model->fetch_all_event();

		foreach ($event_data->result_array() as $row) {
			$data[] = array(
				'id' => $row['id'],
				'title' => $row['title'],
				'start' => $row['start_event'],
				'end' => $row['end_event']
			);
		}

		//print_r($data);
		//exit();
		echo json_encode($data);
	}
}