@extends('layouts.admin')
@section('content')

<div class="d-flex flex-wrap gap-3 p-2 my-3">
    @foreach ($apartments as $apartment)
        <div class="card" style="width: 18rem;">
        <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="card-img-top" alt="apartment image">
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $apartment->name }}</h5>
            <div class="card-text">
                <p><strong>Address: </strong><span>{{ $apartment->address }}</span></p>
                <p><strong>Additional Services: </strong>
                    @forelse ($apartment->services as $service)
                        <span>{{ $service->name }}, </span>
                    @empty
                        <span>N/A</span>
                    @endforelse
                </p>
            </div>
            <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary">Visit</a>
        </div>
        </div>
    @endforeach
</div>

@endsection
