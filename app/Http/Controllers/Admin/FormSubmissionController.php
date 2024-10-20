<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission; // Підключіть модель

class FormSubmissionController extends Controller
{
    public function index()
    {
        // Отримуємо всі надіслані дані з бази
        $submissions = FormSubmission::all();

        // Повертаємо вигляд із передачею даних
        return view('admin.submissions.index', compact('submissions'));
    }
}
