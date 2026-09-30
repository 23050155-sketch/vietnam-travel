<h1>Thêm địa điểm</h1>

<form
    action="{{ route('admin.places.store') }}"
    method="POST"
>

    @csrf

    <label>Tỉnh / Thành phố</label>

    <select name="province_id">

        @foreach($provinces as $province)

            <option value="{{ $province->id }}">
                {{ $province->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Tên địa điểm</label>

    <input
        type="text"
        name="name"
    >

    <br><br>

    <label>Mô tả ngắn</label>

    <input
        type="text"
        name="short_description"
    >

    <br><br>

    <label>Mô tả</label>

    <textarea name="description"></textarea>

    <br><br>

    <label>Địa chỉ</label>

    <input
        type="text"
        name="address"
    >

    <br><br>

    <label>Trạng thái</label>

    <select name="status">

        <option value="active">
            Hiển thị
        </option>

        <option value="hidden">
            Ẩn
        </option>

    </select>

    <br><br>

    <button type="submit">
        Thêm địa điểm
    </button>

</form>