<?php 

	session_start();

	$usuario_aut = false;
	$usuario_id = null;
	$user_perfil = null;

	$perfil = array(1 => 'adm', 2 => 'user');

	$usuarios_app = array(
		array('id' => 1,'email' => 'teste@teste.com.br', 'senha' => '123', 'perfil_id' => 1),
		array('id' => 2,'email' => 'adm@teste.com.br', 'senha' => '123','perfil_id' => 1),
		array('id' => 3,'email' => 'joao@teste.com.br', 'senha' => '123', 'perfil_id' => 2),
		array('id' => 4,'email' => 'maria@teste.com.br', 'senha' => '123', 'perfil_id' => 2),
	);

	foreach ($usuarios_app as $user) {
		
		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			$usuario_aut = true;
			$usuario_id = $user['id'];
			$user_perfil = $user['perfil_id'];
		}
	}

	if ($usuario_aut == true) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $user_perfil;
		header('Location: home.php');
	} else{
		$_SESSION['autenticado'] = 'NÃO';
		header('Location: index.php?login=erro');
	}

 ?>