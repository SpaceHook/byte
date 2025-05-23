@vite(['resources/css/course/gallery_section.scss'])

<div class="gallery-section__content container">
    <div class="gallery-section__cards">
        @foreach(range(1, 8) as $number)
            <div class="gallery-section__cards-card">
                <img src="/media/images/gallery/gallery_{{$number}}.png" alt="" class="gallery-section__cards-card-image">
            </div>
        @endforeach
    </div>
</div>
