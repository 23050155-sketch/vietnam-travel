<h1>Sửa địa điểm</h1>


{{-- =========================
     HIỂN THỊ LỖI TỔNG QUÁT
========================= --}}
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

                <li>
                    {{ $error }}
                </li>

            @endforeach
        </ul>

    </div>

@endif


{{-- =========================
     FORM CẬP NHẬT ĐỊA ĐIỂM
========================= --}}
<form
    action="{{ route('admin.places.update', $place) }}"
    method="POST"
>

    @csrf

    @method('PUT')


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


    {{-- Hiển thị lỗi của province_id --}}
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
        value="{{ old('name', $place->name) }}"
        placeholder="Nhập tên địa điểm"
    >


    {{-- Hiển thị lỗi của name --}}
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
        value="{{
            old(
                'short_description',
                $place->short_description
            )
        }}"
        placeholder="Nhập mô tả ngắn"
    >


    {{-- Hiển thị lỗi mô tả ngắn --}}
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
        rows="6"
        cols="50"
    >{{ old('description', $place->description) }}</textarea>


    {{-- Hiển thị lỗi mô tả chi tiết --}}
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
        value="{{ old('address', $place->address) }}"
        placeholder="Nhập địa chỉ"
    >


    {{-- Hiển thị lỗi địa chỉ --}}
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


    {{-- Hiển thị lỗi trạng thái --}}
    @error('status')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <br><br>


    {{-- =========================
         NÚT CẬP NHẬT
    ========================== --}}
    <button type="submit">
        Cập nhật địa điểm
    </button>

</form>


<br>


{{-- Quay lại danh sách --}}
<a href="{{ route('admin.places.index') }}">
    ← Quay lại danh sách
</a>