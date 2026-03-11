<?php
/**
 * Plugin Name: Ele Addons
 * Description: Ele Addons for Elementor 
 * Plugin URI: https://simple-contact-form-management.com
 * Version: 1.0.0
 * Author: Fardin Ahmed
 * Author URI: https://github.com/devfardin
 * Text Domain: ele-addons
 * Requires Plugins: elementor
 */

namespace Fardin\EleAddons;

if (!defined("ABSPATH")) {
    exit;
}

if (! class_exists(EleAddons::class) && is_readable(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}
class_exists(EleAddons::class) && EleAddons::instance()->init();