<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questionario extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Questionario/PerguntaModel', 'Pergunta');
		$this->load->model('Questionario/RespostaModel', 'Resposta');
		$this->load->model('Questionario/QuestionarioModel', 'Questionario');
	}

	public function index()
	{
		$this->load->view('template', ['pagina' => 'competencia/questionario/index']);
	}

	public function lista()
	{
		if (($Quest = $this->Questionario->seleciona('ID', 'Validade IS NULL')))
			echo json_encode($this->Pergunta->lista(['Questionario' => $Quest['ID']]));
		else
			echo json_encode([]);
	}

	public function salva()
	{
		try {
			$Resp = [
				'DataHora' => date('d/m/Y H:i:s'),
				'Usuario' => $this->session->Logado['ID'],
				'Competencia' => $this->input->post('Competencia'),
				'Empreendimento' => $this->input->post('Empreendimento'),
				'Questionario' => intval($this->input->post('Questionario'), 10)
			];
			$Itns = $this->input->post('Respostas');
			$this->Resposta->salva($Resp, $Itns);
			echo json_encode(['status' => true]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

	public function resultado()
	{
		$resultado = $this->Resposta->consulta($this->session->Logado['ID']);
		$this->load->view('template', ['pagina' => 'competencia/questionario/resultado', 'resultado' => $resultado]);
	}

}