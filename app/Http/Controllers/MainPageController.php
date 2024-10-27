<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Course;
use App\Models\Info;
use App\Models\SeoText;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $courses = Course::all();
        $news = Info::latest()->take(8)->get();
        $seoText = SeoText::where('page', 'home')->first();

        return view('main_page.index', compact('banners', 'courses', 'news', 'seoText'));
    }
}
