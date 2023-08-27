@extends('layouts.admin')
@section('content')

    <div class="card" style="width: 18rem;">
        <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="card-img-top" alt="apartment image" style="height: 12rem;">
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
            <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-primary w-100">EDIT</a>
            <div class="py-2 my-2 w-100 bg-danger rounded">
                <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post" class="w-100 rounded">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="details border-0 w-100 bg-danger text-white">
                </form>
            </div>
        </div>
    </div>

@endsection
