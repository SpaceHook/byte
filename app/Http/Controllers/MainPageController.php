<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Banner;
use App\Models\Course;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(5)->get();
        $banners = Banner::all();
        $courses = Course::all();

        return view('main_page.index', compact('news', 'banners', 'courses'));
    }
}
