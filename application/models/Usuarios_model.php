<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{

	public function inserirUsuario($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('usuarios',$dados);
		endif;
	}

	public function autenticarUsuario($login,$senha){
		$this->db->where('login_usuario',$login);
		$this->db->where('senha_usuario',$senha);
		$usuario = $this->db->get('usuarios')->row_array();
		return $usuario;
	}

	public function pegarDadosUsuario($id_usuario){
		$this->db->select('*');
		$this->db->where('id_usuario',$id_usuario);
		return $this->db->get('usuarios')->result();
	}

	public function atualizarUsuario($dados,$id){
		if ($dados != NULL && $id != NULL):
			$this->db->where('id_usuario',$id);
			$this->db->update('usuarios',$dados);
		endif;
	}
}