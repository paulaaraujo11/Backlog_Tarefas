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
<br>
<?php if($this->session->flashdata("sucess")) : ?>
	<p class="alert alert-success"> <?= $this->session->flashdata("sucess") ?></p>
<?php  endif ?>

</div>

</body>
</html>