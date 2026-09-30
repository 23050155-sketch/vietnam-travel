<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('province')
            ->latest()
            ->get();

        return view(
            'admin.places.index',
            compact('places')
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
        $validated = $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,hidden',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

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
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:active,hidden',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

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