<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        // $this->middleware('auth')->except(['index', 'produtos', 'categorias']);
        // $this->middleware('auth')->only(['index', 'produtos', 'categorias']);
        // Colocar auth antes de acessar certas paginas
    }

    public function index(){
        return view('admin.dashboard');
    }
}
