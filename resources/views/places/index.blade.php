<h1>Khám phá địa điểm</h1>

@foreach($places as $place)

    <div>

        <h2>
            <a href="{{
                route(
                    'places.show',
                    $place->slug
                )
            }}">
                {{ $place->name }}
            </a>
        </h2>

        <p>
            📍 {{ $place->province->name }}
        </p>

        <p>
            {{ $place->short_description }}
        </p>

    </div>

@endforeach