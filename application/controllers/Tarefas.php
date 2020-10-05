<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Tarefas_model','tarefas_model');
	}

	public function index(){
		$id_usuario = $this->uri->segment(3);
		$data['status'] = $this->tarefas_model->pegarStatus();
        $data['tarefas'] = $this->tarefas_model->pegarTarefas($id_usuario);
		$this->load->view('tarefas/index.php',$data);
	}

	public function novaTarefa(){
		$data['status'] = $this->tarefas_model->pegarStatus();
		$this->load->view('tarefas/nova_tarefa.php',$data);

	}
	
	public function novaTarefaExe(){
		$id_usuario = $this->uri->segment(3);
		$dados = array('titulo_tarefa' => $this->input->post('titulo'),
               		   'descricao_tarefa' => $this->input->post('descricao'),
               		   'tempo_inicio_tarefa' => $this->input->post('tempo_inicio'),
               		   'tempo_termino_tarefa' => $this->input->post('tempo_termino'),
               		   'usuario_tarefa' => $id_usuario,
               		   'status_tarefa' => $this->input->post('status'),
               		   
               		   );
		$this->tarefas_model->inserirTarefa($dados);
		redirect("tarefas/index/".$id_usuario);
	}

	public function atualizar(){
		$id_tarefa = $this->uri->segment(4);
		$data['tarefa'] = $this->tarefas_model->pegarDadosTarefa($id_tarefa);
		$data['status'] = $this->tarefas_model->pegarStatus();
		$this->load->view('tarefas/atualizar_tarefa.php',$data);

	}

	public function atualizarTarefaExe(){
		$id_usuario = $this->uri->segment(3);
		$id_tarefa = $this->uri->segment(4);
		$dados = array('titulo_tarefa' => $this->input->post('titulo'),
               		   'descricao_tarefa' => $this->input->post('descricao'),
               		   'tempo_inicio_tarefa' => $this->input->post('tempo_inicio'),
               		   'tempo_termino_tarefa' => $this->input->post('tempo_termino'),
               		   'usuario_tarefa' => $id_usuario,
               		   'status_tarefa' => $this->input->post('status'),
               		   
               		   );
		$this->tarefas_model->atualizarTarefa($dados,$id_tarefa);
		redirect("tarefas/index/".$id_usuario);
	}

	public function apagar(){
		$id_usuario = $this->uri->segment(3);
		$id_tarefa = $this->uri->segment(4);
		$this->tarefas_model->delete($id_tarefa);
		redirect("tarefas/index/".$id_usuario);
	}
}
