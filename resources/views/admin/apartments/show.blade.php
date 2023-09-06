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

    <div class="container">
        <div class="row">
            <h2 class="colPrimaryOrange my-5">{{ $apartment->name }}</h2>

            <div class="col-6">
                {{-- img --}}
                <div class="">
                    <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="rounded-2 object-fit-cover" alt="apartment image">
                </div>

            </div>
            <div class="col-6 py-3">
                {{-- info apartment --}}
                <p class=""><strong class="colPrimaryOrange ">Address: </strong><span>{{ $apartment->address }}</span></p>
                <hr>
                <p class="colPrimaryOrange"><strong>Info Apartment: </strong>
                <p class="mx-2">Square Meters: {{$apartment->square_meters}} mq</p>
                <p class="mx-2">Bed Number: {{$apartment->bed_number}}</p>
                <p class="mx-2">Bathroom Number: {{$apartment->bathroom_number}}</p>
                <hr>
                <p class="colPrimaryOrange"><strong>Additional Services: </strong>
                <ul class="d-flex flex-wrap p-0">
                    @forelse ($apartment->services as $service)
                        <li class="p-2 icons"> <i class="{{ $service->icon }} colPrimaryOrange"></i>
                            {{ $service->name }} </li>
                    @empty
                        <span>N/A</span>
                    @endforelse
                </ul>
                <hr>
                <div class="d-flex">
                    <div class="mx-2 castomDiv">
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="badge text-bg-success editShow">
                            <i class="fa-solid fa-pen-to-square castomIcon"></i>
                        </a>
                    </div>

                    <div class="castomDiv">
                        <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post">
                        @csrf
                        @method('DELETE')
                            <div class="castomDelete">
                                <div>
                                    <input type="submit" value="" class="">
                                </div>
    
                                <div>
                                    <a type="submit" class="badge text-bg-danger"> <i class="fa-solid fa-trash-can castomIcon"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h1 class="colPrimaryOrange" class="">Do you want to sponsor your apartment?</h1>
            <div class="col-12">
                @foreach ($sponsorships as $sponsorship)
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                        <h5 class="card-title">{{ $sponsorship->name }}</h5>
                        <p class="">{{ $sponsorship->price }}</p>
                        <ul class="card-text">
                            <li>{{ $sponsorship->hours}} hour sponsorship</li>
                            <li>Greater visualization</li>
                        </ul>
                        <button onclick="window.location=`{{ route('admin.payment.token', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}`" class="pay">Pay</button>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

<style>

    img{
        width: 100%;
        height: 550px;
    }

    li{
        list-style-type: none;
    }

    ul .icons {
        list-style-type: none;
        width: calc(100% / 3 - 15px);
        transition: all .7s ease-in-out;
    }

    .castomIcon{
        width: 40px;
        height: 40px;
        font-size: 30px;
    }

    .castomDiv{
        width: 60px;
        height: 60px;
    }

    .castomDelete input {
        width: 50px;
        height: 50px;
        position: absolute;
        left: 0px;
        background-color: transparent;
        border: none;
        color: none;
        z-index: 10;
    }

    .castomDelete a {
        position: relative;
        z-index: 1;
    } 
    
</style>
