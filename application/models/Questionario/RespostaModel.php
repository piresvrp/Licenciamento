<?php

class RespostaModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function salva($Resp, $Itns)
	{
		$this->db->trans_start();
		foreach ($Resp as $campo => $valor)
			$this->db->set($campo, $valor);
		$this->db->insert('tblResposta');
		$Rid = $this->db->insert_id();
		foreach ($Itns as $item) {
			$item['Resposta'] = $Rid;
			foreach ($item as $campo => $valor)
				$this->db->set($campo, $valor);
			$this->db->insert('tblItem');
		}
		$this->db->trans_complete();
		if (!$this->db->trans_status())
			throw new Exception('Erro ao Tentar Gravar as Respostas!');
	}

	public function lista()
	{
		$campos = "R.ID, FORMAT(R.DataHora, 'dd/MM/yyyy HH:mm', 'pt-BR') AS DataHora, R.Empreendimento,
			U.Nome, CASE R.Competencia WHEN 'F' THEN 'Federal' ELSE 'Estadual' END AS Competencia";
		return $this->db->select($campos)->from('tblUsuario U')
			->join('tblResposta R', 'U.ID = R.Usuario')->get()->result_array();
	}

	public function consulta($Uid)
	{
		$campos = "R.ID, FORMAT(R.DataHora, 'dd/MM/yyyy HH:mm', 'pt-BR') AS DataHora,
			R.Empreendimento, U.Nome AS Usuario, Q.Federal, Q.Estadual,
			CASE R.Competencia WHEN 'F' THEN 'Federal' ELSE 'Estadual' END AS Competencia";
		$Resp = $this->db
			->select($campos)
			->from('tblUsuario U')
			->join('tblResposta R', 'U.ID = R.Usuario')
			->join('tblQuestionario Q', 'Q.ID = R.Questionario')
			->where("U.ID = {$Uid} AND R.ID = (SELECT MAX(ID) FROM tblResposta WHERE Usuario = U.ID)")
			->get()->row_array();
		if ($Resp) {
			$campos = "P.Enunciado AS Pergunta, CASE I.Valor WHEN 'S' THEN 'SIM' ELSE 'NÃO' END AS Valor";
			$Resp['Respostas'] = $this->db->select($campos)
				->from('tblPergunta P')->join('tblItem I', 'P.ID = I.Pergunta')
				->where(['I.Resposta' => $Resp['ID']])->order_by('P.Numero')->get()->result_array();
		}
		return $Resp;
	}

	public function seleciona($id)
	{
		$campos = "FORMAT(R.DataHora, 'dd/MM/yyyy HH:mm', 'pt-BR') AS DataHora,
			R.Empreendimento, U.Nome AS Usuario, Q.Federal, Q.Estadual,
			CASE R.Competencia WHEN 'F' THEN 'Federal' ELSE 'Estadual' END AS Competencia";
		$Resp = $this->db
			->select($campos)
			->from('tblUsuario U')
			->join('tblResposta R', 'U.ID = R.Usuario')
			->join('tblQuestionario Q', 'Q.ID = R.Questionario')
			->where(['R.ID' => $id])->get()->row_array();
		if ($Resp) {
			$campos = "P.Enunciado AS Pergunta, CASE I.Valor WHEN 'S' THEN 'SIM' ELSE 'NÃO' END AS Valor";
			$Resp['Respostas'] = $this->db->select($campos)
				->from('tblPergunta P')->join('tblItem I', 'P.ID = I.Pergunta')
				->where(['I.Resposta' => $id])->order_by('P.Numero')->get()->result_array();
		}
		return $Resp;
	}

}