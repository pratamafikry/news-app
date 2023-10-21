<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.news', [
            'posts' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.news.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:5000',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('news-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        News::create($validatedData);

        return redirect('/dashboard/news')->with('success', 'Berita baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('dashboard.news.show', [
            'post' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', [
            'post' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:5000',
            'body' => 'required',
        ];

        if($request->slug != $news->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('news-image');
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        News::where('id', $news->id)->update($validatedData);

        return redirect('/dashboard/news')->with('success', 'Berita berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if($news->image) {
            Storage::delete($news->image);
        }

        News::destroy($news->id);

        return redirect('/dashboard/news')->with('success', 'Berita berhasil dihapus');
    }
}
