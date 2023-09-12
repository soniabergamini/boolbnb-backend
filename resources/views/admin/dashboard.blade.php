@extends('layouts.admin')
@section('content')
    <div class="containerDash">

        {{-- Welcome Section --}}
        <div class="row mt-2">
            <h1 class="col-12 text-center my-3 colPrimaryOrange">Welcome {{ Auth::user()->name ?? 'Host' }}!</h1>
            <p class="col-12 mb-4 px-5 text-center">Welcome to your personal space. Here, you can view your apartments, add
                new ones and highlight them for better visibility and more guests. You can also read messages received for
                each apartment and enjoy additional features.</p>
            <hr class="col-12">
            <div class="col-12 d-flex justify-content-center align-items-center border bg-white text-secondary rounded-3 py-2">
                <span>
                    <strong><i class="fa-solid fa-user colPrimaryOrange fa-lg"></i></strong>
                    {{ Auth::user()->name ?? 'Host' }}
                    <strong class="fs-4 mx-2">&#183;</strong>
                    <strong><i class="fa-solid fa-envelope colPrimaryOrange fa-lg"></i></strong>
                    {{ Auth::user()->email ?? 'Host' }}
                    <strong class="fs-4 mx-2">&#183;</strong>
                    <strong><i class="fa-solid fa-house-medical-circle-check colPrimaryOrange fa-lg"></i></strong> Host
                </span>
            </div>

        </div>

        <hr>

        {{-- Last Messages Section --}}
        <h4 class="text-secondary w-100 mb-1 mt-3" class="">YOUR RECENT MESSAGES</h4>
        <div class="row mt-3 mb-5 messSec rounded pointer p-3" onclick="window.location=`{{ route('admin.messages.index') }}`">
            @forelse ($messages as $message)
                <div class="bg-white rounded-3 my-2 p-2 col-12 messCard d-flex justify-content-between align-items-center">
                    <div class="w-3">
                        <i class="fa-solid fa-envelope fa-xl me-1 colPrimaryOrange"></i>
                    </div>
                    <div class="w-75">
                        <span class="messText text-secondary"><em>"{{ $message->text }}"</em></span>
                    </div>
                    <div class="w-25 text-end text-secondary messDetails ms-2">
                        <span class="messApart pe-2 border-2 border-end">{{ $message->apartment->name }}</span>
                        <span class="messDate">{{ \Carbon\Carbon::parse($message->created_at)->format('Y/m/d') }}</span>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <hr class="my-4">

        {{-- Sponsored Apartments Section --}}
        
        <h4 class="text-secondary w-100 mb-1">SPONSORED APARTMENTS</h4>
        
        <div class="d-flex gap-3 px-1 sponsSec">

            @foreach ($apartments as $apartment)
                <div onclick="window.location=`{{ route('admin.apartments.show', $apartment) }}`"
                    class=" bg-white my-3 border p-3 d-flex flex-column align-items-center rounded-4 sponsCard">
                    <div class="w-100">
                        <img src="{{ asset('/storage') . '/' . $apartment->image }}"
                            class="object-fit-cover img-card w-100 img-fluid rounded pointer" alt="{{ $apartment->image }}">
                    </div>
                    <div class="row w-100 cardTitle mt-2">
                        <div class="col-10 d-flex align-items-center">
                            <h6 class="apartName">{{ $apartment->name }}</h6>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-check text-success fa-xl"></i>
                        </div>
                    </div>
                    <div class="w-100 text-secondary cardDetails">
                        <hr class="mt-0">
                        <p class="text-center mt-0 mb-2"><strong>
                                <span>{{ $apartment->sponsorships->first()->name }} Sponsorship </span>
                                <span> &#183; </span>
                                <span> {{ $apartment->sponsorships->first()->hours / 24 }} Days</span>
                            </strong></p>
                        <p class="text-center m-0">
                            <i class="fa-regular fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($apartment->sponsorships->first()->pivot->start_date)->format('Y/m/d') }}
                            <strong> &#183; </strong>
                            {{ \Carbon\Carbon::parse($apartment->sponsorships->first()->pivot->end_date)->format('Y/m/d') }}
                        </p>
                    </div>
                </div>
            @endforeach

           

        </div>
    </div>
@endsection

<style>
    hr {
        color: #EE6E10;
    }

    .pointer {
        cursor: pointer;
    }

    .messSec {
        overflow-y: scroll;
        height: 250px;
        box-shadow: inset 0px -10px 10px rgba(0, 0, 0, 0.1);

        & .messCard {

            & .w-3 {
                width: 3%;
            }
            & .messText,
            .messApart {
                font-size: 14px;
            }

            & .messText {
                width: 72%;
                margin-left: 10px;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
            }

            & .messDate {
                font-size: 12px;
            }
        }

        & .messCard:hover {
            transform: scale(1.03);

            & .messApart {
                color: #29C0B2 !important;
            }
        }
    }

    .sponsSec {
        overflow-x: scroll;
        width: 100%;
        height: 400px;

        & .sponsCard {
            -webkit-box-shadow: 0px 5px 13px 8px #E3E3E3;
            box-shadow: 0px 5px 13px 8px #E3E3E3;
            width: calc(100% / 4 - 15px);
            min-width: 250px;

            & .img-card {
                height: 187px !important;
                object-position: center;
            }

            & i.text-success:hover {
                animation: pulse 1s infinite;
                color: #1ea164 !important;
            }

            & .cardTitle {
                height: 4rem !important;
            }

            & .cardDetails {
                font-size: 14px;
            }
        }

        & .sponsCard:hover {
            transform: scale(1.03);
        }
    }


    @media (max-width: 531px) {
        .sponsCard {
            min-width: 300px;
        }

        .messDetails {
            display: none;
        }

        .messText {
            margin-left: 0;
        }
    }

    @media (max-width: 320px) {
        .sponsCard {
            min-width: 250px;
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
