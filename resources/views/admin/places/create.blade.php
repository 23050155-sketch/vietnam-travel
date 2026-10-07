<h1>Thêm địa điểm</h1>


{{-- Hiển thị lỗi tổng quát nếu có --}}
@if($errors->any())

    <div style="
        background:#fee2e2;
        color:#991b1b;
        padding:10px;
        margin-bottom:15px;
    ">

        <strong>Dữ liệu chưa hợp lệ:</strong>

        <ul>
            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>

    </div>

@endif


<form
    action="{{ route('admin.places.store') }}"
    method="POST"
>

    @csrf


    {{-- =========================
         TỈNH / THÀNH PHỐ
    ========================== --}}

    <label>
        Tỉnh / Thành phố
    </label>

    <br>

    <select name="province_id">

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
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         TÊN ĐỊA ĐIỂM
    ========================== --}}

    <label>
        Tên địa điểm
    </label>

    <br>

    <input
        type="text"
        name="name"
        value="{{ old('name') }}"
        placeholder="Nhập tên địa điểm"
    >

    @error('name')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         MÔ TẢ NGẮN
    ========================== --}}

    <label>
        Mô tả ngắn
    </label>

    <br>

    <input
        type="text"
        name="short_description"
        value="{{ old('short_description') }}"
        placeholder="Nhập mô tả ngắn"
    >

    @error('short_description')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         MÔ TẢ CHI TIẾT
    ========================== --}}

    <label>
        Mô tả chi tiết
    </label>

    <br>

    <textarea
        name="description"
        placeholder="Nhập mô tả chi tiết"
    >{{ old('description') }}</textarea>

    @error('description')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         ĐỊA CHỈ
    ========================== --}}

    <label>
        Địa chỉ
    </label>

    <br>

    <input
        type="text"
        name="address"
        value="{{ old('address') }}"
        placeholder="Nhập địa chỉ"
    >

    @error('address')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         TRẠNG THÁI
    ========================== --}}

    <label>
        Trạng thái
    </label>

    <br>

    <select name="status">

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
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    <button type="submit">
        Thêm địa điểm
    </button>

</form>


<br>

<a href="{{ route('admin.places.index') }}">
    ← Quay lại danh sách
</a>