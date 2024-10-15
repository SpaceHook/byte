<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Метод для відображення списку банерів
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    // Метод для відображення форми завантаження банера
    public function create()
    {
        return view('admin.banners.create');
    }

    // Метод для збереження нового банера
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

// Метод для видалення банера
public function destroy($id)
{
$banner = Banner::findOrFail($id);

// Видалення основного зображення, якщо воно існує
if ($banner->image) {
\Storage::disk('public')->delete($banner->image);
}

// Видалення мобільного зображення, якщо воно існує
if ($banner->image_mob) {
\Storage::disk('public')->delete($banner->image_mob);
}

$banner->delete();

return redirect()->route('admin.banners.index')->with('success', 'Банер успішно видалено');
}
}
