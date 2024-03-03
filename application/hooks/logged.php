<?php
defined('BASEPATH') or exit('No direct script access allowed');

function logged() {

	$areas = [
		['ID' => 1, 'Perfil' => 1, 'Url' => 'Seguranca'],
		['ID' => 2, 'Perfil' => 1, 'Url' => 'Questionario'],
		['ID' => 3, 'Perfil' => 2, 'Url' => 'Competencia']
	];
	$acessos = [
		['Area' => 1, 'Url' => 'Usuarios'],
		['Area' => 2, 'Url' => 'Perguntas'],
		['Area' => 2, 'Url' => 'Respostas'],
		['Area' => 3, 'Url' => 'Questionario']
	];
	$todos = ['Login', 'Home', 'MeusDados'];

	$ci = &get_instance();
	if (is_null($ci->session->Logado)) {
		if ($ci->router->fetch_class() != 'Login') {
			redirect(base_url('Login'));
		}
	} elseif (!$ci->session->Admin && !in_array($ci->router->fetch_class(), $todos)) {
		$id = NULL;
		$acesso = False;
		foreach ($areas as $item) {
			if ($item['Url'] == $ci->uri->segments[1] && $item['Perfil'] == $ci->session->Logado['Perfil']) {
				$id = $item['ID'];
				break;
			}
		}
		if (is_null($id)) {
			redirect(base_url('Login'));
		}
		foreach ($acessos as $item) {
			if ($item['Area'] == $id && $item['Url'] == $ci->uri->segments[2]) {
				$acesso = True;
				break;
			}
		}
		if (!$acesso) {
			redirect(base_url('Login'));
		}
	}
}