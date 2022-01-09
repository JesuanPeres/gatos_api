<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Breed;
use App\Weight;
use \DB;

class BreedController extends Controller {
    public function search(Request $request) {
        $name = $request->name;
        
        $breeds = Breed::with('weight')
            ->where(DB::raw('lower(name)'), 'like', strtolower("%{$name}%"))
            ->get();

        if ($breeds->count()) {
            return response()->json($breeds);
        }

        $url = env('CATS_API');
        $response = Http::get("{$url}/breeds/search?q={$name}");
        $responseBreeds = json_decode($response->body());
        
        foreach($responseBreeds as $responseBreed) {
            $breed = new Breed((array) $responseBreed);
            $breed->save();

            $weight = new Weight((array) $responseBreed->weight);
            $breed->weight()->save($weight);
        }

        return response()->json($responseBreeds);
    }
}