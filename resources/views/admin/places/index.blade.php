<h1>Quản lý địa điểm</h1>

<a href="{{ route('admin.places.create') }}">
    + Thêm địa điểm
</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">

    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Tỉnh</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>

    @foreach($places as $place)

        <tr>

            <td>{{ $place->id }}</td>

            <td>{{ $place->name }}</td>

            <td>
                {{ $place->province->name }}
            </td>

            <td>{{ $place->status }}</td>

            <td>

                <a href="{{
                    route(
                        'admin.places.edit',
                        $place
                    )
                }}">
                    Sửa
                </a>

                <form
                    action="{{
                        route(
                            'admin.places.destroy',
                            $place
                        )
                    }}"
                    method="POST"
                >

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Xóa
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

</table>