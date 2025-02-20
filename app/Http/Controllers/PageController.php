<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private Collection $todos;
    public function dashboard()
    {
        $this->todos = Todolist::all();
        return view('pages.dashboard.dashboard', [
            "todos" => $this->todos
        ]);
    }
}
