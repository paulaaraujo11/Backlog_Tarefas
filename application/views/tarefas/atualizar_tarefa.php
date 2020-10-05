<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$usuario = $_SESSION["usuario logado"]["usuario"];

$tempo_inicio = new DateTime($tarefa[0]->tempo_inicio_tarefa);
$tempo_final = new DateTime($tarefa[0]->tempo_termino_tarefa);
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
 <h2>Atualizar Tarefa</h2>
 <br>
<form method="post" action="<?php echo base_url().'index.php/tarefas/atualizarTarefaExe/'.$usuario['id_usuario'].'/'.$tarefa[0]->id_tarefa?>">
	<h3>Título da Tarefa</h3>
	<input type="text" class="form-control" name="titulo" value="<?php echo $tarefa[0]->titulo_tarefa ?>"><br>
	<h3>Descrição da Tarefa</h3>
	<input type="texto" class="form-control" name="descricao" value="<?php echo $tarefa[0]->descricao_tarefa ?>"><br>
	<h3>Data e hora de início</h3>
	<input type="datetime-local" class="form-control" name="tempo_inicio"  value = "<?php echo $tempo_inicio->format('Y-m-d\TH:i:s'); ?>" class="date"><br>
	<h3>Data e hora de Termino</h3>
	<input type="datetime-local" class="form-control" name="tempo_termino" value = "<?php echo $tempo_final->format('Y-m-d\TH:i:s'); ?>"><br>
	<label>Status da Tarefa:<br>
			<select name="status" value="<?php echo $tarefa[0]->status_tarefa ?>">
			<?php
				foreach ($status as $s){	
					if($s->id_status == $tarefa[0]->status_tarefa){
						$selected = 'selected';
					}else{
						$selected = '';
					}
					?>
			<option <?php echo $selected?> value="<?php echo $s->id_status ?>"> <?php echo $s->descricao_status ?></option>
			<?php  }
		?>
			</select></label>

	<br>
	<button class="btn btn-primary">Atualizar</button>
</form>