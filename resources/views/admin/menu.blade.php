@vite(['resources/css/admin/menu.scss'])

<div class="menu__content">
    <div class="menu__info">
        <img src="/media/icons/byte_logo.svg" alt="logo" class="menu__logo">
        <div class="menu__links">
            <a href="{{ route('admin.dashboard') }}" class="menu__links-link">
                Головна
            </a>
            <a href="{{ route('admin.banners.index') }}" class="menu__links-link">
                Банери
            </a>
            <a href="{{ route('admin.courses.index') }}" class="menu__links-link">
                Курси
            </a>
            <a href="{{ route('admin.info.index') }}" class="menu__links-link">
                Новини
            </a>
            <a href="{{ route('admin.submissions.index') }}" class="menu__links-link">
                Клієнти
            </a>
            <a href="{{ route('admin.seo.index') }}" class="menu__links-link">
                SEO-текст
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="menu__button">
            <img src="/media/icons/logout.svg" alt="" class="">
            <span class="menu__button-text">
                Вийти
            </span>
        </button>
    </form>
</div>
