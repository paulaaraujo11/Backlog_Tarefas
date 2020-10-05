<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Usuarios_model','usuarios_model');
	}


	public function cadastrarNovoUsuario(){
		
		$this->load->view('usuarios/novo_usuario');
	}

	public function entrarSistema(){
		
		$this->load->view('menu_principal');
	}

	public function novoUsuarioExe(){

		$dados = array('login_usuario' => $this->input->post('login'),
               		   'senha_usuario' => md5($this->input->post('senha'))
               		   );
		$this->usuarios_model->inserirUsuario($dados);
		redirect("/");
		
	}

	public function autenticar(){
		$login = $this->input->post('login');
        $senha = md5($this->input->post('senha'));
		$data['usuario'] = $this->usuarios_model->autenticarUsuario($login,$senha);

		if($data['usuario']){

			$this->session->set_userdata("usuario logado",$data);
			$this->session->set_flashdata("sucess", "Logado com sucesso!");
			$this->load->view("menu_principal",$data);
		}else{
			$this->session->set_flashdata("danger", "Login e/ou senha inválido(s)!");
			redirect("/");
		}
	}


	public function alterarUsuario(){
		$id_usuario = $this->uri->segment(3);
		$data['usuario'] = $this->usuarios_model->pegarDadosUsuario($id_usuario);
		$this->load->view('usuarios/atualizar_usuario.php',$data);
	}

	public function alterarUsuarioExe(){
		$id_usuario = $this->uri->segment(3);
		$dados = array('login_usuario' => $this->input->post('login'),
               		   'senha_usuario' => md5($this->input->post('senha'))
               		   );
		$this->usuarios_model->atualizarUsuario($dados,$id_usuario);
		redirect("tarefas/index/".$id_usuario);
	}
}
