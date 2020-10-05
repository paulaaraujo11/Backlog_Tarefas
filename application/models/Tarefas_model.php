<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas_model extends CI_Model{

	public function pegarTarefas($usuario){
		$this->db->select('*');
		$this->db->where('usuario_tarefa',$usuario);
		return $this->db->get('tarefas')->result();
	}

	public function pegarStatus(){
		$this->db->select('*');
		return $this->db->get('status_tarefa')->result();
	}

	public function pegarDadosTarefa($id_tarefa){
		$this->db->select('*');
		$this->db->where('id_tarefa',$id_tarefa);
		return $this->db->get('tarefas')->result();
	}

	public function inserirTarefa($dados = null){
		if ($dados != NULL):
			$this->db->insert('tarefas',$dados);
		endif;
	}

	public function atualizarTarefa($dados,$id){
		if ($dados != NULL && $id != NULL):
			$this->db->where('id_tarefa',$id);
			$this->db->update('tarefas',$dados);
		endif;
	}

	public function delete($id){
		$this->db->where('id_tarefa', $id);
		$this->db->delete('tarefas');
	}

}