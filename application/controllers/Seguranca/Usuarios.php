<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel', 'Login');
		$this->load->model('Seguranca/UsuarioModel', 'Usuario');
	}

	public function index()
	{
		$this->load->view('template', ['pagina' => 'seguranca/usuarios']);
	}

	public function trocar()
	{
		$this->load->view('template', ['pagina' => 'seguranca/trocar']);
	}

	public function lista()
	{
		echo json_encode($this->Usuario->lista());
	}

	public function login()
	{
		try {
			$email = $this->input->post('Email');
			$parts = explode('@', $email);
			if (count($parts) != 2) {
				throw new Exception('E-mail inválido!');
			}
			$login = $parts[0];
			$dominio = $parts[1];
			//consulta dados do usuario
			if (!($usuario = $this->Login->usuario($login, $dominio))) {
				throw new Exception('Usuário não encontrado!');
			}
			unset($usuario['Senha']);
			$partes = explode(' ', trim($usuario['Nome']));
			$usuario['Apelido'] = $partes[0] . ' ' . $partes[count($partes) - 1];
			$this->session->set_userdata('Logado', $usuario);
			echo json_encode([
				'status' => true,
				'result' => 'Ok'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

	public function insert()
	{
		try {
			$dados = $this->input->post(NULL, true);
			$dados['Senha'] = $this->Login->codificar($dados['Senha']);
			$this->Usuario->insert($dados);
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

	public function update()
	{
		try {
			$dados = $this->input->post(NULL, true);
			if (!empty($dados['Senha'])) {
				$dados['Senha'] = $this->Login->codificar($dados['Senha']);
			}
			$this->Usuario->update($dados);
			echo json_encode([
				'status' => true,
				'result' => 'Dados alterados com sucesso.'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

	public function status()
	{
		try {
			$this->Usuario->status(intval($this->input->post('ID')));
			echo json_encode([
				'status' => true,
				'result' => 'Status alterado com sucesso.'
			]);
		} catch (Exception $e) {
			echo json_encode([
				'status' => false,
				'result' => $e->getMessage()
			]);
		}
	}

}