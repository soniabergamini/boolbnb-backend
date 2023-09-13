@extends('layouts.admin')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger mt-2 mb-0 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="colPrimaryOrange mt-3 mb-2">{{ $apartment->name }}</h2>
            </div>
            <div class="col-12 mt-2">
                <div class="d-flex justify-content-end">
                    <div>
                        <a href="{{ route('admin.apartments.edit', $apartment) }}"
                            class="border border-primary btn text-decoration-none me-3 px-4 py-1">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post" class="mb-2">
                            @csrf
                            @method('DELETE')
                            <button class=" border border-danger btn text-decoration-none py-1" type="submit"> <i
                                    class="fa-solid fa-trash-can"></i> Delete</button>
                        </form>
                    </div>
                </div>
                <hr class="mt-0 mb-3">
            </div>

            <div class="col-12 col-lg-6">
                {{-- img --}}
                <div class="mb-4">
                    <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="rounded-2 object-fit-cover"
                        alt="apartment image">
                </div>
            </div>
            <div class="col-12 col-lg-6 py-3">
                {{-- info apartment --}}
                <p class=""><strong class="colPrimaryOrange ">Address: </strong><span>{{ $apartment->address }}</span>
                </p>
                <hr>
                <p class="colPrimaryOrange"><strong>Apartment details: </strong>
                <p class="mx-2">Square Meters: {{ $apartment->square_meters }} mq</p>
                <p class="mx-2">Room Number: {{ $apartment->room_number }}</p>
                <p class="mx-2">Bed Number: {{ $apartment->bed_number }}</p>
                <p class="mx-2">Bathroom Number: {{ $apartment->bathroom_number }}</p>
                <p class="mx-2">Visible to guests: {{ $apartment->visible ? 'VISIBLE' : 'HIDDEN' }}</p>
                <hr>
                <p class="colPrimaryOrange"><strong>Additional Services: </strong>
                <ul class="d-flex flex-wrap p-0 services">
                    @forelse ($apartment->services as $service)
                        <li class="p-2 icons"> <i class="{{ $service->icon }} colPrimaryOrange"></i>
                            {{ $service->name }} </li>
                    @empty
                        <span>N/A</span>
                    @endforelse
                </ul>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="w-100">
            <p><strong class="colPrimaryOrange">Description</strong></p>
            <p>{{ $apartment->description }}</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h1 class="colPrimaryOrange" class="">Do you want to sponsor your apartment?</h1>
            <div>
                <p class="alert alert-danger mt-3 mb-0 text-center @if ($apartment->visible) 'd-none' @endif"><i
                        class="fa-solid fa-circle-xmark fa-sm mt-2"></i> The apartment must be visible to be sponsored.
                    <a href="{{ route('admin.apartments.edit', $apartment) }}" class="colPrimaryOrange fw-bold pointer">Click here</a> to edit your apartment visibility.
                </p>
            </div>
            <div class="col d-flex flex-wrap justify-content-between my-5">
                @foreach ($sponsorships as $sponsorship)
                    <div class="castomCard rounded p-3 my-2">
                        <div class="castomCardHeader">
                            <h6>{{ $sponsorship->name }}</h6>
                            <h1>{{ $sponsorship->price }}€</h1>
                        </div>
                        <hr>
                        <div class="castomCardBody">
                            <ul class="card-text">
                                <li><i class="fa-solid fa-check me-2 castomCheck"
                                        style="color: #000000;"></i>{{ $sponsorship->hours }} hour sponsorship</li>
                                <li class="mt-2"><i class="fa-solid fa-check me-2 castomCheck"
                                        style="color: #000000;"></i>Greater visualization</li>
                            </ul>
                        </div>
                        <hr>
                        @if ($apartment->visible)
                            <div class="castomCardFooter">
                                <button
                                    onclick="window.location=`{{ route('admin.payment.token', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}`"
                                    class="mt-3 btn border rounded castomBtn">Pay</button>
                            </div>
                        @else
                            <div class="castomCardFooter">
                                <button class="mt-3 btn border rounded castomBtn" disabled>Pay</button>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        @if (count($apartment->sponsorships) > 0)
            <hr>
            <h2 class="colPrimaryOrange my-4">Your sponsorships</h2>
        @endif

        @foreach ($sortedSponsorships as $apartSponsorship)
            <div class=" bg-white my-3 border p-3 d-flex flex-column align-items-center rounded-4 sponsCard">
                <div class="row w-100 cardTitle mt-2">
                    <div class="col-10 d-flex align-items-center">
                        <h6 class="cardSponsorHeader">{{ $apartSponsorship->name }} Sponsorship </h6>
                        <h6 class="mx-1 cardSponsorHeader"> &#183; </h6>
                        <h6 class="mb-2 cardSponsorHeader">{{ $apartSponsorship->price }}€</h6>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center mb-3">
                        <i
                            class="fa-solid fa-xl {{ $apartSponsorship->pivot->end_date < \Carbon\Carbon::now() ? 'text-secondary fa-calendar-xmark' : 'text-success fa-calendar-check' }}"></i>
                    </div>
                </div>
                <div class="w-100 text-secondary cardDetails">
                    <hr class="mt-0">
                    <p class="text-center m-0">
                        <i class="fa-regular fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($apartSponsorship->pivot->start_date)->format('Y/m/d') }}
                        <strong> &#183; </strong>
                        {{ \Carbon\Carbon::parse($apartSponsorship->pivot->end_date)->format('Y/m/d') }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
@endsection

<style>
    img {
        width: 100%;
        height: 550px;
    }

    li {
        list-style-type: none;
    }

    ul .icons {
        list-style-type: none;
        width: calc(100% / 3 - 15px);
        transition: all .7s ease-in-out;
    }

    @media (max-width: 576px) {
        ul.services {
            row-gap: 2px;
            column-gap: 5px;

            &>li {
                width: calc(100% / 2 - 5px);
            }
        }
    }

    .castomDiv {
        width: 6rem;
        height: 2rem;
        background-color: rgb(15, 134, 45);
        color: white;
        padding: 0.2rem 1.5rem;
        border-radius: 5px;
        display: flex;
        gap: 0.5rem;
        text-decoration: none;

    }

    .castomIcon {
        width: 3rem;
        height: 1.5;
        font-size: 18px;
        margin-top: 2px;
    }

    .bntDelete {
        width: 6rem;
        height: 2rem;
        background-color: rgb(190, 21, 21);
        color: white;
        border: none;
        border-radius: 5px;
        margin-left: 2rem
    }



    .castomDelete a {
        position: relative;
        z-index: 1;
    }

    .castomCard {
        width: 400px;
        height: 320px;
        background: rgb(213, 205, 205);
        background: linear-gradient(233deg, rgba(213, 205, 205, 1) 5%, rgba(255, 255, 255, 1) 100%);
        box-shadow: 0 0px 20px 8px rgba(154, 153, 153, 0.843);
        transition: all 0.5s ease-in-out;
    }

    .castomCard:hover {
        transform: scale(1.1);
        background: rgb(245, 55, 50);
        background: linear-gradient(57deg, rgba(245, 55, 50, 1) 1%, rgba(242, 93, 52, 1) 36%, rgba(254, 155, 57, 1) 84%);
        color: white;

        .castomBtn {
            color: white !important;
        }

        .castomCheck {
            color: white !important;
        }
    }

    .castomBtn {
        width: 90px;
        background: rgb(245, 55, 50);
        background: linear-gradient(57deg, rgba(245, 55, 50, 1) 1%, rgba(242, 93, 52, 1) 36%, rgba(254, 155, 57, 1) 84%);
        border: 1px solid rgb(245, 55, 50);
    }
</style>
