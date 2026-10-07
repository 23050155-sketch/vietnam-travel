<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $place->name }} - TPDĐ Travel</title>

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

    {{-- Quay lại --}}
    <a
        href="{{ route('places.index') }}"
        class="back-link"
    >
        ← Quay lại danh sách địa điểm
    </a>


    <div class="detail-card">

        {{-- Ảnh địa điểm --}}
        <div class="detail-image">

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


        <div class="detail-body">

            {{-- Tên địa điểm --}}
            <h1 class="detail-title">
                {{ $place->name }}
            </h1>


            {{-- Thông tin --}}
            <div class="detail-info">

                <span class="info-badge">
                    📍 {{ $place->province->name }}
                </span>

                @if($place->address)

                    <span class="info-badge">
                        🗺️ {{ $place->address }}
                    </span>

                @endif

            </div>


            {{-- Mô tả ngắn --}}
            @if($place->short_description)

                <p
                    style="
                        font-size:17px;
                        font-weight:600;
                        margin-bottom:18px;
                        color:#334155;
                    "
                >
                    {{ $place->short_description }}
                </p>

            @endif


            {{-- Mô tả chi tiết --}}
            <div class="detail-description">

                {{ $place->description
                    ?: 'Thông tin chi tiết đang được cập nhật.' }}

            </div>

        </div>

    </div>

</div>

</body>
</html>