<?php

namespace WPNCEasyWP\Http\Controllers\Dashboard;

use WPNCEasyWP\Http\Checker\Plugins;
use WPNCEasyWP\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return WPNCEasyWP()
            ->view('dashboard.index')
            ->with('plugins', Plugins::boot()->getWillDisabled());
    }
}