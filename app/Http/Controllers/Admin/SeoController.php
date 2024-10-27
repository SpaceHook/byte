<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoText;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seoTexts = SeoText::all();
        return view('admin.seo.index', compact('seoTexts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingSeoText = SeoText::where('page', $request->input('page'))->first();

        if ($existingSeoText) {
            return redirect()->back()->withErrors('SEO-тексти для цієї сторінки вже існують.');
        }

        SeoText::create($request->all());

        return redirect()->route('admin.seo.index')->with('success', 'SEO-тексти додані');
    }


    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seoText = SeoText::findOrFail($id);

        return view('admin.seo.edit', compact('seoText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seoText = SeoText::findOrFail($id);

        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $seoText->update($request->all());

        return redirect()->route('admin.seo.index')->with('success', 'SEO-текст успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seoText = SeoText::findOrFail($id);
        $seoText->delete();

        return redirect()->route('admin.seo.index')->with('success', 'SEO-текст успішно видалено');
    }

    public function about()
    {
        // Отримуємо SEO-тексти для сторінки "Про нас"
        $seoText = SeoText::where('page', 'about')->first();
        return view('static.about', compact('seoText'));
    }
}
