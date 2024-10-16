<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return view('admin.info.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $info = new Info();
        $info->title = $request->title;

        if ($request->hasFile('image')) {
            $info->image = $request->file('image')->store('info', 'public');
        }

        $info->save();

        return redirect()->route('admin.info.index')->with('success', 'Інформація успішно додана');
    }

    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        if ($info->image) {
            \Storage::disk('public')->delete($info->image);
        }
        $info->delete();

        return redirect()->route('admin.info.index')->with('success', 'Інформація успішно видалена');
    }
    public function edit(Info $info)
    {
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $info->title = $request->title;

        if ($request->hasFile('image')) {
            // Видаляємо старе зображення
            if ($info->image) {
            \Storage::disk('public')->delete($info->image);
            }

            // Зберігаємо нове зображення
            $info->image = $request->file('image')->store('info', 'public');
        }

        $info->save();

        return redirect()->route('admin.info.index')->with('success', 'Інформація успішно оновлена');
    }
}
