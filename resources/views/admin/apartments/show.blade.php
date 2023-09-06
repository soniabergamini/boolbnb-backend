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

        <div class="showCard col-6 ">
            <div class="d-flex">
                <h2 class="col-6 colPrimaryOrange ">{{ $apartment->name }}</h2>
                <div class="">
                    <a href="{{ route('admin.apartments.edit', $apartment) }}" class="badge text-bg-success editShow"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>

                <div >
                    <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="post" >
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
            <div class="contImg ">
                <img src="{{ asset('/storage') . '/' . $apartment->image }}" class="rounded-2" alt="apartment image ">
            </div>

            <div class="card-body mx-4">
                <div class="card-text">
                    <p class="colPrimaryOrange mt-3" > <strong>Address: </strong><span>{{ $apartment->address }}</span></p>
                    <p class="colPrimaryOrange" > <strong>Additional Services: </strong>
                        <ul class="d-flex flex-wrap p-0">
                            @forelse ($apartment->services as $service)
                            <li class="p-2 icons">  <i class="{{$service->icon}} colPrimaryOrange" ></i> {{ $service->name }}, </li>
                            @empty
                            <span>N/A</span>
                            @endforelse
                        </ul>
                    </p>
                </div>

            </div>
        </div>




        <div class="SponsorShow col-6">
            <div>
                <h1 class="colPrimaryOrange  ">Do you want to sponsor your apartment?</h1>

                <div class="carFlex">
                    <button class="pay" >Pay</button>
                    {{-- <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary">Visit</a> --}}
                    <div class="infoCArd ">
                        <div >
                            <h2 class="card__heading">Basic</h2>
                            <p class="card__price">$2.99</p>
                        </div>
                        <ul  class="">
                            <li>24 hour sponsorship</li>
                            <li>Greater visualization</li>
                        </ul>
                    </div>
                </div>
                <div class="carFlex">
                    <button class="pay" >Pay</button>
                    <div class="infoCArd ">
                        <div >
                            <h2 class="card__heading">Standar</h2>
                            <p class="card__price">$5.99</p>
                        </div>
                        <ul  class="">
                            <li>72 hour sponsorship</li>
                            <li>Greater visualization</li>
                        </ul>
                    </div>
                </div>
                <div class="carFlex">
                    <button class="pay" >Pay</button>
                    <div class="infoCArd ">
                        <div >
                            <h2 class="card__heading">Premiun</h2>
                            <p class="card__price">$9.99</p>
                        </div>
                        <ul  class="">
                            <li>144 hour sponsorship</li>
                            <li>Greater visualization</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>
    @endsection

<style>


/***************************/
/******** APARTMENT ********/
#containerShow{
    width: 100%;
    height: 100%;
    padding: 1.5rem;
    display: flex;
    background-image: url("Background.png");

}

.contImg{
    width: 25rem;
    height: 20rem;
}
img{
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
.editShow{
    width: 2rem;
}
.input-group input{
    width: 2rem;
    position: absolute;
    left: 0px;
    background-color: transparent;
    border: none;
    color: none;
    z-index: 10;
}
.input-group a{
    width: 2rem;
    position: relative;
    left: 1px;
    z-index: 1;
}


/***************************/
/******* SPONSORSHIP *******/

.carFlex{
    display: flex;
    align-items: center;
    height: 7rem;
    margin-top: 3rem;
}

.infoCArd{
    width: 25rem;
    padding: 1rem 2rem 1rem 2rem;
    border-radius: 15px;
    display: flex;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.342);
}

.pay{
    width: 5rem;
    border: none;
    border-radius: 5px;
    background-color:#db630c;
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



