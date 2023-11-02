<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'terbaru'=> News::latest()->take(10)->get(),
            'weekly' => News::latest()->take(5)->get(),
            'newest' => News::latest()->take(4)->get(),
            'newsamping' => News::latest()->take(5)->get(),
            'category' => Category::all()

        ]);
    }
}
