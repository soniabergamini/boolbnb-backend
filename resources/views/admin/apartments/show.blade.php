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
                <p class="colPrimaryOrange"><strong>Apartment details: </strong>
                <p class="mx-2">Square Meters: {{$apartment->square_meters}} mq</p>
                <p class="mx-2">Room Number: {{$apartment->room_number}}</p>
                <p class="mx-2">Bed Number: {{$apartment->bed_number}}</p>
                <p class="mx-2">Bathroom Number: {{$apartment->bathroom_number}}</p>
                <p class="mx-2">Visible to guests: {{ $apartment->visible ? 'VISIBLE' : 'HIDDEN' }}</p>
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
                            <button class="bntDelete" type="submit"> Delete <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h1 class="colPrimaryOrange" class="">Do you want to sponsor your apartment?</h1>
            <div class="col-12 d-flex justify-content-between my-5">
                @foreach ($sponsorships as $sponsorship)
                  <div class="castomCard rounded p-3">
                    <div class="castomCardHeader">
                        <h6>{{ $sponsorship->name }}</h6>
                        <h1>{{ $sponsorship->price }}€</h1>
                    </div>
                    <hr>
                    <div class="castomCardBody">
                        <ul class="card-text">
                            <li><i class="fa-solid fa-check me-2 castomCheck" style="color: #000000;"></i>{{ $sponsorship->hours}} hour sponsorship</li>
                            <li class="mt-2"><i class="fa-solid fa-check me-2 castomCheck" style="color: #000000;"></i>Greater visualization</li>
                        </ul>
                    </div>
                    <hr>
                    <div class="castomCardFooter">
                        <button onclick="window.location=`{{ route('admin.payment.token', ['apartment' => $apartment, 'sponsorship' => $sponsorship]) }}`" class="mt-3 btn border rounded castomBtn">Pay</button>
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
        height: 2rem;
        background-color: rgb(15, 134, 45);
        color: white;
        padding: 0.2rem 1.5rem;
        border-radius: 5px;
        display: flex;
        gap: 0.5rem;
        text-decoration: none;
        
    }

    .castomIcon{
        width: 3rem;
        height: 1.5;
        font-size: 1.2rem;   
    }

    .bntDelete{
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

    .castomCard{
        width: 400px;
        height: 320px;
        background: rgb(213,205,205);
        background: linear-gradient(233deg, rgba(213,205,205,1) 5%, rgba(255,255,255,1) 100%);
        box-shadow: 0 0px 20px 8px rgba(154, 153, 153, 0.843);
        transition: all 0.5s ease-in-out;
    }

    .castomCard:hover{
        transform: scale(1.1);
        background: rgb(245,55,50);
        background: linear-gradient(57deg, rgba(245,55,50,1) 1%, rgba(242,93,52,1) 36%, rgba(254,155,57,1) 84%);
        color: white;

        .castomBtn{
            color: white !important;
        }

        .castomCheck{
            color: white !important;
        }
    }

    .castomBtn{
        width: 90px;
        background: rgb(245,55,50);
        background: linear-gradient(57deg, rgba(245,55,50,1) 1%, rgba(242,93,52,1) 36%, rgba(254,155,57,1) 84%);
        border: 1px solid rgb(245,55,50);
    }

</style>

