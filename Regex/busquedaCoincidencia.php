<?php

/* 
 https://jarroba.com/busqueda-de-patrones-expresiones-regulares/
 */

$listaTextos = array(
		'¡Hola Mundo!',
		'miCorreo@gmail.com',
		'La teoría de “Pattern Machine” dice…',
		'correoFalso@yahoo.es',
		'En un lugar de la Mancha, cuyo nombre no quiero acordarme…',
		'+34 91 123 456 789',
		'estoNOesUnCorreoNoTieneArroba.com ',
		'RaMoN@jarroba.com',
		'Calle Alcalá 12345 Madrid, Madrid'
	);

	$patron = '/[A-Za-z]+@[a-z]+\.[a-z]+/';

	foreach ($listaTextos as $texto) {
		$esCoincidente = preg_match($patron, $texto);

		if ($esCoincidente) {
			echo '<br/>Correo reconocido: ' . $texto;
		}