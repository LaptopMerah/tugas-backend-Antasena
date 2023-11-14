<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopController extends Controller
{
    public function addLaptop(Request $request) {
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'type' => 'required|string',
            'RAM' => 'required|integer',
            'storage' => 'required|integer',
        ]);

        $laptop = new Laptop();
        $laptop->brand = $validatedData['brand'];
        $laptop->type = $validatedData['type'];
        $laptop->RAM = $validatedData['RAM'];
        $laptop->storage = $validatedData['storage'];

        $laptop->save();

        return response()->json(['message' => 'Laptop added successfully']);
    }
    

    public function getData(){
        $laptop = Laptop::all();
        return response()->json($laptop);
    }
}
