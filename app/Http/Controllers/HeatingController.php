<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeatingController extends Controller
{
    // View form to upload image
    public function addValue($type)
    {
        dump(session());
        echo($type);

        /*
        DB::table('stats')->insert([
            'date' => 'AA2023-01-10AA',
            'type' => 'Haus_C',
            'value' => 100,
            'filename' => 'test.jpg'
        ]);
        */


        return view('add-form');
    }

    // Store image
    public function storeValue(Request $request)
    {
        // dd($request->all());
        dump(session());

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:4096'
        ]);

        // store image file in public folger
        $path = $request->image->store('images', 'public');
        
        // redirect to previous location
        return back()->with('success', 'Image uploaded successfully!')->with('image', $path);
        
    }
}
