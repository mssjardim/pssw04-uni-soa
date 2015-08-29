<?php

class Soap_Client extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper('url');
		$this->load->library ( 'Nusoap_lib' );
		$this->soapclient = new nusoap_client( 'http://54.232.195.194:9090/lembrarws/LembrarWS?WSDL', true );
	}
	
	function index() {
		
		$param = array (
				'texto' => 'clara' 
		);
		$mynamespace = "http://54.232.195.194:9090/lembrarws/LembrarWS";
		
		$err = $this->soapclient->getError();
		if ($err) {
			echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
			// echo '<h2>Debug</h2><pre>' . $this->soapclient->getDebug() . '</pre>';
			exit ();
		}
		
		//$result = $this->soapclient->call ( 'listUsuarios' );
		// $result = $this->soapclient->call('teste', $param);
		$result = $this->teste('claraaa.bf@gmail.com');
		
		// Check for a fault
		 if ($this->soapclient->fault) {
			echo '<h2>Fault</h2><pre>';
			print_r ( $result );
			echo '</pre>';
		} else {
			// Check for errors
			$err = $this->soapclient->getError ();
			if ($err) {
				// Display the error
				echo '<h2>Error</h2><pre>' . $err . '</pre>';
			} else {
				// Display the result
				echo '<h2>Result</h2><pre>';
				print_r ( $result );
				echo '</pre>';
				/*
				 * $dados = array (
				 * 'email' => $result['return']
				 * );
				 * $this->load->view ( 'header' );
				 * $this->load->view ( 'home_usuario', $dados );
				 * $this->load->view ( 'footer' );
				 */
			}
		} 
	}
	function teste($email) {
		$param = array (
				'texto' => $email
		);
		print_r ( $param );
		$result = $this->soapclient->call('teste', $param);
		return $result;
	
	}
	function findByUserEmail($email) {
		
		$param = array ('email' => $email);
		$result = $this->soapclient->call('findUsuariosByEmail', $param);
		if ($result) {
			$this->load->view ( 'header' );
			$this->load->view ( 'home_usuario', $param );
			$this->load->view ( 'footer' );
		} else {
			$this->load->view ( 'header' );
			$this->load->view ( 'home_index');
			$this->load->view ( 'footer' );
		}
		
	}
}