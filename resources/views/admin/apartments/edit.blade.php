@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4 d-flex flex-wrap justify-content-between">
        <div class="row w-100">
            <h1 class="mb-5">Edit {{ $apartment->name ?? 'your' }} apartment</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-control needs-validation p-2" action="{{ route('admin.apartments.update', $apartment) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label class="mb-1" for="name">Apartment's name</label>
                    <input required type="text" minlength="4" name="name" id="name" value="{{ old('name') ?? $apartment->name }}"
                        class="form-control @error('name') is-invalid @enderror">
                </div>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="room_number">Rooms</label>
                    <input required type="number" min="1" name="room_number" id="room_number" value="{{ old('room_number') ?? $apartment->room_number }}" class="form-control @error('room_number') is-invalid @enderror">
                </div>
                @error('room_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="bed_number">Beds</label>
                    <input required type="number" min="1" name="bed_number" id="bed_number" value="{{ old('bed_number') ?? $apartment->bed_number }}" class="form-control @error('bed_number') is-invalid @enderror">
                </div>
                @error('bed_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="bathroom_number">Bathrooms</label>
                    <input required type="number" min="1" name="bathroom_number" id="bathroom_number"
                        value="{{ old('bathroom_number') ?? $apartment->bathroom_number }}" class="form-control @error('bathroom_number') is-invalid @enderror">
                </div>
                @error('bathroom_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="square_meters">Square meters</label>
                    <input required type="number" min="10" name="square_meters" id="square_meters"
                        value="{{ old('square_meters') ?? $apartment->square_meters }}" class="form-control @error('square_meters') is-invalid @enderror">
                </div>
                @error('square_meters')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="address">Full address</label>
                    <input required type="text" placeholder="Example: De Ruijterkade 154, 1011 AC, Amsterdam" min="10" name="address" id="address" value="{{ old('address') ?? $apartment->address }}" class="form-control @error('address') is-invalid @enderror">
                </div>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label class="mb-1" for="image">Upload image</label>
                    <div class="d-flex align-items-center p-2 mb-4 gap-2">
                        <img id="previewCreate" src="{{ asset('/storage') . '/placeholder/placeholder-img.png' }}"
                            alt="img" width="50" height="50" class="object-fit-cover rounded">
                        <input type="file" name="image" id="imgCreate" value="{{ old('image') ?? $apartment->image }}"
                            class="form-control @error('image') is-invalid @enderror">
                    </div>
                </div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
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

                <p class="mb-1 ms-0">Visible</p>
                <div class="d-flex">
                    <div class="form-check mb-3 me-3">

                        <input class="form-check-input" type="radio" value="1" name="visible" id="visible" checked>
                        <label class="form-check-label" for="visible">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="visible" id="visible2">
                        <label class="form-check-label" for="visible2">
                            No
                        </label>
                    </div>
                </div>

                <div class="mb-3">

                    <label class="mb-1">Select services:</label>
                    <div class="d-flex flex-wrap">
                        @foreach ($services as $i => $item)
                            <div class="form-check w-25">
                                <input type="checkbox" name="services[]" id="services{{ $i }}"
                                    value="{{ $item->id }}" class="form-check-input" @checked(in_array($item->id, old('services') ?? $apartment->services->pluck('id')->toArray()))>
                                <label for="services{{ $i }}"
                                    class="form-check-label">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    </div>

                </div>
                @error('services')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

        </div>
    </div>
@endsection
