<?php
function mit_form_system_theme_settings_alter(&$form, &$form_state) {

  /**
   * Breadcrumb settings
   * Copied from Zen
   */
  $form['breadcrumb'] = array(
   '#type' => 'fieldset',
   '#title' => t('Breadcrumb'),
  );
  $form['breadcrumb']['breadcrumb_display'] = array(
   '#type' => 'select',
   '#title' => t('Display breadcrumb'),
   '#default_value' => theme_get_setting('breadcrumb_display'),
   '#options' => array(
     'yes' => t('Yes'),
     'no' => t('No'),
   ),
  );
  $form['breadcrumb']['breadcrumb_separator'] = array(
   '#type'  => 'textfield',
   '#title' => t('Breadcrumb separator'),
   '#description' => t('Text only. Dont forget to include spaces.'),
   '#default_value' => theme_get_setting('breadcrumb_separator'),
   '#size' => 8,
   '#maxlength' => 10,
  );
  $form['breadcrumb']['breadcrumb_home'] = array(
   '#type' => 'checkbox',
   '#title' => t('Show the homepage link in breadcrumbs'),
   '#default_value' => theme_get_setting('breadcrumb_home'),
  );
  $form['breadcrumb']['breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_trailing'),
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
  );
  $form['breadcrumb']['breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_title'),
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
  );

  $form['libraries'] = array(
    '#type'  => 'fieldset',
    '#title' => t('Additional Libraries'),
  );
  $form['libraries']['mit_shim'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('html5 Shim'),
    '#default_value' => theme_get_setting('mit_shim'),
    '#description'   => t('Ajouter html5 shim au Header, compatibilité IE 9 et -')
  );
 $form['libraries']['mit_resp'] = array(
     '#type'  => 'textfield',
    '#title'         => t('Theme responsive'),
    '#default_value' => theme_get_setting('mit_resp'),
    '#description'   => t('contenu de la balise Viewport'),
    '#size' => 50,
    '#maxlength' => 50,
  );

}