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
	<h2><center>Lista de Tarefas</center></h2>
</div>

<a href="<?php echo base_url() ?>index.php/tarefas/novaTarefa"><input type="button" class="btn btn-primary" value="Cadastrar Nova Tarefa"/></a>
		<div class="container">
			<div class="row">
				<table class="table table-bordered">

					<thead>
						<tr>
							<th class="text-center">Código</th>
							<th class="text-center">Título</th>
							<th class="text-center">Descrição</th>
							<th class="text-center">Tempo Inicio</th>
							<th class="text-center">Tempo Término</th>
							<th class="text-center">Status</th>
							<th class="text-center">Ações</th>
						</tr>
					</thead>

					<?php
					 	$contador = 0;
					 	foreach ($tarefas as $tarefa){
					 		echo '<tr>';
					 		echo '<td>'.$tarefa->id_tarefa.'</td>';
					 		echo '<td>'.$tarefa->titulo_tarefa.'</td>';
					 		echo '<td>'.$tarefa->descricao_tarefa.'</td>';
					 		echo '<td>'.$tarefa->tempo_inicio_tarefa.'</td>';
					 		echo '<td>'.$tarefa->tempo_termino_tarefa.'</td>';
					 		foreach ($status as $statu) {
								if ($statu->id_status == $tarefa->status_tarefa):
									 $sts = $statu->descricao_status;
								endif;
							}

					 		echo '<td>'.$sts.'</td>';
					 		echo '<td><a href="'.base_url().'index.php/tarefas/atualizar/'.$usuario["id_usuario"].'/'.$tarefa->id_tarefa.'"><input type="button" class="btn btn-info" value="Atualizar"/></a><a href="'.base_url().'index.php/tarefas/apagar/'.$usuario["id_usuario"].'/'.$tarefa->id_tarefa.'"><input type="button" class="btn btn-danger" value="Excluir"/></a></td>';
					 	$contador++;
					 	}
					?>
				</table>

				<div class="row">
					<div class="col-md-12">
						Total de Tarefas : <?php echo $contador ?>
					</div>
				</div>
			</div>	

</div>
</body>
</html>