<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Active template
|--------------------------------------------------------------------------
|
| The $template['active_template'] setting lets you choose which template 
| group to make active.  By default there is only one group (the 
| "default" group).
|
*/

$config['active_template'] = 'default';

/* FRONT TEMPLATE */
$config['default']['template'] = 'default';
$config['default']['regions'] = array(
   'metas',
   'header',
   'content',
   'sidebar',
   'footer',
   'analytics'
);
$config['default']['parser'] = 'parser';
$config['default']['parser_method'] = 'parse';
$config['default']['parse_template'] = FALSE;

$config['default']['js_path'] = 'assets/js/';
$config['default']['javascripts'] = array();

$config['default']['css_path'] = 'assets/css/';
$config['default']['stylesheets'] = array();

$config['default']['template_regions'] = array('metas','header', 'footer', 'analytics');

