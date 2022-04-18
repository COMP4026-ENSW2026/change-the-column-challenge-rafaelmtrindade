<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PetsController extends Controller
{
    public function index()
    {
        $pets = Pet::all('id', 'name');

        return view('pets.index', [
            'pets' => $pets,
        ]);
    }

    public function create()
    {
        return view('pets.adicionar');
    }

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

        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function show(Pet $pet)
    {
        return view('pets.show', [
            'pet' => $pet
        ]);
    }
}
