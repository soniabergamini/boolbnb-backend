@extends('layouts.admin')
@section('content')

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
            <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-primary">Edit</a>
            <div class="w-100 text-primary text-end py-2 border-top">
                <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="text-danger details px-2 bg-white border-0 text-decoration-underline">
                </form>
            </div>
        </div>
    </div>

@endsection