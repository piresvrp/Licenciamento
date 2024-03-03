<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Respostas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Questionario/RespostaModel', 'Resposta');
	}

	public function index()
	{
		$this->load->view('template', ['pagina' => 'questionario/respostas/index']);
	}

	public function lista()
	{
		echo json_encode($this->Resposta->lista());
	}

	public function ver()
	{
		$ID = intval($this->input->get('id'));
		$resultado = $this->Resposta->seleciona($ID);
		$this->load->view('template', ['pagina' => 'questionario/respostas/ver', 'resultado' => $resultado]);
	}

}