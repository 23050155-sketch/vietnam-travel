<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Thêm địa điểm - TPDĐ Travel</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-places.css') }}"
    >
</head>

<body>

<div class="admin-wrapper">

    <div class="page-header">

        <div>
            <h1>Thêm địa điểm</h1>

            <p>
                Thêm một địa điểm du lịch mới vào hệ thống
            </p>
        </div>

    </div>


    {{-- Hiển thị lỗi --}}
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


    <div class="card">

        <form
            action="{{ route('admin.places.store') }}"
            method="POST"
        >

            @csrf


            {{-- Tỉnh + tên địa điểm --}}
            <div class="form-row">

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
                                    old('province_id') == $province->id
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $province->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('province_id')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>
                        Tên địa điểm *
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Ví dụ: Núi Bà Đen"
                    >

                    @error('name')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Mô tả ngắn --}}
            <div class="form-group">

                <label>
                    Mô tả ngắn
                </label>

                <input
                    type="text"
                    name="short_description"
                    class="form-control"
                    value="{{ old('short_description') }}"
                    placeholder="Nhập mô tả ngắn về địa điểm"
                >

                @error('short_description')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Mô tả chi tiết --}}
            <div class="form-group">

                <label>
                    Mô tả chi tiết
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Nhập thông tin chi tiết về địa điểm..."
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Địa chỉ + trạng thái --}}
            <div class="form-row">

                <div class="form-group">

                    <label>
                        Địa chỉ
                    </label>

                    <input
                        type="text"
                        name="address"
                        class="form-control"
                        value="{{ old('address') }}"
                        placeholder="Nhập địa chỉ"
                    >

                    @error('address')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


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
                                old('status', 'active') === 'active'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Hiển thị
                        </option>

                        <option
                            value="hidden"
                            {{
                                old('status') === 'hidden'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Ẩn
                        </option>

                    </select>

                    @error('status')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    + Thêm địa điểm
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