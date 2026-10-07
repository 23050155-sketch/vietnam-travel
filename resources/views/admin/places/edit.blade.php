<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Sửa địa điểm - TPDĐ Travel</title>

    {{-- CSS dùng chung cho trang quản lý địa điểm --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-places.css') }}"
    >
</head>

<body>

<div class="admin-wrapper">

    {{-- =========================
         TIÊU ĐỀ TRANG
    ========================== --}}
    <div class="page-header">

        <div>

            <h1>
                Sửa địa điểm
            </h1>

            <p>
                Cập nhật thông tin địa điểm du lịch
            </p>

        </div>

    </div>


    {{-- =========================
         HIỂN THỊ LỖI TỔNG QUÁT
    ========================== --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Dữ liệu chưa hợp lệ:
            </strong>

            <ul style="margin:8px 0 0 20px;">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================
         KHUNG FORM
    ========================== --}}
    <div class="card">

        <form
            action="{{ route('admin.places.update', $place) }}"
            method="POST"
        >

            @csrf

            {{-- Laravel dùng PUT cho chức năng cập nhật --}}
            @method('PUT')


            {{-- =========================
                 TỈNH + TÊN ĐỊA ĐIỂM
            ========================== --}}
            <div class="form-row">


                {{-- Tỉnh / Thành phố --}}
                <div class="form-group">

                    <label>
                        Tỉnh / Thành phố *
                    </label>

                    <select
                        name="province_id"
                        class="form-control"
                    >

                        <option value="">
                            -- Chọn tỉnh / thành phố --
                        </option>

                        @foreach($provinces as $province)

                            <option
                                value="{{ $province->id }}"
                                {{
                                    old(
                                        'province_id',
                                        $place->province_id
                                    ) == $province->id
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $province->name }}
                            </option>

                        @endforeach

                    </select>


                    {{-- Lỗi tỉnh --}}
                    @error('province_id')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Tên địa điểm --}}
                <div class="form-group">

                    <label>
                        Tên địa điểm *
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $place->name) }}"
                        placeholder="Ví dụ: Núi Bà Đen"
                    >


                    {{-- Lỗi tên địa điểm --}}
                    @error('name')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            {{-- =========================
                 MÔ TẢ NGẮN
            ========================== --}}
            <div class="form-group">

                <label>
                    Mô tả ngắn
                </label>

                <input
                    type="text"
                    name="short_description"
                    class="form-control"
                    value="{{
                        old(
                            'short_description',
                            $place->short_description
                        )
                    }}"
                    placeholder="Nhập mô tả ngắn về địa điểm"
                >


                {{-- Lỗi mô tả ngắn --}}
                @error('short_description')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- =========================
                 MÔ TẢ CHI TIẾT
            ========================== --}}
            <div class="form-group">

                <label>
                    Mô tả chi tiết
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Nhập thông tin chi tiết về địa điểm..."
                >{{ old('description', $place->description) }}</textarea>


                {{-- Lỗi mô tả chi tiết --}}
                @error('description')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- =========================
                 ĐỊA CHỈ + TRẠNG THÁI
            ========================== --}}
            <div class="form-row">


                {{-- Địa chỉ --}}
                <div class="form-group">

                    <label>
                        Địa chỉ
                    </label>

                    <input
                        type="text"
                        name="address"
                        class="form-control"
                        value="{{ old('address', $place->address) }}"
                        placeholder="Nhập địa chỉ"
                    >


                    {{-- Lỗi địa chỉ --}}
                    @error('address')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Trạng thái --}}
                <div class="form-group">

                    <label>
                        Trạng thái
                    </label>

                    <select
                        name="status"
                        class="form-control"
                    >

                        <option
                            value="active"
                            {{
                                old(
                                    'status',
                                    $place->status
                                ) === 'active'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Hiển thị
                        </option>


                        <option
                            value="hidden"
                            {{
                                old(
                                    'status',
                                    $place->status
                                ) === 'hidden'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Ẩn
                        </option>

                    </select>


                    {{-- Lỗi trạng thái --}}
                    @error('status')

                        <div class="error-text">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            {{-- =========================
                 NÚT THAO TÁC
            ========================== --}}
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Cập nhật địa điểm
                </button>


                <a
                    href="{{ route('admin.places.index') }}"
                    class="btn btn-secondary"
                >
                    ← Quay lại
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>