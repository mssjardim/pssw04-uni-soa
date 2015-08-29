<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
require_once 'client.php';
class Home extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( array (
				'form',
				'url',
				'array' 
		) );
		$this->load->model ( 'usuarios' );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
	}
	public function index() {
		$this->load->view ( 'header' );
		$this->load->view ( 'home_index' );
		$this->load->view ( 'footer' );
	}
	public function usuario() {
		// Validação do form
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|strtolower|valid_email|callback_email_check' );
		$this->form_validation->set_error_delimiters ( '<div class="error"><p>', '</p></div>' );
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'header' );
			$this->load->view ( 'home_add', $this->input->post () );
			$this->load->view ( 'footer' );
		} else {
			$dados = elements ( array (
					'email' 
			), $this->input->post () );
			$user = $this->usuarios->findByUserEmail ( $this->input->post () ['email'] );
			if ($user) {
				$this->session->set_userdata ( array (
						"email" => $user->return->email 
				) );
				$this->session->set_userdata ( array (
						"idusuario" => $user->return->idusuario 
				) );
				$nome_user = array ('nome' => $user->return->nome);
				$lembretes = $this->listLembretes ( $user->return->idusuario );
				$param = $nome_user + array ('lembrete' => $lembretes);
				// echo count($param['lembrete']);
				/* echo "<pre>";
				print_r($param);
				echo "</pre>";
				die(); */
				$this->load->view ( 'header' );
				$this->load->view ( 'home_usuario', @$param );
				$this->load->view ( 'footer' );
			}
		}
	}
	public function usuario_add() {
		// Validação do form
		$this->form_validation->set_message ( 'max_lengh', 'Quantidade de caracteres excedida' );
		$this->form_validation->set_rules ( 'nome', 'Nome', 'required|alpha|ucwords' );
		$this->form_validation->set_rules ( 'celular', 'Celular', 'trim|required' );
		$this->form_validation->set_message ( 'callback_email_uncheck', 'Este email ja possui um cadastro' );
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|strtolower|valid_email|callback_email_uncheck' );
		$this->form_validation->set_error_delimiters ( '<div class="error"><p>', '</p></div>' );
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'header' );
			$this->load->view ( 'home_add', elements ( array (
					'nome',
					'celular',
					'email' 
			), $this->input->post () ) );
			$this->load->view ( 'footer' );
		} else {
			$dados = elements ( array ('nome', 'celular','email'), $this->input->post () );
			// chamada do método que realiza a inserção
			$this->usuarios->insertUser ( $dados );
			$this->load->view ( 'header' );
			$this->load->view ( 'home_usuario', elements ( array (
					'email' 
			), $this->input->post () ) );
			$this->load->view ( 'footer' );
		}
	}
	
	// funcao que retorna o $param
	public function listLembretes($iduser) {
		// echo count($param['lembrete']);
		$lembretes = $this->usuarios->listLembretesByIdusuario ( $iduser );
		if (!empty ( $lembretes->return )) {
			return $lembretes->return;
		} else {
			return '';
		}
	}
	public function email_check($str) {
		$result = $this->usuarios->findByUserEmail ( $str );
		if ($result) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function email_uncheck($str) {
		$result = $this->usuarios->findByUserEmail ( $str );
		if (! $result) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
