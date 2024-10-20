<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->merge([
        'is_free' => $request->has('is_free') ? true : false,
        ]);

        $request->validate([
        'title' => 'required|string|max:255',
        'age_group' => 'required|string',
        'image' => 'required|image|max:2048',
        'is_free' => 'boolean',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->age_group = $request->age_group;
        $course->is_free = $request->is_free;

        if ($request->hasFile('image')) {
        $course->image = $request->file('image')->store('courses', 'public');
        }

        if ($request->hasFile('image_mob')) {
        $course->image_mob = $request->file('image_mob')->store('courses/mobile', 'public');
        }

        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Курс успішно додано');
    }


public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
    // Примусово встановлюємо is_free як true або false
    $request->merge([
    'is_free' => $request->has('is_free') ? true : false,
    ]);

    $request->validate([
    'title' => 'required|string|max:255',
    'age_group' => 'required|string',
    'image' => 'nullable|image|max:2048',
    'is_free' => 'boolean',
    ]);

    $course->title = $request->title;
    $course->age_group = $request->age_group;
    $course->is_free = $request->is_free;

    if ($request->hasFile('image')) {
    $course->image = $request->file('image')->store('courses', 'public');
    }

    $course->save();

    return redirect()->route('admin.courses.index')->with('success', 'Курс успішно оновлено');
    }


public function destroy(Course $course)
    {
        if ($course->image) {
            \Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Курс успішно видалено');
    }
}
