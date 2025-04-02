@vite(['resources/css/main_page/news_section.scss'])

<div class="news-section__content container">
    <h2 class="news-section__title">
        @lang('main_page.educational_process')
    </h2>

    <div class="news-section__cards">
        @foreach($news as $item)
            <div class="news-section__cards-card" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 56.5%, rgba(0, 0, 0, 0.8) 94%), url('{{ asset('storage/' . $item['image']) }}')">
                <span class="news-section__cards-card-text">
                    {{ $item->translation()?->title }}
                </span>
            </div>
        @endforeach
    </div>
</div>
