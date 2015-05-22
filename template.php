<?php
/**
 * Changes the default meta content-type tag to the shorter HTML5 version
 */
function mit_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

//Ajouter une css Reset dans le groupe systeme
function mit_preprocess_html(&$vars) {
    // Ensure that the $vars['rdf'] variable is an object.
  if (!isset($vars['rdf']) || !is_object($vars['rdf'])) {
    $vars['rdf'] = new StdClass();
  }

  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf']->version = 'version="HTML+RDFa 1.1"';
    $vars['rdf']->namespaces = $vars['rdf_namespaces'];
    $vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
  } else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf']->version = '';
    $vars['rdf']->namespaces = '';
    $vars['rdf']->profile = '';
  }
  
    
    //Ajouter une CSS de resset
    drupal_add_css(drupal_get_path('theme', 'base') . '/css/reset.css', array('group' => CSS_SYSTEM, 'every_page' => TRUE));
	
	//ajouter une google font
	//drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic', array('type' => 'external'));
	
    $respset = theme_get_setting('mit_resp');
    if ($respset !='') { //Ajouter la gestion du viweport pour le responsive
        $viewport = array(
          '#tag' => 'meta',
          '#attributes' => array(
            'name' => 'viewport',
            'content' => $respset,
          ),
        );
        drupal_add_html_head($viewport, $respset);
    }
    // use the $html5shiv variable in their html.tpl.php
    $element = array(  
        'element' => array(
        '#tag' => 'script',
        '#value' => '',
        '#attributes' => array(
          'src' => '//html5shiv.googlecode.com/svn/trunk/html5.js',
         ),
       ),
    );

     $shimset = theme_get_setting('mit_shim');
     $script = theme('html_tag', $element);
     //If the theme setting for adding the html5shim is checked, set the variable.
     if ($shimset == 1) { $vars['html5shim'] = "\n<!--[if lt IE 9]>\n" . $script . "<![endif]-->\n"; }
}

/**
 * Changes the search form to use the HTML5 "search" input attribute
 */
function mit_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

function mit_breadcrumb($vars) {
  $breadcrumb = $vars['breadcrumb'];
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('breadcrumb_display');
  if ($show_breadcrumb == 'yes') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $separator = filter_xss(theme_get_setting('breadcrumb_separator'));
      $trailing_separator = $title = '';

      // Add the title and trailing separator
      if (theme_get_setting('breadcrumb_title')) {
        if ($title = drupal_get_title()) {
          $trailing_separator = $separator;
        }
      }
      // Just add the trailing separator
      elseif (theme_get_setting('breadcrumb_trailing')) {
        $trailing_separator = $separator;
      }

      // Assemble the breadcrumb
      return implode($separator, $breadcrumb) . $trailing_separator . $title;
    }
  }
  // Otherwise, return an empty string.
  return '';
}