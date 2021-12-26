<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Breed;

class BreedController extends Controller {
    public function search(Request $request) {
        $name = $request->name;
        
        $breeds = Breed::where('name', 'like', $name)->get();

        if ($breeds->count()) {
            return response()->json($breeds);
        }

        $response = Http::get("https://api.thecatapi.com/v1/breeds/search?q={$name}");
        $breedsResponse = json_decode($response->body());

        $breeds = [];
        foreach($breedsResponse as $breed) {
            $newBreed = new Breed();
            $newBreed->id = $breed->id;
            $newBreed->name = $breed->name;
            $newBreed->save();
            

            $breeds[] = $newBreed;
        }

        return response()->json($breeds);
    }
}