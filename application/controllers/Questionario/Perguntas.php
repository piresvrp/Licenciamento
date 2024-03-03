<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perguntas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Questionario/PerguntaModel', 'Pergunta');
		$this->load->model('Questionario/QuestionarioModel', 'Questionario');
	}

	public function index()
	{
		$this->load->view('template', ['pagina' => 'questionario/perguntas']);
	}

	public function lista()
	{
		if (!($Quest = $this->Questionario->seleciona('*', 'Validade IS NULL')))
			$Quest = ['ID' => null, 'Federal' => '', 'Estadual' => '', 'Descricao' => ''];
		echo json_encode([
			'Questionario' => $Quest,
			'Perguntas' => $this->Pergunta->lista(['Questionario' => $Quest['ID']])
		]);
	}

	public function salva()
	{
		try {
			$Quest = $this->input->post('Questionario');
			$Pergs = $this->input->post('Perguntas');
			$this->Questionario->salva($Quest, $Pergs);
			echo json_encode([
				'status' => true,
				'result' => 'Questionário Salvo com Sucesso.'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

}