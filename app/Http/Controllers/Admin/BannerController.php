<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all()->reverse();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|image|max:2048',
        'image_mob' => 'nullable|image|max:2048', // Додаємо валідацію для мобільного зображення
        ]);

        $banner = new Banner();

        // Збереження основного зображення
        if ($request->hasFile('image')) {
        $banner->image = $request->file('image')->store('banners', 'public');
        }

        // Збереження мобільного зображення
        if ($request->hasFile('image_mob')) {
        $banner->image_mob = $request->file('image_mob')->store('banners/mobile', 'public');
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Банер успішно додано');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Видалення основного зображення, якщо воно існує
        if ($banner->image) {
            \Storage::disk('public')->delete($banner->image);
        }

        if ($banner->image_mob) {
            \Storage::disk('public')->delete($banner->image_mob);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Банер успішно видалено');
    }

    // Метод для відображення форми редагування банера
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    // Метод для оновлення банера
    public function update(Request $request, $id)
    {
        $request->validate([
        'image' => 'nullable|image|max:2048',  // Не обов'язково завантажувати нове зображення
        'image_mob' => 'nullable|image|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        // Оновлення заголовку, якщо є
        if ($request->filled('title')) {
        $banner->title = $request->input('title');
        }

        // Оновлення основного зображення
        if ($request->hasFile('image')) {
        if ($banner->image) {
        \Storage::disk('public')->delete($banner->image);  // Видалити старе зображення
        }
        $banner->image = $request->file('image')->store('banners', 'public');
        }

        // Оновлення мобільного зображення
        if ($request->hasFile('image_mob')) {
        if ($banner->image_mob) {
        \Storage::disk('public')->delete($banner->image_mob);  // Видалити старе мобільне зображення
        }
        $banner->image_mob = $request->file('image_mob')->store('banners/mobile', 'public');
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Банер успішно оновлено');
    }
}
