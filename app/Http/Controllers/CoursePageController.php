<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Info;
use App\Models\SeoText;

class CoursePageController extends Controller
{
       /**
     * Відображає сторінку окремого курсу.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */

    public function show($locale, $id)
    {
        $course = Course::findOrFail($id);
        $news = Info::latest()->take(8)->get();

        $seoText = \App\Models\SeoText::where('page', 'course/' . $id)->first();

        return view('course_page.index', compact('course', 'news', 'seoText'));
    }
}
