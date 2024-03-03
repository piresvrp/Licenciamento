<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$this->load->view('home/login');
	}

	public function login()
	{
		$email = $this->input->post('Email');
		$senha = $this->input->post('Senha');
		$parts = explode('@', $email);
		if (count($parts) != 2) {
			echo json_encode([
				'status' => false,
				'result' => 'E-mail inválido!'
			]);
			return;
		}
		$login = $parts[0];
		$dominio = $parts[1];
        //consulta dados do usuario
		if (!($usuario = $this->Login->usuario($login, $dominio))) {
            echo json_encode([
                'status' => false,
                'result' => 'Usuário não encontrado.'
            ]);
			return;
        }
		$codificada = $this->Login->codificar($senha);
		if ($usuario['Senha'] != $codificada) {
			echo json_encode([
				'status' => false,
				'result' => 'Senha inválida!'
			]);
			return;
		}
		unset($usuario['Senha']);
		$partes = explode(' ', trim($usuario['Nome']));
		$usuario['Apelido'] = $partes[0] . ' ' . $partes[count($partes) - 1];
		$this->session->set_userdata('Admin', ($usuario['Perfil'] == 1));
		$this->session->set_userdata('Logado', $usuario);
		echo json_encode([
			'status' => true,
			'result' => 'Ok'
		]);
	}

	public function logout()
	{
		$this->session->unset_userdata('Logado');
		redirect('Login');
	}

	public function cadastro()
	{
		$this->load->view('template', ['pagina' => 'home/cadastro']);
	}

	public function insert()
	{
		try {
			$usuario = $this->input->post(NULL, true);
			# Insere usuário
			$usuario['Perfil'] = 2;
			$usuario['Senha'] = $this->Login->codificar($usuario['Senha']);
			$this->Usuario->insert($usuario);
			# Efetua Login
			unset($usuario['Senha']);
			$partes = explode(' ', trim($usuario['Nome']));
			$usuario['Apelido'] = $partes[0] . ' ' . $partes[count($partes) - 1];
			$this->session->set_userdata('Logado', $usuario);
			$this->session->set_userdata('Admin', false);
			# Retorna Sucesso
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

	public function getUsuario()
	{
		echo json_encode($this->session->Logado);
	}

}