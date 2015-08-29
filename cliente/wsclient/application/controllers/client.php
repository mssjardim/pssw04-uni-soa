<?php
class Client extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('usuarios');
		$this->soapclient = new SoapClient ( 'http://54.232.195.194:9090/lembrarws/LembrarWS?WSDL' );
	}
	
	function index() {
		$param = array (
				'texto' => 'clara' 
		);
		
		//$mynamespace = "http://54.232.195.194:9090/lembrarws/LembrarWS";
		  $lembrete = array('titulo' => 'Eh um titulo', 'data' =>'2015-09-01T00:00:00Z', 
		 		'idusuario' =>array('idusuario'=>2, 'nome'=> 'Clara Aben-Athar', 'email' => 'claraaa.bf@gmail.com'));		 
		  $param = array('lembretes' => $lembrete);
		 echo '<h2>Result</h2><pre>';
		 print_r ($param);
		 echo '</pre>';
		 $result = $this->usuarios->insertLembrete($param);
		 
		 
		 //$result = $this->teste( 'claraaa.bf@gmail.com' );
		
		if (!empty($result)) {
			echo '<h2>Result</h2><pre>';
			print_r ( $result );
			echo '</pre>';
		} else {
			echo '<h2>N&atilde;o tem resultado</h2>';
		} 
	}
	
	
	function teste($email) {
		
		//$result = $this->usuarios->get_teste($email);
		
		$param = array (
				'email' => $email 
		);
		//print_r ( $param );
		$result = $this->usuarios->get_user ( $email );
		return $result; 
		
	}
	
	public function searchEmail($email) {
		$data = $this->usuarios->get_user($email);
		
		if (!empty($data)) {
			return TRUE;
		} else {
			return FALSE;
		}
		
		/*
		 * if ($result) {
		 * $this->load->view ( 'header' );
		 * $this->load->view ( 'home_usuario', $param );
		 * $this->load->view ( 'footer' );
		 * } else {
		 * $this->load->view ( 'header' );
		 * $this->load->view ( 'home_index');
		 * $this->load->view ( 'footer' );
		 * }
		 */
	}
}