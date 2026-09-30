<?php

namespace App\Http\Controllers;

use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('province')
            ->where('status', 'active')
            ->latest()
            ->get();

        return view(
            'places.index',
            compact('places')
        );
    }

    public function show(string $slug)
    {
        $place = Place::with('province')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return view(
            'places.show',
            compact('place')
        );
    }
}