<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách tỉnh để hiển thị trong bộ lọc
        $provinces = Province::orderBy('name')->get();

        // Khởi tạo câu truy vấn địa điểm
        $query = Place::with('province');

        // Tìm kiếm theo tên địa điểm
        if ($request->filled('keyword')) {
            $query->where(
                'name',
                'like',
                '%' . $request->keyword . '%'
            );
        }

        // Lọc theo tỉnh / thành phố
        if ($request->filled('province_id')) {
            $query->where(
                'province_id',
                $request->province_id
            );
        }

        // Lọc theo trạng thái
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Lấy kết quả mới nhất
        $places = $query
            ->latest()
            ->get();

        return view(
            'admin.places.index',
            compact(
                'places',
                'provinces'
            )
        );
    }

    public function create()
    {
        $provinces = Province::orderBy('name')->get();

        return view(
            'admin.places.create',
            compact('provinces')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
        [
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:10000',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,hidden',
        ],
        [
            // Thông báo lỗi cho tỉnh / thành phố
            'province_id.required' =>
                'Vui lòng chọn tỉnh / thành phố.',

            'province_id.exists' =>
                'Tỉnh / thành phố đã chọn không tồn tại.',

            // Thông báo lỗi tên địa điểm
            'name.required' =>
                'Vui lòng nhập tên địa điểm.',

            'name.string' =>
                'Tên địa điểm phải là chuỗi ký tự.',

            'name.max' =>
                'Tên địa điểm không được vượt quá 255 ký tự.',

            // Mô tả ngắn
            'short_description.max' =>
                'Mô tả ngắn không được vượt quá 255 ký tự.',

            // Mô tả
            'description.max' =>
                'Mô tả chi tiết không được vượt quá 10.000 ký tự.',

            // Địa chỉ
            'address.max' =>
                'Địa chỉ không được vượt quá 255 ký tự.',

            // Trạng thái
            'status.required' =>
                'Vui lòng chọn trạng thái.',

            'status.in' =>
                'Trạng thái không hợp lệ.',
        ]
    );

        // Tạo slug từ tên địa điểm
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Nếu slug đã tồn tại thì thêm số phía sau
        while (Place::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        Place::create($validated);

        return redirect()
            ->route('admin.places.index')
            ->with(
                'success',
                'Thêm địa điểm thành công.'
            );
    }

    public function show(Place $place)
    {
        //
    }

    public function edit(Place $place)
    {
        $provinces = Province::orderBy('name')->get();

        return view(
            'admin.places.edit',
            compact(
                'place',
                'provinces'
            )
        );
    }

    public function update(
        Request $request,
        Place $place
    ) {
        $validated = $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:10000',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,hidden',
        ]);

        // Tạo slug mới từ tên địa điểm
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Chỉ kiểm tra các địa điểm khác, bỏ qua chính địa điểm đang sửa
        while (
            Place::where('slug', $slug)
                ->where('id', '!=', $place->id)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        $place->update($validated);

        return redirect()
            ->route('admin.places.index')
            ->with(
                'success',
                'Cập nhật địa điểm thành công.'
            );
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()
            ->route('admin.places.index')
            ->with(
                'success',
                'Xóa địa điểm thành công.'
            );
    }
}