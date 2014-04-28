<?php
	require('class.executePhoto.php');

	// Ejemplo de ejecución arbitraria cambio contraseña:
 	$param = array('password'	=> '123456',
 				   'repassword'	=> '123456',
 				   'url'  		=> '',
 				   'avatar'		=> '');

	executePhoto::redirect_post('https://secure.publico.es/comunidad/editar-perfil/do_editar.php', $param);
?>