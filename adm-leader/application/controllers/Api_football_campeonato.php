<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Api_football_campeonato extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Campeonatos Cadastrados',
            'subtitulo' => 'Listar campeonatos cadastrados no sistema',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'campeonatos' => $this->core_football_model->get_all_football('competicao_football') // get all users
        );

        $this->load->view('layout/header', $data);
        $this->load->view('campeonato/index');
        $this->load->view('layout/footer');
    }

    public function core_competicao() {

        $this->core_football_model->delete_registros('competicao_football');

        $operacao = "leagues/current";
        $resposta = $this->api_model->executa_api_football($operacao);

        foreach ($resposta as $value) {

            $qtd = $value->results;

            for ($contador = 0; $contador < $qtd; $contador++) {

                if (!$this->core_football_model->get_by_id('competicao_football', array('league_id' => $value->leagues[$contador]->league_id))) {

                    $data['league_id'] = $value->leagues[$contador]->league_id;
                    $data['name'] = $value->leagues[$contador]->name;
                    $data['type'] = $value->leagues[$contador]->type;
                    $data['country'] = $value->leagues[$contador]->country;
                    $data['country_code'] = $value->leagues[$contador]->country_code;
                    $data['season'] = $value->leagues[$contador]->season;
                    $data['season_start'] = $value->leagues[$contador]->season_start;
                    $data['season_end'] = $value->leagues[$contador]->season_end;
                    $data['logo'] = $value->leagues[$contador]->logo;
                    $data['flag'] = $value->leagues[$contador]->flag;

                    $this->core_football_model->insert('competicao_football', $data);
                }
            }

            $this->session->set_flashdata('sucesso', 'Campeonatos cadastrados/atualizados com sucesso');
            redirect('/');
        }
    }

    public function core_league_time($league_id) {

        $operacao = "teams/league/" . $league_id;
        $resposta = $this->api_model->executa_api_football($operacao);

        foreach ($resposta as $value) {
            $qtd = $value->results;

            for ($contador = 0; $contador < $qtd; $contador++) {

                $data_league_time['team_id'] = $value->teams[$contador]->team_id;
                $data_league_time['team_league_id'] = $league_id;
                $data_league_time['name_team'] = $value->teams[$contador]->name;
                $data_league_time['logo_team'] = $value->teams[$contador]->logo;
                $data_league_time['country_team'] = $value->teams[$contador]->country;
                $data_league_time['venue_name'] = $value->teams[$contador]->venue_name;
                $data_league_time['venue_address'] = $value->teams[$contador]->venue_address;
                $data_league_time['venue_city'] = $value->teams[$contador]->venue_city;
                $data_league_time['venue_capacity'] = $value->teams[$contador]->venue_capacity;

                $this->core_football_model->insert('time_league_football', $data_league_time);

                if (!$this->core_model->get_by_id('time_football', array('team_id' => $value->teams[$contador]->team_id))) {

                    $data_time['team_id'] = $value->teams[$contador]->team_id;
                    $data_time['name_team'] = $value->teams[$contador]->name;
                    $data_time['logo_team'] = $value->teams[$contador]->logo;
                    $data_time['country_team'] = $value->teams[$contador]->country;
                    $data_time['venue_name'] = $value->teams[$contador]->venue_name;
                    $data_time['venue_address'] = $value->teams[$contador]->venue_address;
                    $data_time['venue_city'] = $value->teams[$contador]->venue_city;
                    $data_time['venue_capacity'] = $value->teams[$contador]->venue_capacity;

                    $this->core_football_model->insert('time_football', $data_time);
                }
            }
        }
    }

    public function core_jogos($league_id) {

        $operacao = "fixtures/league/" . $league_id;
        $resposta = $this->api_model->executa_api_football($operacao);

        foreach ($resposta as $value) {
            $qtd = $value->results;

            for ($contador = 0; $contador < $qtd; $contador++) {

                if (!$this->core_model->get_by_id('jogo_football', array('match_id ' => $value->fixtures[$contador]->fixture_id))) {
                    $data['match_id'] = $value->fixtures[$contador]->fixture_id;
                    $data['match_league_id'] = $value->fixtures[$contador]->league_id;
                    $data['round'] = $value->fixtures[$contador]->round;
                    $data['event_date'] = $value->fixtures[$contador]->event_date;
                    $data['status'] = $value->fixtures[$contador]->status;
                    $data['status_code'] = $value->fixtures[$contador]->statusShort;
                    $data['venue'] = $value->fixtures[$contador]->venue;
                    $data['referee'] = $value->fixtures[$contador]->referee;
                    $data['home_team_id'] = $value->fixtures[$contador]->homeTeam->team_id;
                    $data['home_team_name'] = $value->fixtures[$contador]->homeTeam->team_name;
                    $data['away_team_id'] = $value->fixtures[$contador]->awayTeam->team_id;
                    $data['away_team_name'] = $value->fixtures[$contador]->awayTeam->team_name;
                    $data['goals_home_team'] = $value->fixtures[$contador]->goalsHomeTeam;
                    $data['goals_away_team'] = $value->fixtures[$contador]->goalsAwayTeam;
                    $data['half_time'] = $value->fixtures[$contador]->score->halftime;
                    $data['full_time'] = $value->fixtures[$contador]->score->fulltime;
                    $data['extra_time'] = $value->fixtures[$contador]->score->extratime;
                    $data['penalty'] = $value->fixtures[$contador]->score->penalty;

                    $this->core_football_model->insert('jogo_football', $data);
                }
            }
        }
    }

    public function core_geral($league_id) {

        $this->core_league_time($league_id);
        $this->core_jogos($league_id);
        $this->session->set_flashdata('sucesso', 'Cadastro de times e jogos da competição realizado com sucesso');
        redirect('/');
    }

    public function index_time($league_id, $league_name) {

        $data = array(
            'titulo' => 'Times Cadastrados',
            'subtitulo' => 'Listar times cadastrados no campeonato ',
            'nome_campeonato' => preg_replace('/\d+/u', '', str_replace('%', ' ', $league_name)),
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'times' => $this->core_football_model->get_all_football('time_league_football', array('team_league_id' => $league_id)) // get all users
        );

        $this->load->view('layout/header', $data);
        $this->load->view('time/index');
        $this->load->view('layout/footer');
    }

    public function index_jogos($league_id) {

//1 - jogo
//rodada
//visitante
//mandante
//local
//data
//placar
//
//detalhes (escalação e eventos)

        $data = array(
            'titulo' => 'Jogos Cadastrados',
            'subtitulo' => 'Listar times cadastrados no sistema',
            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net/js/estacionamento.js',
            ),
            'jogos' => $this->core_football_model->get_all_football('jogo_football', array('match_league_id' => $league_id)) // get all users
        );

        $this->load->view('layout/header', $data);
        $this->load->view('jogo/index');
        $this->load->view('layout/footer');
    }

}
