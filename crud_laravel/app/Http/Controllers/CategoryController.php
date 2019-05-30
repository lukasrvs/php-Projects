<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $c = Category::all();

        return view('categories.index', ['categories' => $c]);
    }

    public function new()
    {
        return view('categories.new');
    }

    public function create(Request $request)
    {
        $c = new Category();
        $c->name = $request->input('name');
        $c->save();

        return redirect('categories');
    }
}
