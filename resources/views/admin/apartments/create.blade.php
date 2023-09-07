@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4 d-flex flex-wrap justify-content-between">
        <div class="row w-100">
            <div class="col">
                <h1 class="mb-5 text-body-secondary">Insert new apartment</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                <form class="form-control needs-validation p-2" action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
    
                    <div class="mt-3">
                        <label class="mb-1" for="name">Apartment name</label>
                        <input required type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="description">Apartment description</label>
                        <textarea required name="description" id="description" cols="10" rows="5" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror"></textarea>
                    </div>
                    @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="room_number">Rooms</label>
                        <input required type="number" max="1500" name="room_number" id="room_number" value="{{ old('room_number') }}"
                            class="form-control @error('room_number') is-invalid @enderror">
                    </div>
                    @error('room_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="bed_number">Beds</label>
                        <input required type="number" max="1500" name="bed_number" id="bed_number" value="{{ old('bed_number') }}"
                            class="form-control @error('bed_number') is-invalid @enderror">
                    </div>
                    @error('bed_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="bathroom_number">Bathrooms</label>
                        <input required type="number" max="1500" name="bathroom_number" id="bathroom_number"
                            value="{{ old('bathroom_number') }}" class="form-control @error('bathroom_number') is-invalid @enderror">
                    </div>
                    @error('bathroom_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="square_meters">Square meters</label>
                        <input required type="number" max="5000" name="square_meters" id="square_meters"
                            value="{{ old('square_meters') }}" class="form-control @error('square_meters') is-invalid @enderror">
                    </div>
                    @error('square_meters')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="address">Full address</label>
                        <input required type="text" placeholder="Example: De Ruijterkade 154, 1011 AC, Amsterdam" name="address" id="address"
                            value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                    </div>
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
    
                    <div class="mt-3">
                        <label class="mb-1" for="image">Upload image</label>
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
    
                    <p class="mt-3 ms-0">Visible</p>
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
                        <label class="mb-1">Select services:</label>
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
    </div>
@endsection
