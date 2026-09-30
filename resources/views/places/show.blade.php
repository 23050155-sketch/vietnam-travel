<h1>{{ $place->name }}</h1>

<p>
    Tỉnh:
    {{ $place->province->name }}
</p>

<p>
    Địa chỉ:
    {{ $place->address }}
</p>

<p>
    {{ $place->description }}
</p>