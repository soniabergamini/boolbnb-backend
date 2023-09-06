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
                    <div class="">
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="castomDiv "> 
                            Edit <i class="fa-solid fa-pen-to-square castomIcon"></i>
                        </a>
                    </div>

                    <div>
                        <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="input-group ">
                                <div>
                                    <input type="submit" value="" class="">
                                </div>
    
                                <div>
                                    <a type="submit" class=""> Delete <i class="fa-solid fa-trash-can"></i></a>
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
    .castomDiv{
        width: 6rem;
        height: 1.5rem;
        background-color: rgb(17, 102, 38);
        color: white;
        padding-left: 1.5rem;
        border-radius: 5px;
        display: flex;
        gap: 0.5rem;
    }

    .castomIcon{
        width: 3rem;
        height: 1.5;
        font-size: 1.2rem;   
    }
    .input-group {
        position: absolute;
        max-width: 2rem;
        max-height: 1rem;
        margin-left: 1rem;
    }
    .input-group input {
        width: 6rem;
        position: absolute;
        left: 0px;
        /* background-color: red; */
        background-color: transparent;
        border: none;
        color: none;
        z-index: 10;
    }

    .input-group a {
        width: 6rem;
        position: relative;
        left: 1px;
        z-index: 1;
        background-color: rgb(138, 13, 13);
        color: white;
        padding-left: 1rem;
        border-radius: 5px;
        gap: 0.6rem;
        

    }
    .castomDelete a {
        position: relative;
        z-index: 1;
    } 
    
</style>
