<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Khám phá địa điểm - TPDĐ Travel</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/places.css') }}"
    >
</head>

<body>

<nav class="navbar">

    <div class="nav-container">

        <a
            href="{{ url('/') }}"
            class="logo"
        >
            TPDĐ Travel
        </a>

        <a
            href="{{ route('places.index') }}"
            class="nav-link"
        >
            Khám phá địa điểm
        </a>

    </div>

</nav>


<div class="container">

    <div class="page-title">

        <h1>
            Khám phá địa điểm
        </h1>

        <p>
            Những điểm đến nổi bật trên khắp Việt Nam
        </p>

    </div>


    @if($places->count() > 0)

        <div class="places-grid">

            @foreach($places as $place)

                <div class="place-card">

                    {{-- Ảnh địa điểm --}}
                    <div class="place-image">

                        @if($place->cover_image)

                            <img
                                src="{{ asset('storage/' . $place->cover_image) }}"
                                alt="{{ $place->name }}"
                            >

                        @else

                            <div class="place-placeholder">
                                Chưa có hình ảnh
                            </div>

                        @endif

                    </div>


                    <div class="place-content">

                        {{-- Tỉnh / Thành phố --}}
                        <span class="place-province">
                            📍 {{ $place->province->name }}
                        </span>


                        {{-- Tên địa điểm --}}
                        <h2>

                            <a
                                href="{{ route('places.show', $place->slug) }}"
                            >
                                {{ $place->name }}
                            </a>

                        </h2>


                        {{-- Mô tả ngắn --}}
                        <p class="place-description">

                            {{ $place->short_description
                                ?: 'Chưa có mô tả cho địa điểm này.' }}

                        </p>


                        {{-- Xem chi tiết --}}
                        <a
                            href="{{ route('places.show', $place->slug) }}"
                            class="btn-view"
                        >
                            Xem chi tiết →
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-message">
            Hiện chưa có địa điểm nào để hiển thị.
        </div>

    @endif

</div>

</body>
</html>
