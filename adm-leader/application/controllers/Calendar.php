<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("calendar_model");
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Agenda',
			'subtitulo' => 'Gerenciamento de seus compromissos',

			'styles' => array(
				'plugins/fullcalendar/dist/fullcalendar.min.css',
			),

			'scripts' => array(
				'plugins/moment/moment.js',
				'plugins/fullcalendar/dist/fullcalendar.min.js',
				'plugins/fullcalendar/dist/locale-all.js',
			),
	
		);

		$this->load->view('layout/header', $data);
		$this->load->view('calendar/index');
		$this->load->view('layout/footer');
	}

	public function get_events()
	{
		// Our Start and End Dates
		$start = $this->input->get("start");
		$end = $this->input->get("end");

		$startdt = new DateTime('now'); // setup a local datetime
		$startdt->setTimestamp($start); // Set the date based on timestamp
		$start_format = $startdt->format('Y-m-d H:i:s');

		$enddt = new DateTime('now'); // setup a local datetime
		$enddt->setTimestamp($end); // Set the date based on timestamp
		$end_format = $enddt->format('Y-m-d H:i:s');

		$events = $this->calendar_model->get_events($start_format, $end_format);

		$data_events = array();

		foreach ($events->result() as $r) {

			$data_events[] = array(
				"id" => $r->ID,
				"title" => $r->title,
				"description" => $r->description,
				"end" => $r->end,
				"start" => $r->start,
				"color" => $r->color
			);
		}

		echo json_encode(array("events" => $data_events));
		exit();
	}

	public function add_event()
	{
		/* Our calendar data */
		$name = $this->input->post("name", TRUE);
		$desc = $this->input->post("description", TRUE);
		$start_date = $this->input->post("start_date", TRUE);
		$end_date = $this->input->post("end_date", TRUE);
		$color = $this->input->post("color", TRUE);

		if (!empty($start_date)) {
			$data_start = str_replace('/', '-', $start_date);
			$datastart_conv = date("Y-m-d H:i:s", strtotime($data_start));
			//echo $datastart_conv;
			
			//$sd = DateTime::createFromFormat("DD/MM/YYYY HH:mm", $start_date);
			//$start_date = $sd->format("Y-m-d H:i:s");
			//$start_date_timestamp = $sd->getTimestamp();
		} else {
			$start_date = date("Y-m-d H:i:s", time());
			$datastart_conv = time();
		}

		if (!empty($end_date)) {
			$data_end = str_replace('/', '-', $end_date);
			$dataend_conv = date("Y-m-d H:i:s", strtotime($data_end));

			//$ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
			//$end_date = $ed->format('Y-m-d H:i:s');
			//$end_date_timestamp = $ed->getTimestamp();
		} else {
			$end_date = date("Y-m-d H:i:s", time());
			$dataend_conv = time();
		}

		$this->calendar_model->add_event(array(
			"title" => $name,
			"description" => $desc,
			"start" => $datastart_conv,
			"end" => $dataend_conv,
			"color" => $color,
		));

		redirect(site_url("calendar"));
	}

	public function edit_event()
	{
		$eventid = intval($this->input->post("eventid"));
		$event = $this->calendar_model->get_event($eventid);
		if ($event->num_rows() == 0) {
			echo "Invalid Event";
			exit();
		}

		$event->row();

		/* Our calendar data */
		$name = $this->input->post("name");
		$desc = $this->input->post("description");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
		$delete = $this->input->post("delete");
		$color = $this->input->post("color");

		if (!$delete) {

			if (!empty($start_date)) {
				$data_start = str_replace('/', '-', $start_date);
				$datastart_conv = date("Y-m-d H:i:s", strtotime($data_start));
				
				//$sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
				//$start_date = $sd->format('Y-m-d H:i:s');
				//$start_date_timestamp = $sd->getTimestamp();
			} else {
				$start_date = date("Y-m-d H:i:s", time());
				$start_date_timestamp = time();
			}

			if (!empty($end_date)) {
				$data_end = str_replace('/', '-', $end_date);
				$dataend_conv = date("Y-m-d H:i:s", strtotime($data_end));

				//$ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
				//$end_date = $ed->format('Y-m-d H:i:s');
				//$end_date_timestamp = $ed->getTimestamp();
			} else {
				$end_date = date("Y-m-d H:i:s", time());
				$end_date_timestamp = time();
			}

			$this->calendar_model->update_event($eventid, array(
				"title" => $name,
				"description" => $desc,
				"start" => $datastart_conv,
				"end" => $dataend_conv,
				"color" => $color,
			));
		} else {
			$this->calendar_model->delete_event($eventid);
		}

		redirect(site_url("calendar"));
	}
}
