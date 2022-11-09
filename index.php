<?php

/**
 * Plugin Name: Bulk Currency Editor for CURCY - Multi Currency for WooCommerce
 * Plugin URI: https://artslabcreatives.com
 * Description: Bulk Currency Editor CURCY is a plugin that uses Multi Currency Plugin, but allows products to be edited
 * Version: 1.0.0
 * Requires at least: 6.1
 * Requires PHP: 7.4
 * Author: Artslab Creatives
 * Author URI: https://artslabcreatives.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://artslabcreatives.com
 * Text Domain: bulk-currency-editor-curcy
 * Domain Path: localization
 *
 */

/*
Bulk Currency Editor for CURCY - Multi Currency for WooCommerce is free
software: you can redistribute it and/or modify it under the terms of
the GNU General Public License as published by the Free Software Foundation,
either version 2 of the License, or any later version.

Bulk Currency Editor for CURCY - Multi Currency for WooCommerce is
distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR
A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Bulk Currency Editor for CURCY - Multi Currency for WooCommerce.
If not, see https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
  exit;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require_once __DIR__ . '/bootstrap/autoload.php';
