<?php

/**
 * Configuration for Assetor library
 */

/**
 * Set version of css/js to force browser reload assets
 */
$config['version'] = '1';




/**
 * CSS folder relative to the main index.php;
 */
$config['css_folder'] = 'assets/css/';

/**
 * LESS folder relative to the main index.php. Leave blank if the folder is the same as the css folder
 */
$config['less_folder'] = '';

/**
 * LESS compiler folder location relative to the application folder
 */
$config['lessphp_folder'] = 'third_party/lessphp/';


/**
 * Compressed CSS folder relative to the main index.php. Leave blank if the folder is the same as $config['css_folder']
 */
$config['css_min_folder'] = 'assets/css/min/';



/**
 * Use Google's Closure Compiler for js compression
 */
$config['gcc'] = FALSE;

/**
 * If $config['gcc'] is set to TRUE, choose the level of compilation:
 * WHITESPACE_ONLY: only remove whitespaces and new lines
 * SIMPLE_OPTIMIZATIONS: do basic optimisations to the script
 * ADVANCED_OPTIMIZATIONS: do advanced optimisations
 * For more details go to: https://developers.google.com/closure/compiler/docs/api-ref
 */
$config['gcc_level'] = 'WHITESPACE_ONLY';

/**
 * JS folder relative to the main index.php
 */
$config['js_folder'] = 'assets/js/';


/**
 * Compressed JS folder relative to the main index.php. Leave blank if the folder is the same as $config['js_folder']
 */
$config['js_min_folder'] = 'assets/css/min/';
