@extends('layouts.app')

@vite(['resources/css/course/index.scss'])

@section('content')
<main class="course">
    <button class="course__gift" onclick="openModal('lesson')">
        <img src="/media/images/big_gift.png" alt="" class="course__gift-image">
    </button>

    <section class="course__form main-section">
        @include('course_page.main_section.index')
    </section>

    <section class="course__form form-section">
        @include('main_page.form_section.index')
    </section>

    <section class="course__news news-section">
        @include('main_page.news_section.index')
    </section>

    <section id="contacts" class="course__contact contact-section">
        @include('main_page.contact_section.index')
    </section>

    <section class="course__question question-section">
        @include('main_page.question_section.index')
    </section>
</main>
@endsection
