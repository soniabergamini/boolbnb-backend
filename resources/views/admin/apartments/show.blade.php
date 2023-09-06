@extends('layouts.admin')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="containerShow">

        {{-- Apartment Details and Edit/Delete Actions --}}
        <div class="showCard col-6 ">

            {{-- Name, Actions --}}
            <div class="d-flex">
                <h2 class="col-6 colPrimaryOrange ">{{ $apartment->name }}</h2>

                {{-- Edit Apartment Details --}}
                <div>
                    <a href="{{ route('admin.apartments.edit', $apartment) }}" class="badge text-bg-success editShow">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>

                {{-- Delete Apartment --}}
                <div>
                    <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="input-group ">
                            <div>
                                <input type="submit" value="" class="">
                            </div>

                            <div>
                                <a type="submit" class="badge text-bg-danger"> <i class="fa-solid fa-trash-can"></i></a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            {{-- Apartment Image --}}
            <div class="contImg">
                <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="rounded-2" alt="apartment image ">
            </div>

            {{-- Apartment Services --}}
            <div class="card-body mx-4">
                <div class="card-text">
                    <p class="mt-3"><strong class="colPrimaryOrange ">Address: </strong><span>{{ $apartment->address }}</span></p>
                    <p class="colPrimaryOrange"><strong>Additional Services: </strong>
                    <ul class="d-flex flex-wrap p-0">
                        @forelse ($apartment->services as $service)
                            <li class="p-2 icons"> <i class="{{ $service->icon }} colPrimaryOrange"></i>
                                {{ $service->name }} </li>
                        @empty
                            <span>N/A</span>
                        @endforelse
                    </ul>
                    </p>
                </div>
            </div>

        </div>

        {{-- Sponsorships Section --}}
        <div class="SponsorShow col-6">
            <div>
                <h1 class="colPrimaryOrange">Do you want to sponsor your apartment?</h1>
                @foreach ($sponsorships as $sponsorship)
                    <div class="carFlex">
                        <button onclick="window.location=`{{ route('admin.payment.token', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}`" class="pay">Pay</button>
                        <div class="infoCArd">
                            <div>
                                <h2 class="card__heading"> {{ $sponsorship->name }}</h2>
                                <p class="card__price">{{ $sponsorship->price }}</p>
                            </div>
                            <ul class="">
                                <li>{{ $sponsorship->hours}} hour sponsorship</li>
                                <li>Greater visualization</li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </div>
@endsection

<style>
    /***************************/
    /******** APARTMENT ********/
    #containerShow {
        width: 100%;
        height: 100%;
        padding: 1.5rem;
        display: flex;
    }

    .contImg {
        width: 25rem;
        height: 20rem;
    }

    img {
        width: 100%;
        height: 100%;
    }

    ul .icons {
        list-style-type: none;
        width: calc(100% / 3 - 15px);
        transition: all .7s ease-in-out;
    }

    .input-group {
        position: absolute;
        max-width: 2rem;
        max-height: 1rem;
        margin-left: 1rem;
    }

    .editShow {
        width: 2rem;
    }

    .input-group input {
        width: 2rem;
        position: absolute;
        left: 0px;
        background-color: transparent;
        border: none;
        color: none;
        z-index: 10;
    }

    .input-group a {
        width: 2rem;
        position: relative;
        left: 1px;
        z-index: 1;
    }


    /***************************/
    /******* SPONSORSHIP *******/

    .carFlex {
        display: flex;
        align-items: center;
        height: 7rem;
        margin-top: 3rem;
    }

    .infoCArd {
        width: 25rem;
        padding: 1rem 2rem 1rem 2rem;
        border-radius: 15px;
        display: flex;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.342);
    }

    .pay {
        width: 5rem;
        border: none;
        border-radius: 5px;
        background-color: #db630c;
        color: white;
        margin: 0 1rem;

    }

    .pay:hover {
        color: #fff;
        border-radius: 5px;
        box-shadow:
            0 0 5px rgba(223, 133, 107, 1),
            0 0 25px rgba(223, 133, 107, 1),
            0 0 50px rgba(223, 133, 107, 1),
            0 0 100px rgba(223, 133, 107, 1);
    }

    .card__heading {
        font-size: 1.05em;
        font-weight: 600;
    }

    .card__price {
        font-size: 1.75em;
        font-weight: 700;
    }
</style>
