<?php
class Lembretes extends CI_Model {
	public function __construct() {
		parent::__construct ();
		
		$this->soapclient = new SoapClient ( 'http://10.192.97.45:9090/lembrarws/LembrarWS?WSDL' );
	}
	public function findLembreteById($idlembrete) {
		if (! empty ( $idlembrete )) {
			$param = array (
					'idlembrete' => $idlembrete 
			);
			
			$result = $this->soapclient->findLembreteById ( $param );
			if (isset ( $result->return )) {
				return $result;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
	public function insertLembrete($dados = NULL) {
		if (! empty ( $dados ['titulo'] )) {
			$param = array (
					'lembretes' => $dados 
			);
			$result = $this->soapclient->createLembrete ( $param );
			$this->session->set_flashdata ( 'addOK', 'Cadastro efetuado com sucesso!' );
			redirect ( "/index.php/lembrete" );
			return $result;
		} else {
			return '';
		}
	}
	public function updateLembrete($dados = NULL) {
		if (! empty ( $dados ['titulo'] )) {
			$param = array (
					'lembretes' => $dados 
			);
			$result = $this->soapclient->editLembrete ( $param );
			$this->session->set_flashdata ( 'addOK', 'Alteracao efetuada com sucesso!' );
			return $result;
		} else {
			return '';
		}
	}
}