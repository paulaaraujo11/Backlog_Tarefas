<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$usuario = $_SESSION["usuario logado"]["usuario"];
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Backlog Ômega</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/estilo.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/form.css"/>
</head>
<body>
	<div id="interface">
		<header id= "cabecalho">	
			<h1><center>Backlog Ômega</center></h1>	
		</header>
		
		
<?php if($this->session->userdata("usuario logado")) : ?>
		
<div class="container">
	<ul class="nav nav-tabs mt-3 mb-5">
		
		<li class="nav item">
			<a class="nav-link" <?php echo '<td><a href="'.base_url().'index.php/tarefas/index/'.$usuario['id_usuario'].'"' ?>>Tarefas</a>
			<a class="nav-link" <?php echo '<td><a href="'.base_url().'index.php/usuarios/alterarUsuario/'.$usuario['id_usuario'].'"' ?>>Alterar dados de usuário</a>
			</li>	
	</ul>
</div>

<div class="float-right"><?php echo('Bem vindo '.$usuario["login_usuario"]); ?></div><br>
<div class="float-right"><?= anchor('/', 'Sair', ['class' => 'btn btn-primary']); ?></div><br>

<?php endif ?>


<div id="body" class="container">
 <h2>Cadastrar Nova Tarefa</h2>
 <br>
<form method="post" action="<?php echo base_url().'index.php/tarefas/novaTarefaExe/'.$usuario['id_usuario']?>">
	<h3>Título da Tarefa</h3>
	<input type="text" class="form-control" name="titulo"><br>
	<h3>Descrição da Tarefa</h3>
	<input type="texto" class="form-control" name="descricao"><br>
	<h3>Data e hora de início</h3>
	<input type="datetime-local" class="form-control" name="tempo_inicio"><br>
	<h3>Data e hora de Termino</h3>
	<input type="datetime-local" class="form-control" name="tempo_termino"><br>
	<label>Status da Tarefa:<br>
			<select name="status">
			<?php
				foreach ($status as $s){	?>
			<option value="<?php echo $s->id_status ?>"> <?php echo $s->descricao_status ?></option>
			<?php  }
		?>
			</select></label>

	<br>
	<button class="btn btn-primary">Cadastrar</button>
	<button class="btn btn-danger" type="reset">Limpar Campos</button>
</form>