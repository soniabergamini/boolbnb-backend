<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', auth()->user()->id)->get();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
    
        $apiURL = config('store.tomtomApi.apiUrl') . $data['address'] . config('store.tomtomApi.apiKey');
        
        $response = Http::withOptions(['verify' => false])->get($apiURL); // Disabilita la verifica del certificato temporaneamente
        
        $data['latitude'] = $response['results']['0']['position']['lat'];
        $data['longitude'] = $response['results']['0']['position']['lon'];
        
        $data['image'] = Storage::put('uploads', $data['image']);
        
        $newApartment = new Apartment();
        $newApartment->fill($data);
        $newApartment->save();
        
        if ($request['services']) {
            $newApartment->services()->attach($data['services']);
        }
        
        return redirect()->route('admin.apartments.show', $newApartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view("admin.apartments.show", compact("apartment"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.edit', compact('services', 'apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = Storage::put('uploads', $data['image']);
        $apiURL = config('store.tomtomApi.apiUrl') . $data['address'] . config('store.tomtomApi.apiKey');
        $response = Http::get($apiURL); // API CALL: Get geographical coordinates
        $data['latitude'] = $response['results']['0']['position']['lat'];
        $data['longitude'] = $response['results']['0']['position']['lon'];
        $apartment->update($data);

        /* if ($request['services']) {
            $apartment->services()->syncWithoutDetaching($data['services']);
        } */

        $apartment->services()->sync($request->input('services'));
        
        return to_route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route("admin.apartments.index");
    }
}
