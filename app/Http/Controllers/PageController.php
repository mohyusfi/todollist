<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $todos = Todolist::all();
        return view('pages.dashboard.dashboard', [
            "todos" => $todos
        ]);
    }
}
