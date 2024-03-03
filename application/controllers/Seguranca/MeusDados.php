<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MeusDados extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('LoginModel', 'Login');
		$this->load->model('Seguranca/UsuarioModel', 'Usuario');
	}

	public function index()
	{
		$this->load->view('template', ['pagina' => 'seguranca/meus-dados']);
	}

	public function update()
	{
		try {
			$dados = $this->session->Logado;
			$senha = $this->input->post('Senha');
			if (!empty($senha)) {
				$dados['Senha'] = $this->Login->codificar($senha);
			}
			$this->Usuario->update($dados);
			echo json_encode([
				'status' => true,
				'result' => 'Dados cadastrados com sucesso.'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

}