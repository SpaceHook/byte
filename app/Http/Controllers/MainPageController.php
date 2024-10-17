<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Course;
use App\Models\Info;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $courses = Course::all();
        $news = Info::latest()->take(8)->get();

        return view('main_page.index', compact('banners', 'courses', 'news'));
    }
}
