<?php
//Ajouter une css Reset dans le groupe systeme
function mutualite_preprocess_html(&$vars) {
	drupal_add_css(drupal_get_path('theme', 'base') . '/css/reset.css', array('group' => CSS_SYSTEM, 'every_page' => TRUE));
	
	//ajouter google font
	drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic', array('type' => 'external'));
	
    //gestion du viweport pour le responsive
	$viewport = array(
	  '#tag' => 'meta',
	  '#attributes' => array(
		'name' => 'viewport',
		'content' => 'width=768px',
	  ),
	);
    drupal_add_html_head($viewport, 'viewport');
    
    //ajouter icone apple touch
    $appleIcon = array('#tag' => 'link', '#attributes' => array('href' => 'http://mutualit.org/sites/all/themes/mutualite/images/favicon.ico', 'rel' => 'apple-touch-icon'),);  
    drupal_add_html_head($appleIcon, 'apple-touch-icon');
}

?>
