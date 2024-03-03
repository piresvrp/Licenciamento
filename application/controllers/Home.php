<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Questionario/QuestionarioModel', 'Questionario');
	}

	public function index()
	{
		redirect('Home/inicio');
	}

	public function inicio()
	{
		$descricao = null;
		#selecionar descrição do questionário sem data de validade
		if (($que = $this->Questionario->seleciona('Descricao', 'Validade IS NULL')))
			$descricao = $que['Descricao'];
		$this->load->view('template', ['pagina' => 'home/inicio', 'descricao' => $descricao]);
	}

}