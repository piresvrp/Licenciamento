<?php

class QuestionarioModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function seleciona($fields, $where)
	{
		return $this->db->select($fields)->from('tblQuestionario')
			->where($where)->get()->row_array();
	}

	public function salva($Quest, $Pergs)
	{
		$Qid = $Quest['ID'];
		unset($Quest['ID']);
		$this->db->trans_start();
		if (!empty($Qid)) {
			unset($Quest['Validade']);
			$Resp = $this->db->where(['Questionario' => $Qid])
				->count_all_results('tblResposta');
			if ($Resp > 0) {
				$this->db->set('Validade', date('Y-m-d'))
					->where(['ID' => $Qid])->update('tblQuestionario');
				$Qid = null;
			}
		}
		foreach ($Quest as $campo => $valor)
			$this->db->set($campo, $valor);
		if (empty($Qid)) {
			$this->db->insert('tblQuestionario');
			$Qid = $this->db->insert_id();
		} else
			$this->db->where(['ID' => $Qid])->update('tblQuestionario');
		foreach ($Pergs as $pergunta) {
			$Pid = $pergunta['ID'];
			unset($pergunta['ID']);
			$pergunta['Questionario'] = $Qid;
			foreach ($pergunta as $campo => $valor)
				$this->db->set($campo, $valor);
			if (empty($Pid))
				$this->db->insert('tblPergunta');
			else
				$this->db->where(['ID' => $Pid])->update('tblPergunta');
		}
		$this->db->trans_complete();
		if (!$this->db->trans_status())
			throw new Exception('Erro ao Tentar Gravar o Questionário!');
	}

}