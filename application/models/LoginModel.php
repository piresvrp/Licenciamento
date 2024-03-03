<?php

class LoginModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function usuario($login, $dominio = 'dnit.gov.br')
	{
		$this->db->from('tblUsuario')->where(['Email' => "{$login}@{$dominio}", 'Status' => 'A']);
		return $this->db->get()->row_array();
	}

	public function codificar($senha, $chave = 'DN1T')
	{
		return md5($senha . $chave);
	}

}