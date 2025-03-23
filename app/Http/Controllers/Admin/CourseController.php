<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get(); // Використовуємо latest() для сортування
return view('admin.courses.index', compact('courses'));
}

public function create()
{
return view('admin.courses.create');
}

public function store(Request $request)
{
$request->validate([
'title' => 'required|string|max:255',
'subtitle' => 'nullable|string|max:500',
'age_group' => 'required|string',
'banner_image' => 'nullable|image|max:2048', // Тут замінили image на banner_image
'person' => 'nullable|string|max:255',
'logos' => 'nullable|array',
'logos.*' => 'image|max:1024',
'period_months' => 'required|integer|min:1',
'lessons_count' => 'required|integer|min:1',
'about_text' => 'nullable|string',
'skills' => 'nullable|array',
'skills.*.title' => 'required|string|max:255',
'skills.*.description' => 'required|string|max:1000',
]);

$course = new Course();
$course->title = $request->title;
$course->subtitle = $request->subtitle;
$course->age_group = $request->age_group;
$course->person = $request->person;
$course->period_months = $request->period_months;
$course->lessons_count = $request->lessons_count;
$course->about_text = $request->about_text;

// Завантаження `banner_image`
if ($request->hasFile('banner_image')) {
$course->banner_image = $request->file('banner_image')->store('courses/banners', 'public');
}

// Обробка масиву навичок
if ($request->has('skills')) {
$course->skills = json_encode($request->skills);
}

// Обробка логотипів
if ($request->hasFile('logos')) {
$logos = [];
foreach ($request->file('logos') as $logo) {
$logos[] = $logo->store('courses/logos', 'public');
}
$course->logos = json_encode($logos);
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
$request->validate([
'title' => 'required|string|max:255',
'subtitle' => 'nullable|string|max:500',
'age_group' => 'required|string',
'banner_image' => 'nullable|image|max:2048', // Тут замінили image на banner_image
'person' => 'nullable|string|max:255',
'logos' => 'nullable|array',
'logos.*' => 'image|max:1024',
'period_months' => 'required|integer|min:1',
'lessons_count' => 'required|integer|min:1',
'about_text' => 'nullable|string',
'skills' => 'nullable|array',
'skills.*.title' => 'required|string|max:255',
'skills.*.description' => 'required|string|max:1000',
]);

$course->title = $request->title;
$course->subtitle = $request->subtitle;
$course->age_group = $request->age_group;
$course->person = $request->person;
$course->period_months = $request->period_months;
$course->lessons_count = $request->lessons_count;
$course->about_text = $request->about_text;

// Оновлення `banner_image`
if ($request->hasFile('banner_image')) {
if ($course->banner_image) {
Storage::disk('public')->delete($course->banner_image);
}
$course->banner_image = $request->file('banner_image')->store('courses/banners', 'public');
}

// Оновлення масиву навичок
if ($request->has('skills')) {
$course->skills = json_encode($request->skills);
}

// Оновлення логотипів
if ($request->hasFile('logos')) {
if ($course->logos) {
foreach (json_decode($course->logos, true) as $logo) {
Storage::disk('public')->delete($logo);
}
        }

$logos = [];
foreach ($request->file('logos') as $logo) {
$logos[] = $logo->store('courses/logos', 'public');
}
$course->logos = json_encode($logos);
}

$course->save();

return redirect()->route('admin.courses.index')->with('success', 'Курс успішно оновлено');
}


public function destroy(Course $course)
{
// Видалення банерного зображення
if ($course->banner_image) {
Storage::disk('public')->delete($course->banner_image);
}

// Видалення логотипів
if ($course->logos) {
foreach (json_decode($course->logos, true) as $logo) {
Storage::disk('public')->delete($logo);
}
}

$course->delete();

return redirect()->route('admin.courses.index')->with('success', 'Курс успішно видалено');
}
}
