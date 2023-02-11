<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Displays a dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dataView = ['title' => TextLayoutTitle("dashboard")];
        return view('admin.dashboard.index', $dataView);
    }
}
