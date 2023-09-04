@extends('layouts.admin')
@section('content')

    <div id="messagesSec" class="my-3 mx-1 text-white">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1><i class="fa-solid fa-envelope fa-lg fa-fw me-1"></i> Messages</h1>

        <section class="p-2 mx-2">
            <div class="d-flex border border-secondary p-2">
                <p class="w-15 m-0"><strong>Apartment Image</strong></p>
                <p class="w-25 m-0"><strong>User Email</strong></p>
                <p class="w-60 m-0"><strong>Message</strong></p>
            </div>
            @forelse ($messages as $message)
                <div class="d-flex border border-secondary align-items-center">
                    <div class="w-15 p-2 position-relative message">
                        <img src="{{ asset('/storage') . '/' . $message->apartment->image }}" :alt="$message->apartment->name" class="img-fluid rounded">
                        <p class="position-absolute top-50 start-50 translate-middle text-center">{{ $message->apartment->name }}</p>
                    </div>
                    <p class="w-25 m-0">{{ $message->user_mail }}</p>
                    <p class="w-60 m-0">{{ $message->text }}</p>
                </div>
            @empty
                <p>There are no new messages</p>
            @endforelse
        </section>

    </div>

@endsection
