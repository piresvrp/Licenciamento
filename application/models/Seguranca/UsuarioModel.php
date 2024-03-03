<?php

class UsuarioModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($fields, $where)
	{
		return $this->db->select($fields)->from('tblUsuario')
			->where($where)->get()->row_array();
	}

	public function lista()
	{
        return $this->db->from('tblUsuario')->get()->result_array();
	}

	public function insert($dados)
	{
		if ($this->get('ID', ['Email' => $dados['Email']])) {
			throw new Exception('E-mail já está cadastrado!');
		}
		$this->db->trans_start();
		$this->set($dados);
		$this->db->insert('tblUsuario');
		$this->db->trans_complete();
		if (!$this->db->trans_status()) {
			throw new Exception('Erro ao tentar inserir os dados!');
		}
	}

	public function update($dados)
	{
		if (!($user = $this->get('ID', ['ID' => $dados['ID']]))) {
			throw new Exception('Usuário não encontrado!');
		}
		if ($this->get('ID', ['Email' => $dados['Email'], 'ID !=' => $user['ID']])) {
			throw new Exception('E-mail já está cadastrado!');
		}
		$this->db->trans_start();
		$this->set($dados);
		$this->db->where($user)
			->update('tblUsuario');
		$this->db->trans_complete();
		if (!$this->db->trans_status()) {
			throw new Exception('Erro ao tentar alterar os dados!');
		}
	}

	public function status($codigo)
	{
		if (!($user = $this->get(['ID', 'Status'], ['ID' => $codigo]))) {
			throw new Exception('Usuário não encontrado!');
		}
		$this->db->trans_start();
		if ($user['Status'] == 'I') {
			$this->db->set(['Status' => 'A']);
		} else {
			$this->db->set(['Status' => 'I']);
		}
		$this->db->where($user)
			->update('tblUsuario');
		$this->db->trans_complete();
		if (!$this->db->trans_status()) {
			throw new Exception('Erro ao tentar alterar os dados!');
		}
	}

	private function set($dados)
	{
		$this->db->set('Status', 'A');
		$this->db->set('Nome', $dados['Nome']);
		$this->db->set('Email', $dados['Email']);
		if (!empty($dados['Perfil'])) {
			$this->db->set('Perfil', $dados['Perfil']);
		}
		if (!empty($dados['Senha'])) {
			$this->db->set('Senha', $dados['Senha']);
		}
	}

}