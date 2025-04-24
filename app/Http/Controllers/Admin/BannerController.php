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
    'translations.*.image' => 'required|image|max:2048',
    'translations.*.image_mob' => 'nullable|image|max:2048',
    ]);

    $banner = Banner::create();

    foreach (['ua', 'sk', 'ru'] as $locale) {
    $image = $request->file("translations.$locale.image")?->store("banners/$locale", 'public');
    $imageMob = $request->file("translations.$locale.image_mob")?->store("banners/$locale/mobile", 'public');

    $banner->translations()->create([
    'locale' => $locale,
    'image' => $image,
    'image_mob' => $imageMob,
    ]);
    }

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
'translations.*.image' => 'nullable|image|max:2048',
'translations.*.image_mob' => 'nullable|image|max:2048',
]);

$banner = Banner::findOrFail($id);

foreach (['ua', 'sk', 'ru'] as $locale) {
$data = [];

$translation = $banner->translations()->where('locale', $locale)->first();

if ($request->hasFile("translations.$locale.image")) {
if ($translation?->image) {
\Storage::disk('public')->delete($translation->image);
}
$data['image'] = $request->file("translations.$locale.image")->store("banners/$locale", 'public');
}

if ($request->hasFile("translations.$locale.image_mob")) {
if ($translation?->image_mob) {
\Storage::disk('public')->delete($translation->image_mob);
}
$data['image_mob'] = $request->file("translations.$locale.image_mob")->store("banners/$locale/mobile", 'public');
}

$banner->translations()->updateOrCreate(
['locale' => $locale],
$data
);
}

return redirect()->route('admin.banners.index')->with('success', 'Банер оновлено');
}
}
