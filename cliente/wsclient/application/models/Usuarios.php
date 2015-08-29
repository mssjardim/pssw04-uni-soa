<?php
class Usuarios extends CI_Model {
	
	public function __construct() {
		parent::__construct ();
		$this->soapclient = new SoapClient ( 'http://10.192.97.45:9090/lembrarws/LembrarWS?WSDL' );
	}
	public function findByUserEmail($email) {
		if (! empty ( $email )) {
			$param = array (
					'email' => $email
			);
				
			$result = $this->soapclient->findUsuariosByEmail ( $param );
			if (isset ( $result->return )) {
				return $result;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
	public function insertUser($dados = NULL) {
		if (! empty ( $dados ['nome'] ) && ! empty ( $dados ['email'] )) {
			if (! $this->findByUserEmail ( $dados ['email'] )) {
				/* echo 'tese';
				die (); */
				$result = $this->soapclient->createUsuario ( array (
						'usuario' => $dados 
				) );
				$id_user = $this->findByUserEmail ($dados ['email'])->idusuario;
				$this->session->set_userdata ( array (
						"email" => $dados ['email']
				) );
				$this->session->set_userdata ( array (
						"idusuario" => $id_user
				) );
				$this->session->set_flashdata ( 'addOK', 'Cadastro efetuado com sucesso!' );				
				redirect ( "/index.php/home/usuario" );
				return $result;
			} else {
				return $dados ['email'];
			}
		} else {
			return '';
		}
	}
	public function insertLembrete($dados = NULL) {
		if ($dados != NULL) {
			$result = $this->soapclient->createLembrete ( $dados );
			return $result;
		} else {
			return '';
		}
	}
	public function listLembretesByIdusuario($id_user) {
		if (! empty ( $id_user )) {
			$param = array (
					'idusuario' => $id_user 
			);
			
			$result = $this->soapclient->listLembretesByIdusuario ( $param );
			if (isset ( $result->return )) {
				return $result;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
}