<?php
namespace App\Http\Controllers;
use App\Models\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{
    public function index(){
        // $data = countries::all();
        $data = countries::orderBy('name')->get();
        return view ('country.countries')->with('countries', $data);
    }

    public function details($code)
    {
        $data = countries::where('short_a', $code)
        ->orWhere('long_a', 'LIKE', '%' . $code . '%')
        ->first();
        //dd($data);
        return view('country.details')->with('countries' , $data);
    }

    public function store_api_data()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');
        //$data = json_decode($response->body());
        $data = json_decode($response, true);
        echo "<pre>";
        foreach($data as $post){
            $post = (array)$post;
            countries::updateOrCreate(
                ['name' => $post['name']['official']],
                [
                    'name' => $post['name']['official'],
                    'short_a' => $post['cca2'],
                    'long_a' => $post['cca3'],
                    'region' => $post['region'],
                    'area' => $post['area'],
                    'population' => $post['population'],
                    'image' => $post['flags']['png']
                ]
            );
        }
        dd("Data Stored");
    }


}

        // for retreiving online api data

        // public function getAppPost(){
        //     $response = Http::get('https://restcountries.com/v3.1/all');
        //     dd($response->collect());
        //     //return view('country.countries2', ['data' => $response->collect()]);
        // }

        // public function details($code){
        //     $response = Http::get('https://restcountries.com/v3.1/alpha/'.$code);
        //     //dd($response->collect());
        //     return view('country.details', ['data' => $response->collect()]);
        // }


        //print_r($data);
        // if ($response->successful()) {
        //     $data = $response->json();
        //     countries::create([
        //         'data' => json_encode($data),
        //     ]);
        //     //$posts = countries::create($data);
        //     return response()->json(['message' => 'Data stored successfully']);
        // } else {
        //     return response()->json(['error' => 'Failed to fetch data'], $response->status());
        // }

        // $data = [
        //     'title' => 'This is the title',
        //     'data' =>[
        //     Http::get('https://restcountries.com/v3.1/all')
        //     ]
        //     ];
        // $posts = countries::create($data);
        // dd($data);
