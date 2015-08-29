<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Lembrete extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( array (
				'form',
				'url',
				'array' 
		) );
		$this->load->model ( 'lembretes' );
		$this->load->model ( 'usuarios' );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
		date_default_timezone_set("Brazil/East");
	}
	public function index() {
		$this->load->view ( 'header' );
		$this->load->view ( 'lembrete_form' );
		$this->load->view ( 'footer' );
	}
	public function add() {
		// Validação do form
		$this->form_validation->set_rules ( 'titulo', 'Titulo', 'required|ucwords' );
		$this->form_validation->set_rules ( 'data', 'Data', 'trim|required' );
		$this->form_validation->set_error_delimiters ( '<div class="error"><p>', '</p></div>' );
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'header' );
			$this->load->view ( 'lembrete_form', elements ( array (
					'titulo',
					'data' 
			), $this->input->post () ) );
			$this->load->view ( 'footer' );
		} else {
			$user = $this->usuarios->findByUserEmail ( $this->session->userdata ( 'email' ) );
			if ($user) {
				$data = elements ( array (
						'data' 
				), $this->input->post () );
				//echo  $data ['data'] ;
				$data = $data ['data'] . ':00-04:00';
				
				$dados = elements ( array (
						'titulo' 
				), $this->input->post () );
				$dados = $this->array_push_assoc ( $dados, 'data', $data );
				$auser = array (
						'idusuario' => $user->return->idusuario,
						'nome' => $user->return->nome,
						'email' => $user->return->email 
				);
				$dados = $this->array_push_assoc ( $dados, 'idusuario', $auser );
				/*
				 * echo "<pre>";print_r($dados);echo "</pre>";
				 * die();
				 */
				// chamada do método que realiza a inserção
				$this->lembretes->insertLembrete ( $dados );		
			} else {
				$this->load->view ( 'header' );
				$this->load->view ( 'home_index' );
				$this->load->view ( 'footer' );
			}
		}
	}
	public function editar() {
		$lembrete_id = $this->uri->segment ( 3 );
		$result = $this->lembretes->findLembreteById ( $lembrete_id );
		if ($result) {
			$this->load->view ( 'header' );
			$this->load->view ( 'lembrete_form', $result->return);
			$this->load->view ( 'footer' );
		} else {
			$this->load->view ( 'header' );
			$this->load->view ( 'home_usuario', $result->return);
			$this->load->view ( 'footer' );
		}
	}
	//funcao que retorna o $param 
	public function returnParam($idusuario) {
		$lembretes = $this->usuarios->listLembretesByIdusuario($idusuario);
		if(!empty($lembretes->return)){
			return $param = $nome_user+ array('lembrete' => $lembretes->return);
		} else{
			return $param = $nome_user+ array('lembrete' => '');
		}
	}
	
	public function edit() {
		// Validação do form
		$this->form_validation->set_rules ( 'titulo', 'Titulo', 'required|ucwords' );
		$this->form_validation->set_rules ( 'data', 'Data', 'trim|required' );
		$this->form_validation->set_error_delimiters ( '<div class="error"><p>', '</p></div>' );
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'header' );
			$this->load->view ( 'lembrete_form', elements ( array (
					'titulo',
					'data'
			), $this->input->post () ) );
			$this->load->view ( 'footer' );
		} else {
			$user = $this->usuarios->findByUserEmail ( $this->session->userdata ( 'email' ) );
			if ($user) {
				$data = elements ( array (
						'data'
				), $this->input->post () );
				$data = $data ['data'] . ':00Z';
				$dados = elements ( array (
						'titulo'
				), $this->input->post () );
				$dados = $this->array_push_assoc ( $dados, 'data', $data );
				$auser = array (
						'idusuario' => $user->return->idusuario,
						'nome' => $user->return->nome,
						'email' => $user->return->email
				);
				$dados = $this->array_push_assoc ( $dados, 'idusuario', $auser );
				// chamada do método que realiza a inserção
				$this->lembretes->updateLembrete ( $dados );
				//Parametros para exibicao da tabela de lembretes por usuarios
				$nome_user = array('nome' =>  $user->return->nome);
				$lembretes = $this->usuarios->listLembretesByIdusuario($user->return->idusuario);
				$param = $nome_user+ array('lembrete' => $lembretes->return);
				$this->load->view ( 'header' );
				$this->load->view ( 'home_usuario', @$param);
				$this->load->view ( 'footer' );
				
			} else {
				$this->load->view ( 'header' );
				$this->load->view ( 'home_index' );
				$this->load->view ( 'footer' );
			}
		}
	}
	function array_push_assoc($array, $key, $value) {
		$array [$key] = $value;
		return $array;
	}
}
