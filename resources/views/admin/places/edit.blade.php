<h1>Sửa địa điểm</h1>

@if($errors->any())

    <ul>
        @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

        @endforeach
    </ul>

@endif


<form
    action="{{ route('admin.places.update', $place) }}"
    method="POST"
>

    @csrf
    @method('PUT')


    <label>
        Tỉnh / Thành phố
    </label>

    <select name="province_id">

        @foreach($provinces as $province)

            <option
                value="{{ $province->id }}"
                {{
                    old('province_id', $place->province_id) == $province->id
                        ? 'selected'
                        : ''
                }}
            >
                {{ $province->name }}
            </option>

        @endforeach

    </select>

    <br><br>


    <label>
        Tên địa điểm
    </label>

    <input
        type="text"
        name="name"
        value="{{ old('name', $place->name) }}"
    >

    <br><br>


    <label>
        Mô tả ngắn
    </label>

    <input
        type="text"
        name="short_description"
        value="{{ old('short_description', $place->short_description) }}"
    >

    <br><br>


    <label>
        Mô tả chi tiết
    </label>

    <textarea
        name="description"
    >{{ old('description', $place->description) }}</textarea>

    <br><br>


    <label>
        Địa chỉ
    </label>

    <input
        type="text"
        name="address"
        value="{{ old('address', $place->address) }}"
    >

    <br><br>


    <label>
        Trạng thái
    </label>

    <select name="status">

        <option
            value="active"
            {{
                old('status', $place->status) === 'active'
                    ? 'selected'
                    : ''
            }}
        >
            Hiển thị
        </option>

        <option
            value="hidden"
            {{
                old('status', $place->status) === 'hidden'
                    ? 'selected'
                    : ''
            }}
        >
            Ẩn
        </option>

    </select>

    <br><br>


    <button type="submit">
        Cập nhật địa điểm
    </button>

</form>


<br>

<a href="{{ route('admin.places.index') }}">
    ← Quay lại danh sách
</a>