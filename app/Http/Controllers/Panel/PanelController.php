<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    protected $panelViewPath = "panel.";
    
    public function index()
    {
        return view('home');
    }
}
