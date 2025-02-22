<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Info;

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
        // Знаходимо курс за ID або кидаємо 404, якщо не знайдено
        $course = Course::findOrFail($id);
        $news = Info::latest()->take(8)->get();

        // Повертаємо відповідне представлення
        return view('course_page.index', compact('course', 'news'));
    }
}
