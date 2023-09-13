@extends('layouts.admin')
@section('content')

    {{-- <div class="d-flex flex-wrap gap-3 p-2 my-3"> --}}

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($apartments) > 0)
        <div class="d-flex flex-wrap gap-3 p-2 my-3">
            @foreach ($apartments as $apartment)
                <div class="card castomRelative" style="width: 18rem; height: 26rem;">
                    <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="object-fit-cover card-img-top"
                        alt="apartment image" style="height: 12rem;">
                    <div class="card-body bg-white rounded-bottom">
                        <h5 class="card-title mb-3">{{ $apartment->name }}</h5>
                        <div class="card-text">
                            <p><strong>Address: </strong><span>{{ $apartment->address }}</span></p>
                            </p>
                        </div>
                        <a href="{{ route('admin.apartments.show', $apartment) }}"
                            class="castomAbsolute btn castomButton text-white border border-light-subtle">Visit</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row bg-white my-5">
            <span class="text-center col-12 py-3 text-secondary">You haven't added any apartments yet. They'll appear here once you add them. 😊</span>
        </div>
    @endif

@endsection
