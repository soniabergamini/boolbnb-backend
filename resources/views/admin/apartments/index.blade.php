@extends('layouts.admin')
@section('content')

<div class="d-flex flex-wrap gap-3 p-2 my-3">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach ($apartments as $apartment)
        <div class="card castomRelative" style="width: 18rem; height: 26rem;">
        <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="object-fit-cover card-img-top" alt="apartment image" style="height: 12rem;">
        <div class="card-body bg-white rounded-bottom">
            <h5 class="card-title mb-3">{{ $apartment->name }}</h5>
            <div class="card-text">
                <p><strong>Address: </strong><span>{{ $apartment->address }}</span></p>
                </p>
            </div>
            <a href="{{ route('admin.apartments.show', $apartment) }}" class="castomAbsolute btn castomButton text-white border border-light-subtle">Visit</a>
        </div>
        </div>
    @endforeach
</div>

@endsection
