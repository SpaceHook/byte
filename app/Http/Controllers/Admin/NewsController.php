<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Новина успішно додана');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }


/**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news_images', 'public');
        $news->image = $imagePath;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Новина успішно оновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Новина успішно видалена');
    }
}
