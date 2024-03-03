<?php

class PerguntaModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lista($where = null)
	{
        return $this->db->from('tblPergunta')
			->where($where)->order_by('Numero')
			->get()->result_array();
	}

}