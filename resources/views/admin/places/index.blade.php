<h1>Quản lý địa điểm</h1>

<a href="{{ route('admin.places.create') }}">
    + Thêm địa điểm
</a>

<br><br>


{{-- =========================
     FORM TÌM KIẾM VÀ LỌC
========================= --}}
<form
    action="{{ route('admin.places.index') }}"
    method="GET"
>

    {{-- Tìm kiếm theo tên --}}
    <input
        type="text"
        name="keyword"
        value="{{ request('keyword') }}"
        placeholder="Nhập tên địa điểm..."
    >


    {{-- Lọc theo tỉnh --}}
    <select name="province_id">

        <option value="">
            -- Tất cả tỉnh / thành phố --
        </option>

        @foreach($provinces as $province)

            <option
                value="{{ $province->id }}"
                {{
                    request('province_id') == $province->id
                        ? 'selected'
                        : ''
                }}
            >
                {{ $province->name }}
            </option>

        @endforeach

    </select>


    {{-- Lọc theo trạng thái --}}
    <select name="status">

        <option value="">
            -- Tất cả trạng thái --
        </option>

        <option
            value="active"
            {{
                request('status') === 'active'
                    ? 'selected'
                    : ''
            }}
        >
            Hiển thị
        </option>

        <option
            value="hidden"
            {{
                request('status') === 'hidden'
                    ? 'selected'
                    : ''
            }}
        >
            Ẩn
        </option>

    </select>


    <button type="submit">
        Tìm kiếm
    </button>


    <a href="{{ route('admin.places.index') }}">
        Xóa bộ lọc
    </a>

</form>


<br>


{{-- Thông báo thành công --}}
@if(session('success'))

    <p>
        {{ session('success') }}
    </p>

@endif


{{-- =========================
     DANH SÁCH ĐỊA ĐIỂM
========================= --}}

<table border="1">

    <tr>

        <th>ID</th>

        <th>
            Tên địa điểm
        </th>

        <th>
            Tỉnh / Thành phố
        </th>

        <th>
            Trạng thái
        </th>

        <th>
            Thao tác
        </th>

    </tr>


    @forelse($places as $place)

        <tr>

            <td>
                {{ $place->id }}
            </td>

            <td>
                {{ $place->name }}
            </td>

            <td>
                {{ $place->province->name }}
            </td>

            <td>

                @if($place->status === 'active')

                    Hiển thị

                @else

                    Ẩn

                @endif

            </td>

            <td>

                {{-- Sửa địa điểm --}}
                <a
                    href="{{
                        route(
                            'admin.places.edit',
                            $place
                        )
                    }}"
                >
                    Sửa
                </a>


                {{-- Xóa địa điểm --}}
                <form
                    action="{{
                        route(
                            'admin.places.destroy',
                            $place
                        )
                    }}"
                    method="POST"
                    style="display:inline;"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        onclick="
                            return confirm(
                                'Bạn có chắc muốn xóa địa điểm này?'
                            )
                        "
                    >
                        Xóa
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td
                colspan="5"
                style="text-align:center;"
            >
                Không tìm thấy địa điểm phù hợp.
            </td>

        </tr>

    @endforelse

</table>