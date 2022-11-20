<?php

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
  'bulk_currency_editor_curcy_slug_menu' => [
    "page_title" => "Multi Currency Bulk Editor",
    "menu_title" => "Bulk Currency Editor",
    'capability' => 'read',
    'icon'       => 'dashicons-lightbulb',
    'items'      => [
      [
        "page_title" => "Bulk Edit Regular Prices",
        "menu_title" => "Bulk Edit Regular Prices",
        'capability' => 'read',
        'route'      => [
          'get' => 'ProductEditor@index',
          'post' => 'ProductEditor@store',
          'update' => 'ProductEditor@update',
          'delete' => 'ProductEditor@destroy',
        ],
      ],
      [
        "page_title" => "Bulk Edit Sale Prices",
        "menu_title" => "Bulk Edit Sale Prices",
        'capability' => 'read',
        'route'      => [
          'get' => 'SaleEditor@index',
          'post' => 'SaleEditor@store',
          'update' => 'SaleEditor@update',
          'delete' => 'SaleEditor@destroy',
        ],
      ],
    ]
  ]
];
