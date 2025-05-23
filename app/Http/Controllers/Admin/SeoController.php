<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoText;
use Illuminate\Validation\Rule;

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
            $request->validate([
        'page' => 'required|string|unique:seo_texts,page',
        'meta_title' => 'required|array',
        'meta_description' => 'nullable|array',
        'meta_keywords' => 'nullable|array',
        ]);

        SeoText::create([
        'page' => $request->input('page'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'meta_keywords' => $request->input('meta_keywords'),
        ]);

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
        'page' => ['required', 'string', Rule::unique('seo_texts')->ignore($seoText->id)],
        'meta_title' => 'required|array',
        'meta_description' => 'nullable|array',
        'meta_keywords' => 'nullable|array',
        ]);

        $seoText->update([
        'page' => $request->input('page'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'meta_keywords' => $request->input('meta_keywords'),
        ]);

        return redirect()->route('admin.seo.index')->with('success', 'SEO-текст оновлено');
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
