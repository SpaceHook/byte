<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    protected array $locales = ['ua', 'ru', 'sk'];

    public function index()
    {
        $courses = Course::latest()->get();
return view('admin.courses.index', compact('courses'));
}

public function create()
{
return view('admin.courses.create');
}

public function store(Request $request)
{
$this->validateRequest($request);

$course = new Course();
$this->fillBaseFields($course, $request);
$course->save();

$this->saveTranslations($course, $request);

return redirect()->route('admin.courses.index')->with('success', 'Курс успішно додано');
}

public function edit(Course $course)
{
$course->load('translations');
return view('admin.courses.edit', compact('course'));
}

public function update(Request $request, Course $course)
{
$this->validateRequest($request);

$this->fillBaseFields($course, $request);
$course->save();

$this->saveTranslations($course, $request);

return redirect()->route('admin.courses.index')->with('success', 'Курс успішно оновлено');
}

public function destroy(Course $course)
{
if ($course->banner_image) {
Storage::disk('public')->delete($course->banner_image);
}

if ($course->person) {
Storage::disk('public')->delete($course->person);
}

if ($course->logos) {
foreach (json_decode($course->logos, true) as $logo) {
Storage::disk('public')->delete($logo);
}
}

$course->delete();

return redirect()->route('admin.courses.index')->with('success', 'Курс успішно видалено');
}

// ----------------------------

private function validateRequest(Request $request)
{
$request->validate([
'title' => 'required|array',
'title.*' => 'required|string|max:255',

'subtitle' => 'nullable|array',
'subtitle.*' => 'nullable|string|max:500',

'about_text' => 'nullable|array',
'about_text.*' => 'nullable|string',

'age_group' => 'required|array',
'age_group.*' => 'required|string|max:255',

'skills' => 'nullable|array',
'skills.*' => 'nullable|array',
'skills.*.*.title' => 'required|string|max:255',
'skills.*.*.description' => 'required|string|max:1000',

'price' => 'nullable|numeric|min:0',

'banner_image' => 'nullable|image|max:2048',
'person' => 'nullable|image|max:2048',
'logos' => 'nullable|array',
'logos.*' => 'image|max:1024',

'period_months' => 'required|integer|min:1',
'lessons_count' => 'required|integer|min:1',
]);
}

private function fillBaseFields(Course $course, Request $request)
{
$course->period_months = $request->period_months;
$course->lessons_count = $request->lessons_count;
$course->price = $request->price;

if ($request->hasFile('banner_image')) {
if ($course->banner_image) {
Storage::disk('public')->delete($course->banner_image);
}
$course->banner_image = $request->file('banner_image')->store('courses/banners', 'public');
}

if ($request->hasFile('person')) {
if ($course->person) {
Storage::disk('public')->delete($course->person);
}
$course->person = $request->file('person')->store('courses/persons', 'public');
}

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
        }

private function saveTranslations(Course $course, Request $request)
{
foreach ($this->locales as $locale) {
$course->translations()->updateOrCreate(
['locale' => $locale],
[
'title' => $request->input("title.$locale"),
'subtitle' => $request->input("subtitle.$locale"),
'about_text' => $request->input("about_text.$locale"),
'skills' => json_encode($request->input("skills.$locale") ?? []),
'age_group' => $request->input("age_group.$locale"),
]
);
}
        }
}
