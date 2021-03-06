<?php
// page d'accueil

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire o� se trouve les fichiers templates et le r�p�rtoire o� on met les fichiers compil�s (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Accueil', 'Bienvenue sur FREDI', 'HOME');
page_footer();

$template->set_filenames(array(
	'body' => 'saisit_note_frait.html'));

$template->display('body');
?>