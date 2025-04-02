@extends('layouts.app')

@vite(['resources/css/main_page/index.scss'])

@section('content')
    <main class="main">
        <div class="main__gift-container container">
            <button class="main__gift" onclick="openModal('lesson')">
                <img src="/media/images/big_gift.png" alt="" class="main__gift-image">
            </button>
        </div>

        <section class="main__banner banner-section">
            @include('main_page.banner_section.index')
        </section>

        <section id="courses" class="main__courses courses-section">
            @include('main_page.courses_section.index')
        </section>

        <section class="main__form form-section">
            @include('main_page.form_section.index')
        </section>

        <section class="main__news news-section">
            @include('main_page.news_section.index')
        </section>

        <section id="contacts" class="main__contact contact-section">
            @include('main_page.contact_section.index')
        </section>

        <section class="main__question question-section">
            @include('main_page.question_section.index')
        </section>
    </main>
@endsection
