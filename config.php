<?php

// CONSTANTES
define('base_url','http://citas_mvc.test/');
define('base_app', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']));

function redirect($url=''){
	if(!empty($url)) {
		header('Location: ' . $url);
	}
}

function slugify($texto) {
	// Convertir el texto a minúsculas
	$slug = strtolower($texto);

	// Reemplazar caracteres especiales y acentos
	$slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);

	// Eliminar caracteres no alfanuméricos y reemplazar espacios por guiones
	$slug = preg_replace('/[^a-z0-9-]/', '-', $slug);

	// Eliminar guiones duplicados
	$slug = preg_replace('/-+/', '-', $slug);

	// Eliminar guiones al inicio y al final
	$slug = trim($slug, '-');

	return $slug;
}

function setActive($path)
{
	return $path == $_SERVER["REQUEST_URI"] ? 'active' : '';
}

?>