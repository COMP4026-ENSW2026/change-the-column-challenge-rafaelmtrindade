<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pet::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specie' => [
                'required',
                Rule::in(['cachorro', 'gato', 'papagaio', 'periquito', 'calopsita', 'lagarto', 'peixe', 'cobra', 'tartaruga', 'rato', 'hamster', 'coelho', 'cavalo', 'outro'])
            ],
            'color' => 'required',
            'size' => [
                'required',
                Rule::in(['XS', 'SM', 'M', 'L', 'XL'])
            ]
        ]);


        $pet = Pet::create([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return $pet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required|max:2',
        ]);

        $pet->update([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
    }
}
