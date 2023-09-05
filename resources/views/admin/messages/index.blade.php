@extends('layouts.admin')
@section('content')

    <div id="messagesSec" class="my-3 mx-1">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="colPrimaryOrange"><i class="fa-solid fa-envelope fa-lg fa-fw me-1"></i> Messages</h1>

        <div class="w-100 d-flex justify-content-end me-4">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">Filter</button>
        </div>

        @if ($messages->isEmpty())
            <div>
                <p>There are no messages to display.</p>
            </div>
        @else
            <section class="p-2 mx-2 text-white">
                <div class="d-flex border border-secondary p-2">
                    <p class="w-15 m-0"><strong>Apartment Image</strong></p>
                    <p class="w-25 m-0"><strong>User Email</strong></p>
                    <p class="w-60 m-0"><strong>Message</strong></p>
                </div>
                @forelse ($messages as $message)
                    <div class="d-flex border border-secondary align-items-center">
                        <div class="w-15 p-2 position-relative message">
                            <img src="{{ asset('/storage') . '/' . $message->apartment->image }}"
                                :alt="$message->apartment->name" class="img-fluid rounded">
                            <p class="position-absolute top-50 start-50 translate-middle text-center">
                                {{ $message->apartment->name }}</p>
                        </div>
                        <p class="w-25 m-0">{{ $message->user_mail }}</p>
                        <p class="w-60 m-0">{{ $message->text }}</p>
                    </div>
                @empty
                    <p>There are no new messages</p>
                @endforelse
            </section>
        @endif

        {{-- OffCanvas --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-center" id="offcanvasRightLabel">FILTER APARTMENTS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="" class="row g-3" action="{{ route('admin.messages.index') }}" method="GET">
                    <div class="col-12">
                        <label for="inputState" class="form-label">Choose Apartment</label>
                        <select id="inputState" class="form-select" name="apartment_id">
                            <option>Choose...</option>
                            @foreach ($apartments as $apartment)
                                <option value="{{ $apartment->id }}"> {{ $apartment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">SEARCH</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
