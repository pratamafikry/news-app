<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news', [
            "posts" => News::latest()->get(4),
        ]);
    }

    public function show(News $news)
    {
        $news->visit();
        $update = [
            'count' => $news->count + 1,
        ];
        $news->update($update);
        return view('newsdetail', [
            "post" => $news
        ]);
    }
}
