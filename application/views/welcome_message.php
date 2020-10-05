<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		
		
<div class="container">
	<ul class="nav nav-tabs mt-3 mb-5">
		
		<li class="nav item">
			<a class="nav-link" href="<?php echo base_url() ?>index.php">HOME</a>
			<a class="nav-link" href="<?php echo base_url() ?>index.php/usuarios/cadastrarNovoUsuario">Novo Cadastro</a>
		</li>
	</ul>
</div>

<div id="body" class="container">
 <h2>Fazer Login</h2>
<form  method="post" action="<?php echo base_url() ?>index.php/usuarios/autenticar">
	<h3>LOGIN</h3>
	<input type="text" class="form-control" name="login" required><br>
	<h3>SENHA</h3>
	<input type="password" class="form-control" name="senha" required><br>
	<button class="btn btn-primary btn-block">Enviar</button>
</form>
<br>
<div class="container">

<?php if($this->session->flashdata("danger")) : ?>
	<p class="alert alert-danger"> <?= $this->session->flashdata("danger") ?></p>
<?php  endif ?>
</div>

</body>
</html>
