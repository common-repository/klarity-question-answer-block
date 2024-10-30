<?php
/**
 * Plugin Name: Klarity question answer block
 * Plugin URI: https://github.com/Klarityorg/wp-plugin-question-answer
 * Description: Klarity question answer block
 * Author: Klarity
 * Author URI: https://github.com/Klarityorg
 * Version: 1.1.1
 * License: MIT
 *
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
