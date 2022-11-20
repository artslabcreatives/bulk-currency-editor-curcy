<?php

namespace BulkCurrencyEditorCURCY\Http\Controllers\Dashboard;

use BulkCurrencyEditorCURCY\Http\Controllers\Controller;

class DashboardController extends Controller
{

  public function index()
  {
    return BulkCurrencyEditorCURCY()->view( 'dashboard.index' );
  }
}