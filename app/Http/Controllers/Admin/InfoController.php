<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\InfoTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::with('translations')->latest()->get();
return view('admin.info.index', compact('infos'));
}

public function create()
{
return view('admin.info.create');
}

public function store(Request $request)
{
$request->validate([
'image' => 'required|image|max:2048',
'title' => 'required|array',
'title.*' => 'required|string|max:255',
]);

$info = new Info();

if ($request->hasFile('image')) {
$info->image = $request->file('image')->store('info', 'public');
}

$info->save();

foreach (['ua', 'ru', 'sk'] as $locale) {
$info->translations()->create([
'locale' => $locale,
'title' => $request->input("title.$locale"),
]);
}

return redirect()->route('admin.info.index')->with('success', 'Інформація успішно додана');
}

public function edit(Info $info)
{
$info->load('translations');
return view('admin.info.edit', compact('info'));
}

public function update(Request $request, Info $info)
{
$request->validate([
'image' => 'nullable|image|max:2048',
'title' => 'required|array',
'title.*' => 'required|string|max:255',
]);

if ($request->hasFile('image')) {
if ($info->image) {
Storage::disk('public')->delete($info->image);
}
$info->image = $request->file('image')->store('info', 'public');
}

$info->save();

foreach (['ua', 'ru', 'sk'] as $locale) {
$info->translations()->updateOrCreate(
['locale' => $locale],
['title' => $request->input("title.$locale")]
);
}

return redirect()->route('admin.info.index')->with('success', 'Інформація успішно оновлена');
}

public function destroy($id)
{
$info = Info::findOrFail($id);
if ($info->image) {
Storage::disk('public')->delete($info->image);
}
$info->delete();

return redirect()->route('admin.info.index')->with('success', 'Інформація успішно видалена');
}
}
