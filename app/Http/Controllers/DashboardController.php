<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the todos for the authenticated user
        $todos = Todo::where('user_id', auth()->id())->get();
        return view('dashboard', compact('todos'));
    }
}
