<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    protected $panelViewPath = 'panel.';

    public function index()
    {
        return view('home');
    }
}
