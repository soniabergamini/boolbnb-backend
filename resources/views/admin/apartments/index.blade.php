@extends('layouts.admin')
@section('content')

<div class="d-flex flex-wrap">
    @foreach ($apartments as $apartment)
        <div class="card" style="width: 18rem;">
        <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="card-img-top" alt="apartment image">
        <div class="card-body">
            <h5 class="card-title">{{ $apartment->name }}</h5>
            <p class="card-text">
                <span>Address: {{ $apartment->address }} </span>
                <br>
                <span>Services:
                    <ul>
                        @foreach ($apartment->services as $service)
                            <li>{{ $service->name }}</li>
                        @endforeach
                    </ul> 
                </span>
            </p>
            <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary">Visit</a>
        </div>
        </div>
    @endforeach
</div>

@endsection