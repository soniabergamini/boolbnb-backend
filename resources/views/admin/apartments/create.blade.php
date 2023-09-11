@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4 d-flex justify-content-center">
        <div class="row col-10">
           
            <h1 class="mb-5 colPrimaryOrange">Insert new apartment</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-control needs-validation  castomForm" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <label class="mb-1 colLightOrange" for="name">Apartment name</label>
                    <input required type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                </div>
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="mt-3">
                    <label class="mb-1 colLightOrange" for="description">Apartment description</label>
                    <textarea required name="description" id="description" cols="10" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-between flex-wrap mt-4  ">
                    <div class="mt-3 col-12 col-sm-5 col-md-2">
                        <label class="mb-1 colLightOrange" for="room_number">Rooms</label>
                        <input required type="number" max="1500" name="room_number" id="room_number" value="{{ old('room_number') }}"
                            class="form-control @error('room_number') is-invalid @enderror">
                    </div>
                    @error('room_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 col-12 col-sm-5 col-md-2">
                        <label class="mb-1 colLightOrange" for="bed_number">Beds</label>
                        <input required type="number" max="1500" name="bed_number" id="bed_number" value="{{ old('bed_number') }}"
                            class="form-control @error('bed_number') is-invalid @enderror">
                    </div>
                    @error('bed_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 col-12 col-sm-5 col-md-2">
                        <label class="mb-1 colLightOrange" for="bathroom_number">Bathrooms</label>
                        <input required type="number" max="1500" name="bathroom_number" id="bathroom_number"
                            value="{{ old('bathroom_number') }}" class="form-control @error('bathroom_number') is-invalid @enderror">
                    </div>
                    @error('bathroom_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 col-12 col-sm-5 col-md-2">
                        <label class="mb-1 colLightOrange" for="square_meters">Sq. m</label>
                        <input required type="number" max="5000" name="square_meters" id="square_meters"
                            value="{{ old('square_meters') }}" class="form-control @error('square_meters') is-invalid @enderror">
                    </div>
                    @error('square_meters')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-wrap justify-content-between mt-5">
                    
                    <div class="mt-3 ">
                        <label class="mb-1 colLightOrange" for="address">Full address</label>
                        <input required type="text" placeholder="Example: De Ruijterkade 154, 1011 AC, Amsterdam" name="address" id="address"
                            value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                    </div>
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    
                </div>
                <div class="mt-3">
                    <label class="mb-1 colLightOrange" for="image">Upload image</label>
                    <div class="d-flex align-items-center p-2 gap-2">
                        <img id="previewCreate" src="{{ asset('/storage') . '/placeholder/placeholder-img.png' }}"
                            alt="img" width="50" height="50" class="object-fit-cover rounded">
                        <input required type="file" name="image" id="imgCreate"
                            class="form-control @error('image') is-invalid @enderror">
                    </div>
                </div>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                {{-- JS UPLOAD IMG PREVIEW --}}
                <script>
                    imgCreate.onchange = evt => {
                        const [file] = imgCreate.files
                        if (file) {
                            previewCreate.src = URL.createObjectURL(file)
                        }
                    }
                </script>
                <p class="colLightOrange mt-3 ms-0">Visible</p>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" value="1" name="visible" id="visible" checked>
                        <label class="form-check-label" for="visible">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="visible" id="visible2">
                        <label class="form-check-label" for="visible2">No</label>
                    </div>
                </div>
                <div class="mt-3">
                    <label class=" mb-1">Select services:</label>
                    <div class="d-flex flex-wrap">
                        @foreach ($services as $i => $item)
                            <div class="form-check w-25">
                                <input type="checkbox" name="services[]" id="services{{ $i }}"
                                    value="{{ $item->id }}" class="form-check-input" @checked(in_array($item->id, old('services') ?? []))>
                                <label for="services{{ $i }}"
                                    class="form-check-label">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('services')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn castomButton text-white border border-light-subtle my-3">Add</button>
            </form>
           


        </div>
    </div>
@endsection

<style>
    .castomForm{
        padding: 1rem 3rem !important;
        background: #22222210 !important;
    }

    .btnEdit{
        padding: 10px 20px;
        color: #F9913D;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 40px;
        letter-spacing: 4px;
        border: none;
        border-radius: 5px;

    }
    .btnEdit:hover{
        background: rgba(230, 116, 85);
        color: #fff;
        border-radius: 5px;
        box-shadow: 
            0 0 5px rgb(230, 116, 85),
            0 0 25px rgba(230, 116, 85),
            0 0 50px rgba(230, 116, 85),
            0 0 100px rgba(230, 116, 85);

    }

    /* MEDIA */

    @media (max-width: 400px) {
        .castomForm{
        padding: 1rem 0.5rem !important;
        background: #22222210 !important;
        }
        .checkRespons{
            width: 100% !important;
         }
    }

    @media (min-width: 401px) {
        .castomForm{
        padding: 1rem 0.5rem !important;
        background: #22222210 !important;
        }
        .checkRespons{
            width: 50% !important;
         }
    }

    @media (min-width: 570px) {
        .castomForm{
        padding: 1rem 0.5rem !important;
        background: #22222210 !important;
        } 

         .checkRespons{

            width: 25% !important;
        }

    }

</style> 