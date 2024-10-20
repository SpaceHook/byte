<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission; // Підключаємо правильну модель

class FormSubmissionController extends Controller
{
    public function index()
    {
        // Отримуємо всі надіслані дані з бази
        $submissions = FormSubmission::all();

        // Повертаємо вигляд із передачею даних
        return view('admin.submissions.index', compact('submissions'));
    }

    public function destroy($id)
    {
        // Використовуємо правильну модель для пошуку запису
        $submission = FormSubmission::findOrFail($id);

        // Видаляємо запис
        $submission->delete();

        return redirect()->route('admin.submissions.index')->with('success', 'Запис успішно видалено.');
    }
}
