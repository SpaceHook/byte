@vite(['resources/css/course/gallery_section.scss'])

<div class="gallery-section__content container">
    <div class="gallery-section__cards">
        @foreach($news as $item)
            <div class="gallery-section__cards-card">
                <img src="{{ asset('storage/' . $item['image']) }}" alt="" class="gallery-section__cards-card-image">
            </div>
        @endforeach
    </div>
</div>
