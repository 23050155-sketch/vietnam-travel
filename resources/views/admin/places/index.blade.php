<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Quản lý địa điểm - TPDĐ Travel</title>

    {{-- CSS riêng của trang Admin --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-places.css') }}"
    >
</head>

<body>

<div class="admin-wrapper">

    {{-- =========================
         TIÊU ĐỀ
    ========================== --}}
    <div class="page-header">

        <div>
            <h1>Quản lý địa điểm</h1>

            <p>
                Quản lý các địa điểm du lịch trong hệ thống
            </p>
        </div>

        <a
            href="{{ route('admin.places.create') }}"
            class="btn btn-primary"
        >
            + Thêm địa điểm
        </a>

    </div>


    {{-- =========================
         TÌM KIẾM VÀ LỌC
    ========================== --}}
    <div class="card">

        <form
            action="{{ route('admin.places.index') }}"
            method="GET"
            class="filter-form"
        >

            {{-- Tìm kiếm theo tên --}}
            <input
                type="text"
                name="keyword"
                class="form-control"
                value="{{ request('keyword') }}"
                placeholder="🔍 Tìm tên địa điểm..."
            >


            {{-- Lọc tỉnh --}}
            <select
                name="province_id"
                class="form-control"
            >

                <option value="">
                    Tất cả tỉnh / thành
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


            {{-- Lọc trạng thái --}}
            <select
                name="status"
                class="form-control"
            >

                <option value="">
                    Tất cả trạng thái
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


            <button
                type="submit"
                class="btn btn-primary"
            >
                Tìm kiếm
            </button>


            <a
                href="{{ route('admin.places.index') }}"
                class="btn btn-secondary"
            >
                Xóa lọc
            </a>

        </form>

    </div>


    {{-- Thông báo thành công --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================
         DANH SÁCH ĐỊA ĐIỂM
    ========================== --}}
    <div class="card">

        <div class="table-wrapper">

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Tên địa điểm</th>
                        <th>Tỉnh / Thành phố</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>

                </thead>


                <tbody>

                @forelse($places as $place)

                    <tr>

                        <td>
                            #{{ $place->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $place->name }}
                            </strong>
                        </td>

                        <td>
                            {{ $place->province->name }}
                        </td>

                        <td>

                            @if($place->status === 'active')

                                <span class="badge badge-active">
                                    ● Hiển thị
                                </span>

                            @else

                                <span class="badge badge-hidden">
                                    ● Ẩn
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="actions">

                                {{-- Sửa --}}
                                <a
                                    href="{{ route('admin.places.edit', $place) }}"
                                    class="btn btn-warning"
                                >
                                    Sửa
                                </a>


                                {{-- Xóa --}}
                                <form
                                    action="{{ route('admin.places.destroy', $place) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="
                                            return confirm(
                                                'Bạn có chắc muốn xóa địa điểm này?'
                                            )
                                        "
                                    >
                                        Xóa
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            style="text-align:center; padding:35px;"
                        >
                            Không tìm thấy địa điểm phù hợp.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>