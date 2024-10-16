<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Course;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $courses = Course::all();

        return view('main_page.index', compact('banners', 'courses'));
    }
}
