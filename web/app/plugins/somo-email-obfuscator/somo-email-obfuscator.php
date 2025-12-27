<?php
/**
 * Plugin Name: Somo Email Obfuscator
 * Description: Obfuscates email addresses to protect them from spambots using a custom Gutenberg block.
 * Version: 1.0.0
 * Author: Somo
 * Text Domain: somo-email-obfuscator
 */

defined('ABSPATH') || exit;

function somo_email_obfuscator_init()
{
    register_block_type(__DIR__);
}
add_action('init', 'somo_email_obfuscator_init');
