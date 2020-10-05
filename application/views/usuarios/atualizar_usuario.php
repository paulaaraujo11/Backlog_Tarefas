<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $senha = md5($usuario[0]->senha_usuario);
 
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
			<a class="nav-link" <?php echo '<td><a href="'.base_url().'index.php/tarefas/index/'.$usuario[0]->id_usuario.'"' ?>>Tarefas</a>
			<a class="nav-link" <?php echo '<td><a href="'.base_url().'index.php/usuarios/alterarUsuario/'.$usuario[0]->id_usuario.'"' ?>>Alterar dados de usuário</a>
			</li>	
	</ul>
</div>

<div class="float-right"><?php echo('Bem vindo '.$usuario[0]->login_usuario); ?></div><br>
<div class="float-right"><?= anchor('/', 'Sair', ['class' => 'btn btn-primary']); ?></div><br>

<?php endif ?>


<div id="body" class="container">
 <h2>Atualizar Dados de Usuário</h2>
 <br>
<form method="post" action="<?php echo base_url().'index.php/usuarios/alterarUsuarioExe/'.$usuario[0]->id_usuario?>">
	<h3>LOGIN</h3>
	<input type="text" class="form-control" name="login"  value="<?php echo $usuario[0]->login_usuario ?>" required><br>
	<h3> NOVA SENHA</h3>
	<input type="password" class="form-control" name="senha"  required><br>
	<button class="btn btn-primary btn-block">Enviar</button>
</form>